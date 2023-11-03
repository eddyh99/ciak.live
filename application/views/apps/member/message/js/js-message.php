<script type="text/javascript">
let $modal_attch = $('#modal_attch_chat');

	$('#upload_attch_chat').on('change', function(){
        var input = document.getElementById('upload_attch_chat');
        var children = "";
        if(this.files[0].size > 50097152){
            alert("File is too big!");
            this.value = "";
        }else{
            files = input.files;
            localStorage.setItem("is_video","attach");
            for (var i = 0; i < input.files.length; ++i) {
                children += '<li class="text-preview-attch">' + input.files.item(i).name + '</li>';
            }
			$('#pricechat').offcanvas('show');

        }
    })

	$(document).ready(function(){
		var receiver_userid = '<?=$member->id?>';
        var from_user_id    = '<?=$_SESSION["user_id"]?>'
		var conn = new WebSocket('wss://wss.chats.ciak.live?token=<?php echo $_SESSION["token_chat"]; ?>&mode=<?=CHATMODE?>');

		conn.onopen = function(event)
		{
			console.log("Connection Established");
		};
		
		conn.onmessage = function(event)
		{
			var data = JSON.parse(event.data);
			console.log(data);

			var row_class = '';
			var background_class = '';
			var img_class = '';
			var flex_class = '';

			// var hours_time = data[count].timestamp.slice(10, 16);

			if(data.from == 'Me')
			{
				row_class = 'row justify-content-end';
				background_class = 'bg-message-detail-me';
				flex_class = 'd-flex justify-content-end align-items-start';
				img_class = 'd-none';
			}
			else
			{
				row_class = 'row justify-content-start';
				background_class = 'bg-message-detail-friend';
				flex_class = 'd-flex justify-content-start align-items-start';
				img_class = 'd-block';
			}

			if(receiver_userid == data.userId || data.from == 'Me')
			{
                console.log(data);
			    
				var html_data = `
				<div class="`+row_class+`">
					<div class="col-sm-10 mt-4 `+flex_class+`">
						<div class="`+img_class+` pe-2">
							<img class="img-fluid rounded-circle" width="50" height="50" src="<?= $member->profile?>">
						</div>
						<div class="shadow alert mb-0 `+background_class+`">
							<b>`+data.from+` - </b>`+data.msg+`<br />
						</div>
					</div>
					<div class="`+flex_class+`">
						<span class="pe-1 span-text-toogle-explicit"><i>`+data.datetime.slice(10, 16)+`</i></span>
					</div>
				</div>
				`;

				$('#messages_area').append(html_data);

				$('#messages_area').scrollTop($('#messages_area')[0].scrollHeight);
				window.scrollTo(0, document.body.scrollHeight);

				$('#chat_message').val("");
			}
			else
			{
				var count_chat = $('#userid'+data.userId).text();

				if(count_chat == '')
				{
					count_chat = 0;
				}

				count_chat++;

				$('#userid_'+data.userId).html('<span class="badge badge-danger badge-pill">'+count_chat+'</span>');
			}
		};

		conn.onclose = function(event)
		{
			console.log('connection close');
		};

		$(function(){
		    console.log("100");
			$('#load-edit-profile').show();
			$.ajax({
				url:"<?=base_url()?>message/history_chat",
				type:"POST",
				data:{to_user_id:receiver_userid},
				dataType:"JSON",
				success:function(data)
				{
					console.log(data);
	
					
					if(data.length > 0)
					{
						var html_data = '';

						for(var count = 0; count < data.length; count++)
						{
							var row_class= ''; 
							var background_class = '';
							var flex_class = '';
							var img_class = '';
							var user_name = '';

							var hours_time = data[count].timestamp.slice(10, 16);

							if(data[count].from_user_id == from_user_id)
							{
								row_class = 'row justify-content-end';

								background_class = 'bg-message-detail-me';

								flex_class = 'd-flex justify-content-end align-items-start'

								img_class = 'd-none';
								
								user_name = 'Me';
							}
							else
							{
								row_class = 'row justify-content-start';
								
								background_class = 'bg-message-detail-friend';

								flex_class = 'd-flex justify-content-start align-items-start'

								img_class = 'd-block';

								user_name = data[count].from_user_name;
							}

							html_data += `
							<div class="`+row_class+`">
								<div class="col-sm-10 massage mt-4 `+flex_class+`">
									<div class="`+img_class+` pe-2">
										<img class="img-fluid rounded-circle" width="50" height="50" src="<?= $member->profile?>">
									</div>
									<div class="shadow alert mb-0 `+background_class+`">
										<b>`+user_name+` - </b>
										`+data[count].chat_message+`<br />
									</div>
								</div>
								<div class="`+flex_class+`">
									<span class="pe-1 span-text-toogle-explicit" ><i>`+data[count].timestamp+`</i></span>
								</div>
							</div>
							`;
						}

						$('#messages_area').html(html_data);

						$('#messages_area').scrollTop($('#messages_area')[0].scrollHeight);
						
					}
					window.scrollTo(0, document.body.scrollHeight);
					setTimeout(() => {
						$('#load-edit-profile').hide();
					}, 1000);

				}
			})

		});

		$("#chat_message").keyup(function (event) {
            if (event.keyCode === 13) {
				event.preventDefault();
				var user_id = <?=$_SESSION["user_id"]?>;
				var message = $('#chat_message').val();
				var data = {
					userId: user_id,
					msg: message,
					receiver_userid:receiver_userid,
					mode:'<?=CHATMODE?>'
				};
				conn.send(JSON.stringify(data));
				$('#chat_message').val('');
            }
        });
		
		$("#chat_submit").on('click', function(event){
			event.preventDefault();
			var user_id = <?=$_SESSION["user_id"]?>;
			var message = $('#chat_message').val();
			var data = {
				userId: user_id,
				msg: message,
				receiver_userid:receiver_userid,
				mode:'<?=CHATMODE?>'
			};

			conn.send(JSON.stringify(data));
			$('#chat_message').val('');
		});
	});


	
</script>