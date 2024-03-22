class loadMoreBlogPosts {
  constructor( button ) {
    this.button = button;// Початкова сторінка
    this.clickButton();
    this.page = 2;
    this.canLoadMore = true;
  }
  
  async getResponse(categoryName, page) {
    let data = {
      action: 'load_more_posts', page: page, category_name: categoryName,
    }
    
    try {
      let response = await fetch(ajax_blog.ajax_url, {
        method: 'POST', body: new URLSearchParams(data),
      });
      if (response.status === 200) {
        return await response.text()
      }
    } catch (error) {
      return error;
    }
  }
  
  clickButton() {
    this.button.addEventListener('click', () => {
      if (this.canLoadMore) {
        let categoryName = document.querySelector('.sBlog__articles-wrap').dataset.categoryName;
        let allPosts =+ document.querySelector('.sBlog__articles-wrap').dataset.allPosts;
        let postsPerPage = 8;
        let pages = allPosts/postsPerPage;
        let lastPage = 1;
        const maxPage =+ document.querySelector('.sBlog__articles-wrap').dataset.maxPage;
        this.button.classList.add('loading');
        
        const height = document.querySelector('.sBlog__articles-wrap').getBoundingClientRect().height;
        const offset = document.querySelector('.sBlog__articles-wrap').getBoundingClientRect().top + window.scrollY;
        
        this.getResponse(categoryName, this.page).then(res => {
          
          if (res && res.toString().trim() !== 'No more posts') {
            this.button.classList.remove('loading');
            document.querySelector('.sBlog__articles-wrap').innerHTML += res;
            this.page++;
            lastPage++;
            
            if (pages%1 !== 0 && lastPage === Math.ceil(pages)) {
              this.canLoadMore = false;
              document.querySelector('#load-more-posts').style.display = 'none';
            } else if (allPosts%postsPerPage === 0 && lastPage === pages) {
              this.canLoadMore = false;
              document.querySelector('#load-more-posts').style.display = 'none';
            }
            
            window.scrollTo({
              top: height + offset - 100,
              behavior: "smooth",
            });
          } else {
            this.button.classList.remove('loading');
            this.canLoadMore = false;
            document.querySelector('.sBlog__articles-more').append(res)
          }
          
       
          if (this.page - 1 === maxPage ) {
            document.querySelector('#load-more-posts').style.display = 'none';
          }
          
          removeCursor();
          appendCursor();
          let cursor = document.querySelectorAll(".sticky-cursor");
          new StickyCursor(cursor);
        })
      }
    });
  }
  
}

const btnShowMore = document.querySelector('#load-more-posts');
new loadMoreBlogPosts(btnShowMore);

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