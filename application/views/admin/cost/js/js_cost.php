<script>
readfee();

function readfee() {
    var readcurrency = $("#currency").val();
    $.ajax({
        url: "<?= base_url() ?>godmode/cost/getcost?currency=" + readcurrency,
        success: function(response) {
            var data = JSON.parse(response);
            $("#walletbank_circuit_fxd").val(data.walletbank_circuit_fxd)
            $("#walletbank_circuit_pct").val(data.walletbank_circuit_pct)
            $("#walletbank_outside_fxd").val(data.walletbank_outside_fxd)
            $("#walletbank_outside_pct").val(data.walletbank_outside_pct)
            $("#topup_circuit_fxd").val(data.topup_circuit_fxd)
            $("#topup_circuit_pct").val(data.topup_circuit_pct)
            $("#swap").val(data.swap)
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