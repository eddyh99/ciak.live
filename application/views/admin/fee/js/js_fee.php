<script>
readfee();

function readfee() {
    var readcurrency = $("#currency").val();

    $.ajax({
        url: "<?= base_url() ?>godmode/fee/getfee",
        success: function(response) {
            console.log(response);
            var data = JSON.parse(response);
            $("#wallet2wallet_pct").val(data.wallet2wallet_pct)
            $("#referral_lv1").val(data.referral_lv1)
            $("#referral_lv2").val(data.referral_lv2)
        },
        error: function(response) {
            alert(response);
        }
    })
}
readfee();
$("#currency").on("change", function() {
    readfee();
})
</script>