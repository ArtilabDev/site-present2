class getAsyncSearchResult {
  constructor() {
    this.inputSearch = document.querySelector('.question__search_input');
    this.resultBlock = document.querySelector('.question__search_result');
    this.init();
  }
  
  async getResponseOnInput( formData ) {
    try {
      const response = await fetch(ajax_search.ajax_url, {
        method: 'POST', body: formData,
      });
      return await response.text();
    } catch (error) {
      return error;
    }
  }
  
  init() {
    this.inputSearch.addEventListener('input', e => {
      let target = e.target;
      let parent = target.parentNode;
      
      if (target.value.trim() !== '') {
        parent.classList.add('active');
        parent.classList.add('loading');
        const formData = new FormData();
        formData.append('action', 'load_more_search');
        formData.append('search_value', e.target.value);
        
        this.getResponseOnInput(formData).then(result => {
          parent.classList.remove('loading');
          this.resultBlock.innerHTML = result;
        });
      } else {
        parent.classList.remove('active');
        parent.classList.remove('loading');
      }
      
    });
  }
}

new getAsyncSearchResult();
