<script>

    function subscribe(ucode, jenis){
        $.ajax({
            url: `<?= base_url()?>profile/subscribe`,
            type: "POST",
            data: "ucode="+ucode+"&jenis="+jenis,
            success: function(html) {
                window.location = `<?= base_url()?>profile/guest_profile/<?= $profile['ucode']?>`
            },
            error: function(jqXHR, textStatus, errorThrown) {
                //munculin toast errornya
                console.log("ERROR");
            }
        });
    }
</script>