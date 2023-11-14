</div>
</div>


<!-- Additional Library -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js" integrity="sha512-STof4xm1wgkfm7heWqFJVn58Hm3EtS31XFaagaa8VMReCXAkQnJZ+jEy8PCC/iT18dFy95WcExNHFTqLyp72eQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/autonumeric/1.8.2/autoNumeric.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://cdn.jsdelivr.net/npm/@splidejs/splide@4.1.4/dist/js/splide.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
<script src="<?= base_url()?>assets/js/js-darkmode-landing.js"></script>
<script src="<?= base_url()?>assets/js/main-member.js"></script>
<script src="<?= base_url()?>assets/js/explicit-content.js"></script>
<script src="<?= base_url()?>assets/js/readmore.js"></script>
<script src="<?= base_url()?>assets/js/localforage.min.js"></script>
<script src="<?= base_url()?>assets/js/jquery.star-rating-svg.js"></script>
<script src="https://unpkg.co/gsap@3/dist/gsap.min.js"></script>
<script src="https://unpkg.com/gsap@3/dist/ScrollTrigger.min.js"></script>

<!-- Google tag (gtag.js) -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-X04ENYHM92"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-X04ENYHM92');
</script>

<!-- Bootstrap core JS-->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>


<?php
if (isset($extra)) {
    $this->load->view($extra);
}
?>

<script>
    
    /*----------------------------------------------------------
    1. Copy Profile Start
    ------------------------------------------------------------*/ 
    function setClipboard(value) {
        var tempInput = document.createElement("input");
        tempInput.style = "position: absolute; left: -1000px; top: -1000px";
        tempInput.value = value;
        document.body.appendChild(tempInput);
        tempInput.select();
        document.execCommand("copy");
        document.body.removeChild(tempInput);
        alert("Profile URL copied");
    }
    /*----------------------------------------------------------
    1. Copy Profile End        
    ------------------------------------------------------------*/ 


    /*----------------------------------------------------------
    2. Event on click popup Start
    ------------------------------------------------------------*/ 
    function eventpopup(id){
        $('#post_id').attr('href','<?=base_url()?>profile/post/'+id);
        $('#report_post').attr('data-bs-target', '#modalReport'+id).attr('data-bs-toggle', 'modal');
        $('#profile_postid').attr('href','<?=base_url()?>profile/post/'+id);
        $('#delete_post').attr('href','<?=base_url()?>profile/deletepost/'+id);
        $('#block_user').attr('href','<?=base_url()?>profile/blockeduser/'+id);
        $('#unblock_user').attr('href','<?=base_url()?>profile/unblockuser/'+id);
        $('#id_membertips').val(id);
    }
    /*----------------------------------------------------------
    2. Event on click popup End        
    ------------------------------------------------------------*/ 
    
    /*----------------------------------------------------------
    3. Send tips Start
    ------------------------------------------------------------*/ 
    function popupSendTip(id){
        $("#btnsendtips"+id).on("click",function(e){
            e.preventDefault();
            if (parseFloat($("#amount").val())<0.5){
                alert("Minimum amount is 0.5");
                return
            }
            $("#sendTip").offcanvas('hide');

            $.ajax({
                url: "<?=base_url()?>post/givetips",
                type: "post",
                data: $("#frmsendtips"+id).serialize(),
                success: function (response) {
                    let ress = JSON.parse(response)
                    console.log(ress);
                    if (ress.success == true){
                        Swal.fire({
                            html:  `<div class="d-flex justify-content-center">
                                        <div>
                                            <i class="fas fa-check text-success fs-3"></i>
                                        </div>
                                        <div class="ms-3">${ress.message}</div>
                                    </div>`,
                            showConfirmButton: false,
                            background: '#323436',
                            color: '#ffffff',
                            position: 'top',
                            timer: 1500,
                        });
                        $(".offcanvas").offcanvas('hide');
                    }else{
                        Swal.fire({
                            html:  `<div class="d-flex justify-content-center">
                                        <div>
                                            <i class="fas fa-check text-success fs-3"></i>
                                        </div>
                                        <div class="ms-3">${ress.message}</div>
                                    </div>`,
                            showConfirmButton: false,
                            background: '#323436',
                            color: '#ffffff',
                            position: 'top',
                            timer: 1500,
                        });
                        $(".offcanvas").offcanvas('hide');
                    }
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    Swal.fire({
                        html:  `<div class="d-flex justify-content-center">
                                    <div>
                                    <i class="fas fa-times fs-3 text-danger"></i>
                                    </div>
                                    <div class="ms-3">Send Tip Failed</div>
                                </div>`,
                        showConfirmButton: false,
                        background: '#323436',
                        color: '#ffffff',
                        position: 'top',
                        timer: 1500,
                    });
                    $(".offcanvas").offcanvas('hide');
                }
            });
        })
    }
    //add swal alert if failed

    /*----------------------------------------------------------
    3. Send tips End        
    ------------------------------------------------------------*/ 
    
    /*----------------------------------------------------------
    4. Report Post Start
    ------------------------------------------------------------*/ 
    function reportpost(id, reason)  {
         $("#settingMenus").offcanvas('hide');
        $.ajax({
            url: "<?=base_url()?>profile/reportpost/"+id+"/"+reason,
            type: "post",
            success: function(response) {
                let ress = JSON.parse(response);
                console.log(ress);
                if (ress.success == true){
                    Swal.fire({
                        html:  `<div class="d-flex justify-content-center">
                                    <div>
                                        <i class="fas fa-check text-success fs-3"></i>
                                    </div>
                                    <div class="ms-3">Report Success</div>
                                </div>`,
                        showConfirmButton: false,
                        background: '#323436',
                        color: '#ffffff',
                        position: 'top',
                        timer: 1000,
                    });
                    $('.modal').modal('hide');
                }
            },
            error: function(jqXHR, textStatus, errorThrown) {
                Swal.fire({
                    html:  `<div class="d-flex justify-content-center">
                                <div>
                                    <i class="fas fa-times fs-3 text-danger"></i>
                                </div>
                                <div class="ms-3">Report Failed</div>
                            </div>`,
                    showConfirmButton: false,
                    background: '#323436',
                    color: '#ffffff',
                    position: 'top',
                    timer: 1000,
                });
                $('.modal').modal('hide');
                console.log(textStatus, errorThrown);
            }
        });
    }
    
    /*----------------------------------------------------------
    4. Report Post End        
    ------------------------------------------------------------*/ 
    
    
    
    /*----------------------------------------------------------
    5. Event on click sosmed share
    ------------------------------------------------------------*/ 
    function actionShare(id){
        $('#fbshare').attr('href','http://www.facebook.com/sharer.php?u=<?=base_url()?>profile/post/'+id+"?"+new Date().getTime());
        $('#twittershare').attr('href','https://twitter.com/share?url=<?=base_url()?>profile/post/'+id+"?"+new Date().getTime());
        $('#linkedshare').attr('href','https://www.linkedin.com/sharing/share-offsite/?url=<?=base_url()?>profile/post/'+id+"?"+new Date().getTime());
        $('#teleshare').attr('href','https://telegram.me/share/url?url=<?=base_url()?>profile/post/'+id+"?"+new Date().getTime());
        $('#washare').attr('href','https://wa.me?text=<?=base_url()?>profile/post/'+id+"?"+new Date().getTime());
    }
    /*----------------------------------------------------------
    5. Event on click sosmed share   
    ------------------------------------------------------------*/ 
    
    
    $("body").on("contextmenu", function(e) {
          return false;
    });
    
    $(document).keydown(function (event) {
        if (event.keyCode == 123) {
            return false;
        }
        else if ((event.ctrlKey && event.shiftKey && event.keyCode == 73) || (event.ctrlKey && event.shiftKey && event.keyCode == 74)) {
            return false;
        }
    });
        
    $(".money-input").autoNumeric('init', {
        aSep: ',',
        aDec: '.',
        aForm: true,
        vMax: '99999999999.99',
        vMin: '0.00'
    });
    
    
    function onReady(callback) {
        var intervalId = window.setInterval(function() {
            if (document.getElementsByTagName('body')[0] !== undefined) {
                window.clearInterval(intervalId);
                callback.call(this);
            }
        }, 1000);
    }

    function setVisible(selector, visible) {
        document.querySelector(selector).style.display = visible ? 'block' : 'none';
    }

    onReady(function() {
        setVisible('.apps-container', true);
        setVisible('#loading', false);
    });



    // DISABLED BUTTON BUY SPECIAL START  
    $('.frmspecial').submit(function(){
        $('.btn-buy-special').prop('disabled', true);
    });
    $('.frmdownload').submit(function(){
        $('.btn-buy-download').prop('disabled', true);
    });
    // DISABLED BUTTON BUY SPECIAL END 

    

    
</script>
</body>

</html>