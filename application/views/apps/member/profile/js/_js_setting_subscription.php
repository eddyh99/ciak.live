<script>
    if ($("#is_trial").is(":checked")){
        $("#trial").show();        
    }else{
        $("#trial").hide();
    }
    
    $("#is_trial").on("change",function(e){
        if ($("#is_trial").is(":checked")){
            $("#trial").show();        
        }else{
            $("#trial").hide();
        }
    })
</script>