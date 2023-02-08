<script>
jQuery(document).ready(function($) {
    var alterClass = function() {
        var ww = document.body.clientWidth;
        if (ww < 992) {
            $('.menus').addClass('mobile-menus');
            $('#open-menus').css('display', '');
            $('#close-menus').css('display', '');
        } else if (ww >= 992) {
            $('.menus').removeClass('mobile-menus');
            $('.menus').css('display', '');
            $('#open-menus').css('display', 'none');
            $('#close-menus').css('display', 'none');
        };

        if (ww < 768) {
            $('#fluidt').removeClass('container');
            $('#fluidt').addClass('container-fluid');
            $('#fluidc').removeClass('container');
            $('#fluidc').addClass('container-fluid');
        } else if (ww >= 768) {
            $('#fluidt').addClass('container');
            $('#fluidt').removeClass('container-fluid');
            $('#fluidc').addClass('container');
            $('#fluidc').removeClass('container-fluid');
        };
    };
    $(window).resize(function() {
        alterClass();
    });
    //Fire it when the page first loads:
    alterClass();
});

$('#open-menus').on("click", function() {
    $('.mobile-menus').css('display', 'flex');
})

$('#close-menus').on("click", function() {
    $('.mobile-menus').css('display', 'none');
})
</script>