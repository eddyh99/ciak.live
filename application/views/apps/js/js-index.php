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


$('input[name=typepromo]').on("click", function() {
    var type = $(this).val();

    if (type == 1) {
        $('#type').val('pct');
        $('#weeklylabel').html('Weekly discount price (%)');
        $('#monthlylabel').html('Monthly discount price (%)');
        $('#yearlylabel').html('Yearly discount price (%)');
    }

    if (type == 2) {
        $('#type').val('fxd');
        $('#weeklylabel').html('Weekly discount price (Fixed)');
        $('#monthlylabel').html('Monthly discount price (Fixed)');
        $('#yearlylabel').html('Yearly discount price (Fixed)');
    }
})
</script>