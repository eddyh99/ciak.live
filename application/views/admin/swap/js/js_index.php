<script>
$(function() {
    $("#tocurrency").html($('option:selected', this).attr("data-currency"))
})

$("#notifcalculate").hide();

function calculate() {
    if ($("#amount").val().replace(/,/g, '') > 0) {
        $.ajax({
            url: "<?= base_url() ?>godmode/swap/swapcalculate",
            method: "post",
            data: $("#swapconfirm").serialize(),
            success: function(response) {
                var data = JSON.parse(response);
                console.log(data);
                $("#notifcalculate").hide();
                $("#btnconfirm").removeClass("disabled");
                $("#receive").val(data.receive);
                $("#amountget").val(data.receive);
                $("#quoteid").val(data.quoteid);

            },
            error: function(xhr, status, error) {
                var data = JSON.parse(xhr.responseText);
                $("#notifcalculate").show();
                $("#btnconfirm").addClass("disabled");
                $("#txtnotif").html(data.message);
                $("#receive").val("0.00");
                $("#amountget").val("0.00");

            }
        });
    } else {
        $("#receive").val("0.00");
        $("#amountget").val("0.00");
    }
}

$("#amount").on("blur", function(e) {
    e.preventDefault;
    calculate();
})

$("#toswap").on("change", function(e) {
    e.preventDefault;
    console.log($('option:selected', this).attr("data-currency"));
    $("#tocurrency").html($('option:selected', this).attr("data-currency"))
    calculate();
});

function validate() {
    $("#btnconfirm").attr("disabled", true);
    $("#swapconfirm").submit();
}
</script>