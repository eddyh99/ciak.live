<script>
    function validate(){
        
        $("#btnconfirm").attr("disabled",true);
        $('input').each(function(i){
            var self = $(this);
            var v = self.val().replace(/,/, "");
            self.val(v);
        });
        $("#updatefee").submit();
    }
</script>