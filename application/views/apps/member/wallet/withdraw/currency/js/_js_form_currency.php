<script>
    // function validate() {
    //     $("#btnconfirm").attr("disabled", true);
    //     $("#form_submit").submit();
    // }

    const currAdd = {
        'BDT' : 'BD',
        'CZK' : 'CZ',
        'CLP' : 'CL',
        'EGP' : 'EG',
        'GHS' : 'GH',
        'HKD' : 'HK',
        'IDR' : 'ID',
        'ILS' : 'IL',
        'INR' : 'IN',
        'JPY' : 'JP',
        'KES' : 'KE',
        'LKR' : 'LK',
        'MAD' : 'MA',
        'NGN' : 'NG',
        'NPR' : 'NP',
        'PEN' : 'PE',
        'PHP' : 'PH',
        'RUB' : 'RU',
        'SGD' : 'SG',
        'THB' : 'TH',
        'VND' : 'VN',
        'ZAR' : 'ZA'    
    };


    $("#bankCode").on("change", function() {
        $valBankCode = this.value;
        var getCurrSession = '<?= $_SESSION['withdraw']['currencycode']?>';

        $.ajax({
            url: "<?= base_url() ?>withdraw/getbranchCode",
            method: "post",
            data: {
                'bankCode': $valBankCode,
                'trimcurrency': currAdd[getCurrSession],
            },
            success: function(response) {
                var data = JSON.parse(response);
                $.each(data,function(key, value)
                {
                    $("#branchCode").append('<option value=' + value.code + '>' + value.title + '</option>');
                });
                // $("#branchCode").html(data);
                // $("#token").val(data.token);
            },
            error: function(xhr, status, error) {
                var data = JSON.parse(xhr.responseText);
                // $("#token").val(data.token);
            }
        });
    });

</script>