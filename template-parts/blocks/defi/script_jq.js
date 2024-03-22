jQuery(function ( $ ) {
  let defi_per_page = parseInt($('.defi__content').data('per_page'));
  // Function for pagination and filtering
  function loadContent( selectedNetwork = '', actions, page, sortBy = '' ) {
    let loadMoreButton = $('.defi__content-load-more .button');
    $.ajax({
      url: ajax_defi.ajax_url, type: 'POST', data: {
        action: 'load_defi_content',
        page: page,
        defi_per_page: defi_per_page,
        selected_network: selectedNetwork,
        sort_by: sortBy,
      }, success: function ( response ) {
        if (response) {
          let currentPage = parseInt(loadMoreButton.data('current_page'));
          let currentView = actions === 'more_defi' ? 1 : 0;
          
          if (actions === 'more_defi') {
            $('.defi__content').append(response.data.result.out);
          } else {
            $('.defi__content').html(response.data.result.out);
          }
          
          let maxPage = parseInt(loadMoreButton.data('max_page'));
          if (currentPage + currentView >= maxPage) {
            loadMoreButton.remove(); // Remove the button when there are no more pages.
          } else {
            $('.defi__content-load-more').html(response.data.result.loadmore);
          }
          $('.defi__pagination').html(response.data.result.pagination);
          
          $('.defi__pagination li').removeClass('active');
          $('.defi__pagination li:contains(' + page + ')').addClass('active');
        }
        
        $('.cursor').remove();
        setTimeout(function () {
          $('.page-wrapper').append('<div class="cursor cursor--large"></div>' + '<div class="cursor cursor--small"></div>');
        }, 10);
      },
    });
  }
  
  // Send a request to load more content when clicking the "Show more strategies" button
  $(document).on('click', '.defi__content-load-more .button', function () {
    let loadMoreButton = $('.defi__content-load-more .button');
    let page = parseInt(loadMoreButton.data('current_page')) + 1;
    let selectedNetwork = $('.select-1-options .select-item.active').data('value') || '';
    let sortBy = $('.select-2-options .select-item.active').data('value') || '';

    loadContent(selectedNetwork, 'more_defi', page, sortBy);
  });
  
  // //Filter by the selected network
  $('.select-1-options .select-item').on('click', function () {
    let selectedNetwork = $(this).data('value');
    let sortBy = $('.select-2-options .select-item.active').data('value') || '';
    loadContent(selectedNetwork, 'selected_network', 1, sortBy);
  });
  // //filter order by
  $('.select-2-options .select-item').on('click', function () {
    let selectedNetwork = $('.select-1-options .select-item.active').data('value') || '';
    let sortBy = $(this).data('value');
    loadContent(selectedNetwork, 'selected_network', 1, sortBy);
  });
  
  // Handle clicks on pagination links
  $(document).on('click', '.defi__pagination li', function ( e ) {
    e.preventDefault();
    let page = $(this).text();
    let selectedNetwork = $('.select-1-options .select-item.active').data('value') || '';
    let sortBy = $('.select-2-options .select-item.active').data('value') || '';
    loadContent(selectedNetwork, 'pagination', page, sortBy);
  });
});
