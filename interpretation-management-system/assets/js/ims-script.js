jQuery(document).ready(function($) {
    $('.ims-nav-item').on('click', function() {
        const target = $(this).data('target');
        
        // Update Sidebar
        $('.ims-nav-item').removeClass('active');
        $(this).addClass('active');

        // Update Panels
        $('.ims-panel').removeClass('active');
        $('#ims-panel-' + target).addClass('active');
    });
});
