jQuery(function ($) {
    let currentPage = 1;

    function loadUsers(page) {
        $.ajax({
            url: ajax_admin.ajax_url,
            type: 'POST',
            data: {
                action: 'load_more_users',
                page: page,
            },
            success: function (response) {
                if (response) {
                    $('#admin-custom-table').html(response);
                }
            },
        });
    }

    loadUsers(currentPage);

    $(document).on('click', '.page-number', function () {
        $('.page-number').removeClass('active');

        var clickedPage = $(this).data('page');

        $(this).addClass('active');

        if (clickedPage !== currentPage) {
            loadUsers(clickedPage);
            currentPage = clickedPage;
        }
    });
});