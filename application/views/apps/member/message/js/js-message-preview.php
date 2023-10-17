<script>
/*----------------------------------------------------------
7. Search Data Start        
------------------------------------------------------------*/ 

$('#suggestionslist').hide();
//setup before functions
var typingTimer;                //timer identifier
var doneTypingInterval = 5000;  //time in ms, 5 seconds for example
var $input = $('#search_data');

//on keyup, start the countdown
$input.on('keyup', function () {
  clearTimeout(typingTimer);
  typingTimer = setTimeout(doneTyping(), doneTypingInterval);
});

//on keydown, clear the countdown 
$input.on('keydown', function () {
  clearTimeout(typingTimer);
});

//user is "finished typing," do something
function doneTyping () {
    console.log("100 finish");
  //do something
    var input=$('#search_data').val();
    if (input.length < 4) {
        $('#suggestionslist').hide();
    } else {
        console.log("200 search");
        $.ajax({
            url: "<?=base_url()?>message/follower_search?term="+input,
            success: function(data, response) {
                $('.spinner-search').hide();
                $('.fa-magnifying-glass').show();
                console.log(response);
                // return success
                if (data.length > 0) {
                    $('#suggestionslist').html(data);
                    $('#suggestionslist').show();
                }
            }
        });
    
    }  
}


/*----------------------------------------------------------
7. Search Data End
------------------------------------------------------------*/ 
</script>