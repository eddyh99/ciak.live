<script>
$('#hideadive').on("click", function() {
    var iconHide = $('#iconhide').hasClass('fa-eye');
    var iconShow = $('#iconhide').hasClass('fa-eye-slash');
    if (iconHide) {
        $('.apps-adive').css('display', 'none');
        $('#iconhide').removeClass('fa-eye');
        $('#iconhide').addClass('fa-eye-slash');
    }

    if (iconShow) {
        $('.apps-adive').css('display', 'flex');
        $('#iconhide').removeClass('fa-eye-slash');
        $('#iconhide').addClass('fa-eye');
    }
})
</script>