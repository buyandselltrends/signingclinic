jQuery(document).ready(function($) {
    $('.gad-nav-item').on('click', function(e) {
        e.preventDefault();
        
        // Tab Nav
        $('.gad-nav-item').removeClass('active');
        $(this).addClass('active');

        // Tab Content
        const target = $(this).data('tab');
        $('.gad-tab-content').removeClass('active');
        $('#gad-tab-' + target).addClass('active');
    });
});
