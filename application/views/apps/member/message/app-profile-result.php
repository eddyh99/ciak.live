<?php 
    foreach ($search->member as $dt){
?>
<div class="apps-member col-12 mx-auto">
    <div class="list-people mb-on-botbar">
        <a href="<?=base_url()?>message/message_detail/<?=$dt->ucode?>" class="w-100 h-100 d-block text-decoration-none">
            <div class="people">
                    <img src="<?=$dt->profile?>" alt="image" class="rounded-circle me-3">
                    <h4 class="names my-0 me-auto"><?=$dt->username?></h4>
            </div>
        </a>
    </div>
</div>
<?php 
    }
?>