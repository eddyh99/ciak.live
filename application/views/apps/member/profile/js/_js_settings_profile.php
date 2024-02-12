<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" />
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2-bootstrap-5-theme@1.3.0/dist/select2-bootstrap-5-theme.min.css" />
<!-- Or for RTL support -->
<!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2-bootstrap-5-theme@1.3.0/dist/select2-bootstrap-5-theme.rtl.min.css" /> -->
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>


<script src="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.12/cropper.min.js"></script>
<script src="<?= base_url()?>assets/vendor/emoji-js/Emoji.js"></script>
<style>

.select2-container--default .select2-selection--multiple{
    background-color: black !important;
}

.select2-container--bootstrap-5 .select2-selection {
    background-color: #1A1B1C !important;
}

.select2-container--bootstrap-5 .select2-selection--single .select2-selection__rendered {
    color: #ffffff !important;
}

.select2-container--bootstrap-5 .select2-dropdown,
.select2-container--bootstrap-5 .select2-dropdown .select2-search .select2-search__field {
    background-color: #000000 !important;
    color: #ffffff;
}

.select2-results__option--selectable {
    color: #ffffff;
}

.select2-container--bootstrap-5 .select2-dropdown .select2-results__options .select2-results__option.select2-results__option--selected, 
.select2-container--bootstrap-5 .select2-dropdown .select2-results__options .select2-results__option[aria-selected=true]:not(.select2-results__option--highlighted) {
    background-color: #08CB1C !important;
}

</style>

<script>
    
/*----------------------------------------------------------
Modul Name  : _js_settings_profile
Desc        : Modul ini di digunakan untuk melakukan 
              berinteraksi dengan settings profile user
        
------------------------------------------------------------*/ 

/**
 * TABLE OF CONTENTS
 *
 * 1. Photo Profile Setting
 * 2. Photo Banner Setting
 * 3. Input Profile Setting
 * 5. Discard Profile
 * 6. Owl Carausel
 * 7. Readmore & Infinite Scroll for Tabs
 * 8. Rating Profile
 * 9. GSAP Scroll Trigger
 * 10. Toggle for Content Explicit
 * 11. Save Subscription
 */

/*----------------------------------------------------------
1. Photo Profile Setting Start        
------------------------------------------------------------*/ 

let img_pp_storage = JSON.parse(localStorage.getItem('image-pp'));
let img_banner_storage = JSON.parse(localStorage.getItem('image-banner'));

function toDataURL(url, callback) {
  var xhr = new XMLHttpRequest();
  xhr.onload = function() {
    var reader = new FileReader();
    reader.onloadend = function() {
      callback(reader.result);
    }
    reader.readAsDataURL(xhr.response);
  };
  xhr.open('GET', url);
  xhr.responseType = 'blob';
  xhr.send();
}

let $modal = $('#modal_pp');
let crop_image = document.getElementById('sample_image');

let $modal_banner = $('#modal_banner');
let crop_image_banner = document.getElementById('sample_image_banner');

let cropper;
toDataURL("<?=$profile->profile?>", function(dataUrl) {
    localStorage.setItem('image-pp',JSON.stringify(dataUrl));
    $('.img-pp-setting').attr("src", "<?=$profile->profile?>");
})

$('#upload_image').change(function(event){
    let files = event.target.files;
    var ext = $("#upload_image").val().split('.')[1].toLowerCase();
    if (ext=="heic"){
        formdata = new FormData();
        formdata.append('image', files[0]); 
        $.ajax({
            url: "<?=base_url()?>profile/convert_heic",
            type: "post",
            contentType: false,
            processData:false,  
            data: formdata,
            success: function(data) {
                crop_image.src = data;
                $modal.modal('show');
            }
        });
    }else{
        let done = function(url){
            crop_image.src = url;
            $modal.modal('show');
        }
        
        if(files && files.length > 0){
            reader = new FileReader();
            reader.onload = function(event){
                done(reader.result);
            }
            reader.readAsDataURL(files[0]);
        }        
    }

});


$modal.on('shown.bs.modal', function(){
    cropper = new Cropper(crop_image, {
        aspectRatio: 1,
        viewMode: 1,
        preview: '.preview',
    });
    }).on('hidden.bs.modal', function() {
        cropper.destroy();
        cropper = null;
        $('#upload_image[type="file"]').val('');
});

$('#pp-crop-saved').click(function(){
    canvas = cropper.getCroppedCanvas({
        width: 400,
        height: 400
    });

    canvas.toBlob(function(blob){
        url = URL.createObjectURL(blob);
        let reader = new FileReader();
        reader.readAsDataURL(blob);
        reader.onloadend = function(){
            let resultImg = reader.result;
            localStorage.setItem('image-pp', JSON.stringify(resultImg));
            $('.img-pp-setting').attr("src", resultImg);
            $modal.modal('hide');
        }
    });
});

$('#pp-crop-cancel').click(function(){
    $modal.modal('hide');
    $('#upload_image[type="file"]').val('');
})

/*----------------------------------------------------------
1. Photo Profile Setting End        
------------------------------------------------------------*/ 

/*----------------------------------------------------------
2. Photo Banner Setting Start        
------------------------------------------------------------*/ 

toDataURL("<?=$profile->header?>", function(dataUrl) {
    localStorage.setItem('image-banner',JSON.stringify(dataUrl));
    $('.img-banner-setting').attr("src", "<?=$profile->header?>");
});


$('#upload_banner').change(function(event){
    // let files = event.target.files;
    // let done = function(url){
    //     crop_image_banner.src = url;
    //     $modal_banner.modal('show');
    // }
    
    // if(files && files.length > 0){
    //     reader = new FileReader();
    //     reader.onload = function(event){
    //         done(reader.result);
    //     }
    //     reader.readAsDataURL(files[0]);
    // }   
    
    let files = event.target.files;
    var ext = $("#upload_banner").val().split('.')[1].toLowerCase();
    if (ext=="heic"){
        formdata = new FormData();
        formdata.append('image', files[0]); 
        $.ajax({
            url: "<?=base_url()?>profile/convert_heic",
            type: "post",
            contentType: false,
            processData:false,  
            data: formdata,
            success: function(data) {
                crop_image_banner.src = data;
                $modal_banner.modal('show');
            }
        });
    }else{
        let done = function(url){
            crop_image_banner.src = url;
            $modal_banner.modal('show');
        }
        
        if(files && files.length > 0){
            reader = new FileReader();
            reader.onload = function(event){
                done(reader.result);
            }
            reader.readAsDataURL(files[0]);
        }        
    }

});

$modal_banner.on('shown.bs.modal', function(){
    cropper = new Cropper(crop_image_banner, {
        aspectRatio: 16 / 5,
        viewMode: 1,
        preview: '.preview_banner',
    });
}).on('hidden.bs.modal', function() {
    cropper.destroy();
    cropper = null;
    $('#upload_banner[type="file"]').val('');
});

$('#pp-crop-saved-banner').click(function(){
    canvas = cropper.getCroppedCanvas({
        width: 400,
        height: 400
    });

    canvas.toBlob(function(blob){
        url = URL.createObjectURL(blob);
        let reader = new FileReader();
        reader.readAsDataURL(blob);
        reader.onloadend = function(){
            let resultImg = reader.result;
            localStorage.setItem('image-banner', JSON.stringify(resultImg));
            $('.img-banner-setting').attr("src", resultImg);
            $modal_banner.modal('hide');
        }
    });
});

$('#pp-crop-cancel-banner').click(function(){
    $modal_banner.modal('hide');
    $('#upload_banner[type="file"]').val('');
})

/*----------------------------------------------------------
2. Photo Banner Setting End
------------------------------------------------------------*/ 


/*----------------------------------------------------------
3. Input Profile Start
------------------------------------------------------------*/ 


$("#confirmupdate").on("click",function(e){
    e.preventDefault();
    $('#load-edit-profile').show();
    $.ajax({
        url: "<?= base_url() ?>profile/saveprofile",
        type: "post",
        data: "imgpp="+btoa(localStorage.getItem('image-pp'))+"&imgbanner="+btoa(localStorage.getItem('image-banner'))+"&"+$("#frmprofile").serialize(),
        success: function (response) {
            var data=JSON.parse(response);
            if (data.success==true){
                window.location.href = '<?=base_url()?>profile';
            }
            
            if (data.success==false ){
                $('#load-edit-profile').hide();
            }
        },
        error: function(jqXHR, textStatus, errorThrown) {
            $('#load-edit-profile').hide();
            console.log(textStatus, errorThrown);
        }
    });
})


/*----------------------------------------------------------
3. Input Profile End
------------------------------------------------------------*/ 


/*----------------------------------------------------------
5. Discard Profile Start 
------------------------------------------------------------*/ 
$('#discard-settings-profile').on("click", function(){
    localStorage.removeItem('image-pp');
    localStorage.removeItem('image-banner');
})

// // For Default Image Black Edit Profile
// let PPdefaultImage = '<?= base_url()?>assets/img/new-ciak/bg-pp-default.png';
// $('.img-pp-default').attr("src", PPdefaultImage);

// let BannerDefaultImage = '<?= base_url()?>assets/img/new-ciak/bg-banner-default.png';
// $('.img-banner-default').attr("src", BannerDefaultImage);

// $.ajax({
//     url: "<?= base_url() ?>profile/setting_profile_data",
//     type: "POST",
//     dataType: 'json',
//     success: function (response) {

//         var image_profile = response.profile;
//         var image_header = response.header;

//         function toDataURL(src, callback){
//             var image = new Image();
//             image.crossOrigin = "anonymous";

//             image.onload = function(){
//                 var canvas = document.createElement('canvas');
//                 var context = canvas.getContext('2d');
//                 canvas.height = this.naturalHeight;
//                 canvas.width = this.naturalWidth;
//                 context.drawImage(this, 0, 0);
//                 var dataURL = canvas.toDataURL('image/jpeg');
//                 callback(dataURL);
//             };
//             image.src = src;
//         }

//         console.log(image_profile);
//         console.log(image_header);


//         $('#edit-profile').on("click", function(){
//             toDataURL(image_profile, function(dataURL){
//                 if(image_profile == 'https://api.sandbox.ciak.live/users/images/profiles/default.png'){
//                     console.log("244 DISINI");
//                 }else {
//                     localStorage.setItem('image-pp', JSON.stringify(dataURL));
//                 }
//             })

//             toDataURL(image_header, function(dataURL){
//                 if(image_header == 'https://api.sandbox.ciak.live/users/images/background/default.png'){
//                     console.log("252 DISINI");
//                 }else {
//                     localStorage.setItem('image-banner', JSON.stringify(dataURL));
//                 }
//             })
//         })

//     },
//     error: function(jqXHR, textStatus, errorThrown) {
//         console.log(textStatus, errorThrown);
//     }
// });
/*----------------------------------------------------------
5. Discard Profile End 
------------------------------------------------------------*/ 


/*----------------------------------------------------------
6. Owl Carausel Start 
------------------------------------------------------------*/ 

$(document).ready(function(){
    $('.owl-posts').owlCarousel({
        loop: false,
        margin: 10,
        dots: true,
        responsive:{
            0:{
                items:1
            },
            600:{
                items:1
            },
            1000:{
                items:1
            },
            1200:{
                items:1
            }
        }
    });

});

/*----------------------------------------------------------
6. Owl Carausel End 
------------------------------------------------------------*/ 


/*----------------------------------------------------------
7. Readmore & Infinite Scroll for Tabs Start 
------------------------------------------------------------*/ 
$(function() {
    new Readmore('.article', {
        speed: 75,
        collapsedHeight: 95, 
    });


    var pages = 1;
    var maxpage = $('.max-post-profile').val();
    $('.spinner-load-content').hide();
    $(window).scroll(function() {
        if((window.innerHeight + Math.ceil(window.pageYOffset)) >= document.body.offsetHeight) {
            if(pages != maxpage){
                pages++;
                $.ajax({
                    url: "<?= base_url()?>profile/load_more_profile_public/"+pages,
                    type: "GET",
                    beforeSend: function(){
                        $('.spinner-load-content').show();
                    },
                    success: function(html) {
                        $('.spinner-load-content').hide();
                        $('#load-post-profile-public').after(html);
                    },
                    error: function(jqXHR, textStatus, errorThrown) {
                        console.log("ERROR");
                    }
                });
            } else {
                return;
            }
        }
    });

    $(document).on( 'shown.bs.tab', 'a[data-bs-toggle=\'tab\']', function (e) {
        new Readmore('.article', {
            speed: 75,
            collapsedHeight: 95, 
        });

        var target = $(e.target).attr("href");
        var pages = 1;
        var maxpage = $('.max-post-profile').val();
        $('.spinner-load-content').hide();
        $(window).scroll(function() {
            if((window.innerHeight + Math.ceil(window.pageYOffset)) >= document.body.offsetHeight) {
                    if (target == '#private') {
                        if(pages != maxpage){
                            pages++;
                            $.ajax({
                                url: "<?= base_url()?>profile/load_more_profile_private/"+pages,
                                type: "GET",
                                beforeSend: function(){
                                    $('.spinner-load-content').show();
                                },
                                success: function(html) {
                                    $('.spinner-load-content').hide();
                                    $('#load-post-profile-private').after(html);
                                },
                                error: function(jqXHR, textStatus, errorThrown) {
                                    console.log("ERROR");
                                }
                            });
                        } else {
                            return;
                        }

                    } else if(target == '#public') {
                        if(pages != maxpage){
                            pages++;
                            $.ajax({
                                url: "<?= base_url()?>profile/load_more_profile_public/"+pages,
                                type: "GET",
                                beforeSend: function(){
                                    $('.spinner-load-content').show();
                                },
                                success: function(html) {
                                    $('.spinner-load-content').hide();
                                    $('#load-post-profile-public').after(html);
                                },
                                error: function(jqXHR, textStatus, errorThrown) {
                                    console.log("ERROR");
                                }
                            });
                        } else {
                            return;
                        }
                    
                    } else if (target == '#special') {
                        if(pages != maxpage){
                            pages++;
                            $.ajax({
                                url: "<?= base_url()?>profile/load_more_profile_special/"+pages,
                                type: "GET",
                                beforeSend: function(){
                                    $('.spinner-load-content').show();
                                },
                                success: function(html) {
                                    $('.spinner-load-content').hide();
                                    $('#load-post-profile-special').after(html);
                                },
                                error: function(jqXHR, textStatus, errorThrown) {
                                    console.log("ERROR");
                                }
                            });
                        } else {
                            return;
                        }
                    } else if(target == '#download') {
                        if(pages != maxpage){
                            pages++;
                            $.ajax({
                                url: "<?= base_url()?>profile/load_more_profile_download/"+pages,
                                type: "GET",
                                beforeSend: function(){
                                    $('.spinner-load-content').show();
                                },
                                success: function(html) {
                                    $('.spinner-load-content').hide();
                                    $('#load-post-profile-download').after(html);
                                },
                                error: function(jqXHR, textStatus, errorThrown) {
                                    console.log("ERROR");
                                }
                            });
                        } else {
                            return;
                        }
                    }
             
            }
        });

    
        // Untuk Pause click tabs berbeda
        $('.tab-pane:not(.active)').each(function(idx,el){
            var vid = $(this).find('video');
            if(!vid.paused){
                vid.get(0).pause();
            }
        });
    })
});

/*----------------------------------------------------------
7. Readmore & Infinite Scroll for Tabs End
------------------------------------------------------------*/





/*----------------------------------------------------------
8. Rating Profile Start
------------------------------------------------------------*/
$(".my-rating").starRating({
    strokeColor: '#894A00',
    strokeWidth: 10,
    starSize: 25,
    readOnly:true
});
/*----------------------------------------------------------
8. Rating Profile End
------------------------------------------------------------*/



/*----------------------------------------------------------
9. GSAP Scroll Trigger Start
------------------------------------------------------------*/
gsap.registerPlugin(ScrollTrigger);

let allVideoDivs = gsap.utils.toArray('.vid-post');

allVideoDivs.forEach((videoDiv, i) => {
  
  let videoElem = videoDiv.querySelector('video')
  
  ScrollTrigger.create({
    trigger: videoElem,
    start: 'top 80%',
    end: 'top -30%',
    onLeave: () => videoElem.pause(),
    onLeaveBack: () => videoElem.pause(),
  });
  
});

$(document).ready(function () {
    function playFile() {
        $(".videoplayer-post").not(this).each(function () {
            $(this).get(0).pause();
        });
        this[this.get(0).paused ? "play" : "pause"]();
    }

    $('.videoplayer-post').on("click play", function() {
        playFile.call(this);
    });
})
/*----------------------------------------------------------
9. GSAP Scroll Trigger End
------------------------------------------------------------*/


/*----------------------------------------------------------
10. Toggle for Content Explicit Start
------------------------------------------------------------*/

const bodyContentHome = document.querySelector("body")
const modeToggleContentHome = body.querySelector(".mode-toggle-content");
    
$('.mode-toggle-content').click(function(){
    if(localStorage.getItem("explicit") === 'yes'){
        // console.log('explicit')
        window.location = '<?= base_url()?>profile/get_content_type?type=explicit'
        
    }else if(localStorage.getItem("explicit") === 'no'){
        // console.log('NON')
        window.location = '<?= base_url()?>profile/get_content_type?type=non'
        
    }
})
// modeToggleContentHome.addEventListener("click", () =>{
//     if(localStorage.getItem("explicit") === 'yes'){
//         // console.log('explicit')
//         window.location = '<?= base_url()?>profile/get_content_type?type=explicit'
        
//     }else if(localStorage.getItem("explicit") === 'no'){
//         // console.log('NON')
//         window.location = '<?= base_url()?>profile/get_content_type?type=non'
        
//     }
// });
/*----------------------------------------------------------
10. Toggle for Content Explicit End
------------------------------------------------------------*/

/*----------------------------------------------------------
11. Save Subscription Start
------------------------------------------------------------*/
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

$(document).ready(function(){
    $('#btnSubs').click(function(e){
        e.preventDefault();

        var formData = {
            weekly: $("#weekly").val(),
            monthly: $("#monthly").val(),
            yearly: $("#yearly").val(),
            is_trial: $("#is_trial").val(),
            triallong: $("#triallong").val(),
            trialamount: $("#trialamount").val(),
        };

        $.ajax({
            url: '<?=base_url()?>profile/savesubscription',
            type: 'POST',
            data: formData,
            success: function (response) {
                let ress = JSON.parse(response)
                if(ress.code == '200'){
                    Swal.fire({
                        text: 'Setting Subscription Successfully',
                        showCloseButton: true,
                        showConfirmButton: false,
                        background: '#323436',
                        color: '#ffffff',
                        position: 'top'
                    });
                }else{
                    Swal.fire({
                        text: 'Setting Subscription Error',
                        showCloseButton: true,
                        showConfirmButton: false,
                        background: '#323436',
                        color: '#ffffff',
                        position: 'top'
                    });
                }
            },
            error: function(jqXHR, textStatus, errorThrown) {
                console.log(textStatus);
            }
        })
    })
})
/*----------------------------------------------------------
11. Save Subscription End
------------------------------------------------------------*/



function postcomment(id, username, profile){
    var comment=$("#inputcomment_"+id).val();
    $.ajax({
        url: "<?=base_url()?>post/comment?post_id="+id,
        type: "post",
        data: "comment="+comment,
        success: function(data) {
            $("#inputcomment_"+id).val('');
            console.log(data);
            $('#avail-comment'+id).prepend(`
                <div class="user-comment new-comment d-flex align-items-start">
                    <div class="d-flex align-items-start">
                        <img src="${profile}" width="30" height="30" alt="" class="rounded-circle">
                        <div class="ms-2 text-start">
                            <span class="fw-bold text-white">${username}</span>
                            <p class="text-white" style="white-space: pre-line;word-wrap: break-word;">${comment}</p>
                        </div>
                    </div>
                </div>`);
        }
    });
}


function read_all_comment(id){
    $('#avail-comment-loading'+id).toggleClass('d-none');

    $.ajax({
        url: "<?=base_url()?>post/readcomment?post_id="+id,
        success: function(data) {
            var ress = JSON.parse(data);
            $('#avail-comment'+id+' .prev-comment').addClass('d-none');
            $('#avail-comment-loading'+id).toggleClass('d-none');
            $('.new-comment').remove();

            if(ress.length >= 5){
                $('#comment'+id).toggleClass('show-4');
            }else {
                $('#comment'+id).toggleClass('show-2');
            }

            ress.forEach((el, i, arr) => {
                i === ress.length - 1 ? console.log('LAST') : console.log('NOT LAST')
                $('#avail-comment'+id).append(`
                    <div class="user-comment d-flex align-items-start ${(i === ress.length - 1) ? 'mb-5':''}">
                        <div class="d-flex align-items-start">
                            <img src="${el.profile}" width="30" height="30" alt="" class="rounded-circle">
                            <div class="ms-2 text-start">
                                <span class="fw-bold text-white">${el.username}</span>
                                <p class="text-white" style="white-space: pre-line;word-wrap: break-word;">${el.comment}</p>
                            </div>
                        </div>
                        <!-- <div class="mt-2 px-3">
                            <i class="fa-regular fa-heart"></i>
                        </div> -->
                    </div>`);
            })
        }
    });
}


function checkCountComment(id, angka){
    $('#read-all-comment'+id).toggleClass('mb-5');
    if(angka == 2){
        $('#comment'+id).toggleClass('show-2');
    }else{
        $('#comment'+id).toggleClass('show-1');
    }
    // else{
    //     $('#comment'+id).toggleClass('show-0');
    //     totalcomment = angka;
    // }
}


$(document).ready(function() {
    $('#profession').select2({
        width: '100%',
        theme: "bootstrap-5",
    });
});


</script>