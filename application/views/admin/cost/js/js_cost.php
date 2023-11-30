<script>
readfee();

function readfee() {
    var readcurrency = $("#currency").val();
    $.ajax({
        url: "<?= base_url() ?>admin/cost/getcost?currency=" + readcurrency,
        success: function(response) {
            var data = JSON.parse(response);
            $("#walletbank_circuit_fxd").val(data.walletbank_circuit_fxd)
            $("#walletbank_circuit_pct").val(data.walletbank_circuit_pct)
            $("#walletbank_outside_fxd").val(data.walletbank_outside_fxd)
            $("#walletbank_outside_pct").val(data.walletbank_outside_pct)
            $("#wallet_sender_fxd").val(data.wallet_sender_fxd)
            $("#wallet_sender_pct").val(data.wallet_sender_pct)
            $("#wallet_receiver_fxd").val(data.wallet_receiver_fxd)
            $("#wallet_receiver_pct").val(data.wallet_receiver_pct)
            $("#topup_circuit_fxd").val(data.topup_circuit_fxd)
            $("#topup_circuit_pct").val(data.topup_circuit_pct)
            $("#topup_outside_fxd").val(data.topup_outside_fxd)
            $("#topup_outside_pct").val(data.topup_outside_pct)
            $("#card_fxd").val(data.card_fxd)

            if ((readcurrency != "USD") &&
                (readcurrency != "EUR") &&
                (readcurrency != "AUD") &&
                (readcurrency != "NZD") &&
                (readcurrency != "CAD") &&
                (readcurrency != "HUF") &&
                (readcurrency != "SGD") &&
                (readcurrency != "TRY") &&
                (readcurrency != "GBP") &&
                (readcurrency != "RON")) {
                $("#walletbank_outside_fxd_div").hide()
                $("#walletbank_outside_pct_div").hide()
                $("#topup_outside_fxd_div").hide()
                $("#topup_outside_pct_div").hide()
                $("#topup_circuit_fxd_div").hide()
                $("#topup_circuit_pct_div").hide()
            }
            if ((readcurrency == "AUD") ||
                (readcurrency == "NZD") ||
                (readcurrency == "CAD") ||
                (readcurrency == "HUF") ||
                (readcurrency == "SGD") ||
                (readcurrency == "TRY") ||
                (readcurrency == "RON")) {
                $("#walletbank_outside_fxd_div").hide()
                $("#walletbank_outside_pct_div").hide()
                $("#topup_outside_fxd_div").hide()
                $("#topup_outside_pct_div").hide()
                $("#topup_circuit_fxd_div").show()
                $("#topup_circuit_pct_div").show()
            }
            if ((readcurrency == "USD") ||
                (readcurrency == "EUR") ||
                (readcurrency == "GBP")) {
                $("#walletbank_outside_fxd_div").show()
                $("#walletbank_outside_pct_div").show()
                $("#topup_outside_fxd_div").show()
                $("#topup_outside_pct_div").show()
                $("#topup_circuit_fxd_div").show()
                $("#topup_circuit_pct_div").show()
            }

            if (readcurrency == "EUR"){
                $("#card_fxd_div").show()
            }else{
                $("#card_fxd_div").hide()
            }
        },
        error: function(response) {
            alert(response);
        }
    })
}

$("#currency").on("change", function() {
    readfee();
})
</script>