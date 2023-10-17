<?php 
    foreach ($search->member as $dt){
?>
<div class="apps-member col-12 mx-auto mt-2">
    <div class="list-people mb-on-botbar">
        <a class="w-100 h-100 d-block text-decoration-none" onclick="$('#meetingcam').val('<?=$dt->id?>');$('#invite1').attr('checked','checked')" data-bs-dismiss="modal">
            <div class="people px-4">
                    <img src="<?=$dt->profile?>" alt="image" class="rounded-circle me-3">
                    <h4 class="names my-0 me-auto"><?=$dt->username?></h4>
            </div>
        </a>
    </div>
</div>
<?php 
    }
?>