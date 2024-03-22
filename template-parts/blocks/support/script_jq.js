jQuery(document).ready(function ( $ ) {
  $('.question__search_input').on('input', function () {
    if ($(this).val().trim() !== '') {
      $('.question__search').addClass('active');
    } else {
      $('.question__search').removeClass('active');
    }
    const inputValue = $(this).val().trim();
    const parent = $(this).parent();
    parent.addClass('loading');

    $.ajax({
      url: ajax_search.ajax_url, type: 'post', data: {
        action: 'load_more_search', search_value: inputValue, 
      }, success: function ( response ) {
        parent.removeClass('loading');
        $('.question__search_result').html(response);
      },
    });
  });
});