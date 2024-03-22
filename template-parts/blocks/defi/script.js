class defiPagination {
  constructor() {
    this.pageCounts = document.querySelector('.defi__content').getAttribute('data-per_page');
    this.loadMoreButton = document.querySelector('.defi__content-load-more .button');
  }
  
  async getResponse( options ) {
    try {
      let response = await fetch(ajax_defi.ajax_url, {
        method: 'POST', headers: {
          'Content-Type': 'application/x-www-form-urlencoded',
        }, body: new URLSearchParams(options),
      });
      if (response.status === 200) {
        return await response.json();
      }
    } catch (error) {
      return error;
    }
  }
  
  async loadContent( selectedNetwork = '', actions, page, sortBy = '' ) {
    let options = {
      action: 'load_defi_content',
      page: page,
      defi_per_page: this.pageCounts,
      selected_network: selectedNetwork,
      sort_by: sortBy,
    }
    document.querySelector('.defi__content').classList.add('loading');
    
    await this.getResponse(options).then(res => {
      if (res.success) {
        let currentPage = +this.loadMoreButton.dataset.current_page;
        let currentView = actions === 'more_defi' ? 1 : 0;
        document.querySelector('.defi__content').classList.remove('loading');
        
        if (actions === 'more_defi') {
          document.querySelector('.defi__content').innerHTML += res.data.result.out;
        } else {
          document.querySelector('.defi__content').innerHTML = res.data.result.out;
        }
        
        let maxPage = +this.loadMoreButton.dataset.max_page;
        if ((currentPage) >= maxPage) {
          this.loadMoreButton.remove(); // Remove the button when there are no more pages.
        } else {
          document.querySelector('.defi__content-load-more').innerHTML = res.data.result.loadmore;
        }
        
        document.querySelector('.defi__pagination').innerHTML = res.data.result.pagination;
        
        document.querySelectorAll('.defi__pagination li').forEach(item => {
          item.classList.remove('active');
          
          if (item.textContent === page.toString()) {
            item.classList.add('active');
          }
        });
        
        let buttonMore = document.querySelector('.defi__content-load-more .button');
        if (buttonMore !== null && buttonMore.classList.contains('loading')) {
          buttonMore.classList.remove('loading');
        }
        
        removeCursor();
        appendCursor();
        let cursor = document.querySelectorAll(".sticky-cursor");
        new StickyCursor(cursor);
      }
    })
    
  }
  
}

let pagination = new defiPagination();
let prevPage = [];

function pageDefi() {
  const paginationLI = document.querySelectorAll('.defi__pagination li');
  paginationLI.forEach(li => {
    li.addEventListener('click', e => {
      prevPage = [];
      e.target.style.pointerEvents = 'none';
      e.preventDefault();
      let page = li.textContent;
      let selectedNetwork = '';
      document.querySelectorAll('.select-1-options .select-item').forEach(item => {
        if (item.classList.contains('active')) {
          selectedNetwork = item.dataset.value;
        }
      })
      
      let sortBy = '';
      document.querySelectorAll('.select-2-options .select-item').forEach(item => {
        if (item.classList.contains('active')) {
          sortBy = item.dataset.value;
        }
      });
      
      const height = document.querySelector('.defi__content').getBoundingClientRect().height;
      const offset = document.querySelector('.defi__content').getBoundingClientRect().top + window.scrollY;
      
      pagination.loadContent(selectedNetwork, 'pagination', page, sortBy).then(() => {
        e.target.style.pointerEvents = 'auto';
        
        window.scrollTo({
          top: offset - 110, behavior: "smooth",
        });
      });
      
    });
  });
}
pageDefi();

function loadMore() {
  // Send a request to load more content when clicking the "Show more strategies" button
  let button = document.querySelector('.defi__content-load-more .button');
  
  if (button !== null) {
    button.addEventListener('click', e => {
      let page = +e.currentTarget.dataset.current_page;
      e.target.style.pointerEvents = 'none';
      button.classList.add('loading');
      prevPage.push(page);
      
      let selectedNetwork = '';
      document.querySelectorAll('.select-1-options .select-item').forEach(item => {
        if (item.classList.contains('active')) {
          selectedNetwork = item.dataset.value;
        }
      });
      
      let sortBy = '';
      document.querySelectorAll('.select-2-options .select-item').forEach(item => {
        if (item.classList.contains('active')) {
          sortBy = item.dataset.value;
        }
      });
      
      const height = document.querySelector('.defi__content').getBoundingClientRect().height;
      const offset = document.querySelector('.defi__content').getBoundingClientRect().top + window.scrollY;
      
      pagination.loadContent(selectedNetwork, 'more_defi', page + 1, sortBy).then(() => {
        e.target.style.pointerEvents = 'auto';
        
        window.scrollTo({
          top: offset + height - 90, behavior: "smooth",
        });
        
        prevPage.map(page => {
          document.querySelectorAll('.defi__pagination li').forEach(item => {
            if (page.toString() === item.textContent) {
              item.classList.add('hidden');
            }
          });
        })
        
      });
    })
  }
}
loadMore();

let observer = new MutationObserver(function ( mutations ) {
  mutations.forEach(function ( mutation ) {
    if (mutation.target.className === 'defi__pagination') {
      pageDefi();
    }
    if (mutation.target.className === 'defi__content-load-more') {
      loadMore();
    }
    if (mutation.target.className === 'defi__sort') {
      filterSort();
      filterNetwork();
    }
    
  });
});

observer.observe(document.documentElement, {
  attributes: true, childList: true, subtree: true
});

function filterNetwork() {
  const selectNetwork = document.querySelectorAll('.select-1-options .select-item');
  selectNetwork.forEach(item => {
    item.addEventListener('click', e => {
      prevPage = [];
      e.target.style.pointerEvents = 'none';
      let selectedNetwork = e.currentTarget.dataset.value;
      let sortBy = '';
      document.querySelectorAll('.select-2-options .select-item').forEach(item => {
        if (item.classList.contains('active')) {
          sortBy = item.dataset.value;
        }
      });
      
      pagination.loadContent(selectedNetwork, 'selected_network', 1, sortBy).then(() => {
        e.target.style.pointerEvents = 'auto';
      });
    })
  });
}
filterNetwork();

function filterSort() {
  //filter order by
  const selectSort = document.querySelectorAll('.select-2-options .select-item');
  selectSort.forEach(item => {
    item.addEventListener('click', e => {
      prevPage = [];
      let sortBy = e.currentTarget.dataset.value;
      let selectedNetwork = '';
      document.querySelectorAll('.select-1-options .select-item').forEach(item => {
        if (item.classList.contains('active')) {
          selectedNetwork = item.dataset.value;
        }
      });
      e.target.style.pointerEvents = 'none';
      
      pagination.loadContent(selectedNetwork, 'selected_network', 1, sortBy).then(() => {
        e.target.style.pointerEvents = 'auto';
      });
    })
  });
}
filterSort();

function appendCursor() {
  document
    .querySelector('.page-wrapper')
    .insertAdjacentHTML('beforeend', '<div class="cursor cursor--large"></div>' + '<div class="cursor cursor--small"></div>');
}

function removeCursor() {
  document.querySelectorAll('.cursor').forEach(function ( cursor ) {
    cursor.remove();
  });
}