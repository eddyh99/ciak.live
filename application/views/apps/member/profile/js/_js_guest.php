<script>
/*----------------------------------------------------------
    Modul Name  : _js_guest
    Desc        : Modul ini di digunakan untuk melakukan 
                  interaksi dengan menggunakan javascript pada guest member
        
------------------------------------------------------------*/ 

/**
 * TABLE OF CONTENTS
 *
 * 1. Owl Carousel
 * 2. Infinite Loading 
 * 3. GSAP Scroll Trigger 
 * 4. Subscribe
 * 5. Like Postingan
 * 6. Rating Postingan
 * 7. Bookmark Postingan
 * 8. Follow Member
 * 9. Toggle for Content Explicit 
 */
/*----------------------------------------------------------
1. Owl Carausel Start        
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
1. Owl Carausel End        
------------------------------------------------------------*/ 


/*----------------------------------------------------------
2. Infinite Loading Start        
------------------------------------------------------------*/ 

$(function() {  
    $('.article').readmore({
        speed: 75, 
        collapsedHeight: 95, 
        moreLink: `<a class="ac" href="#">Read more</a>`, 
        lessLink: `<a class="ac" href="#">Close</a>`, 
    }); 


    var pages = 1;
    var maxpage = $('.max-post-guest').val();
    $('.spinner-load-content').hide();
    $(window).scroll(function() {
        if((window.innerHeight + Math.ceil(window.pageYOffset)) >= document.body.offsetHeight) {
            if(pages != maxpage){
                pages++;
                $.ajax({
                    url: `<?= base_url()?>profile/load_more_guest_public/<?= $ucodeguest;?>/${pages}`,
                    type: "GET",
                    beforeSend: function(){
                        $('.spinner-load-content').show();
                    },
                    success: function(html) {
                        $('.spinner-load-content').hide();
                        $('#load-post-guest-public').after(html);
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
        $('.article').readmore({
            speed: 75, 
            collapsedHeight: 95, 
            moreLink: `<a class="ac" href="#">Read more</a>`, 
            lessLink: `<a class="ac" href="#">Close</a>`, 
        });

        var target = $(e.target).attr("href");
        var pages = 1;
        var maxpage = $('.max-post-guest').val();
        $('.spinner-load-content').hide();
        $(window).scroll(function() {
            if((window.innerHeight + Math.ceil(window.pageYOffset)) >= document.body.offsetHeight) {
                if (target == '#private') {
                    if(pages != maxpage){
                        pages++;
                        $.ajax({
                            url: `<?= base_url()?>profile/load_more_guest_private/<?= $ucodeguest;?>/${pages}`,
                            type: "GET",
                            beforeSend: function(){
                                $('.spinner-load-content').show();
                            },
                            success: function(html) {
                                $('.spinner-load-content').hide();
                                $('#load-post-guest-private').after(html);
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
                            url: `<?= base_url()?>profile/load_more_guest_public/<?= $ucodeguest;?>/${pages}`,
                            type: "GET",
                            beforeSend: function(){
                                $('.spinner-load-content').show();
                            },
                            success: function(html) {
                                $('.spinner-load-content').hide();
                                $('#load-post-guest-public').after(html);
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
                            url: `<?= base_url()?>profile/load_more_guest_special/<?= $ucodeguest;?>/${pages}`,
                            type: "GET",
                            beforeSend: function(){
                                $('.spinner-load-content').show();
                            },
                            success: function(html) {
                                $('.spinner-load-content').hide();
                                $('#load-post-guest-special').after(html);
                            },
                            error: function(jqXHR, textStatus, errorThrown) {
                                console.log("ERROR");
                            }
                        });
                    } else  {
                        return;
                    }
                } else if(target == '#download') {
                    if(pages != maxpage){
                        pages++;
                        $.ajax({
                            url: `<?= base_url()?>profile/load_more_guest_download/<?= $ucodeguest;?>/${pages}`,
                            type: "GET",
                            beforeSend: function(){
                                $('.spinner-load-content').show();
                            },
                            success: function(html) {
                                $('.spinner-load-content').hide();
                                $('#load-post-guest-download').after(html);
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
2. Infinite Loading End        
------------------------------------------------------------*/ 


/*----------------------------------------------------------
3. GSAP Scroll Trigger Start     
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
3. GSAP Scroll Trigger End     
------------------------------------------------------------*/ 

/*----------------------------------------------------------
4. Subscribe Guest Start
------------------------------------------------------------*/ 
function subscribe(ucode, jenis){
    $.ajax({
        url: `<?= base_url()?>profile/subscribe`,
        type: "POST",
        data: "ucode="+ucode+"&jenis="+jenis,
        success: function(html) {
            location.reload();
        },
        error: function(jqXHR, textStatus, errorThrown) {
            //munculin toast errornya
            console.log("ERROR");
        }
    });
}
/*----------------------------------------------------------
4. Subscribe Guest End 
------------------------------------------------------------*/ 

/*----------------------------------------------------------
5. Like Postingan Start
------------------------------------------------------------*/ 

function actionLike(post) {
    var status;
    var count = $(`.count-like${post}`).text();
    if ($("#postlike" + post).hasClass('checked')) {
        status='unlike';
    }else{
        status='like';
    }
    
    $.ajax({
        url: "<?=base_url()?>profile/givelike",
        type: "post",
        data: "status="+status+"&post_id="+post,
        success: function (response) {
            if (response){
                if ($("#postlike" + post).hasClass('checked')) {
                    $("#postlike" + post).removeClass('checked');
                    count--;
                    $(`.count-like${post}`).text(count);
                }else{
                    $("#postlike" + post).addClass('checked');
                    count++;
                    $(`.count-like${post}`).text(count);
                }
            }
        },
        error: function(jqXHR, textStatus, errorThrown) {
          console.log(textStatus, errorThrown);
        }
    });
};

/*----------------------------------------------------------
5. Like Postingan End 
------------------------------------------------------------*/ 

/*----------------------------------------------------------
6. Rating Postingan Start
------------------------------------------------------------*/ 
function actionStar(post, star) {
     $.ajax({
        url: "<?=base_url()?>profile/giverating",
        type: "post",
        data: "star="+star+"&post_id="+post,
        success: function (response) {
            var rate = JSON.parse(response);
            console.log(rate);
            
            if(rate.success == true && rate.is_rerate==false){
                $(".poststar"+post).addClass("pe-none");
                $(".rate-start "+post).addClass("pe-none");
            }
            if (response){
                if (star > 0) {
                    if (document.getElementById('clearpost_'+post)===null){
                        var a = document.createElement("a");
                        var linkText = document.createTextNode("clear");
                        a.appendChild(linkText);
                        a.setAttribute('onclick','actionStar("'+post+'","0")');
                        a.setAttribute('id','clearpost_'+post);
                        document.getElementById("clearrate_"+post).appendChild(a);
                    }
                    
                    // Mulai dari 1 sampai rate sama dengan star 
                    for (var rate = 1; rate < 6; ++rate) {
                        if (star < 5) { // Jika dibawah 5, akan meng-checked sampai star
                            if (rate <= star) { // Jika rate masih dibawah star atau sama dengan star akan di checked
                                $(".s-" + rate + '[name="poststar' + post + '"]').addClass('checked');
                            } else { // Jika rate sudah melebihi dari star akan di unchecked
                                $(".s-" + rate + '[name="poststar' + post + '"]').removeClass('checked');
                            }
                        } else { // Jika seluruh bintang di checked
                            $(".s-" + rate + '[name="poststar' + post + '"]').addClass('checked');
                        }
                    }

                }else{
                    for (var i=1;i<6;i++){
                        $(".s-" + i + '[name="poststar' + post + '"]').removeClass('checked');
                    }
                    document.getElementById("clearpost_"+post).remove();
                }                
            }
        },
        error: function(jqXHR, textStatus, errorThrown) {
          console.log(textStatus, errorThrown);
        }
    });
};
/*----------------------------------------------------------
6. Rating Postingan End 
------------------------------------------------------------*/ 


/*----------------------------------------------------------
7. Bookmark Postingan Start
------------------------------------------------------------*/ 
function actionBookmark(post) {
    var status;
    if ($("#postbookmark" + post).hasClass('checked')) {
        status='unbookmark';
    }else{
        status='bookmark';
    }

    $.ajax({
        url: "<?=base_url()?>profile/givebookmark",
        type: "post",
        data: "status="+status+"&post_id="+post,
        success: function (response) {
            if (response){
                if ($("#postbookmark" + post).hasClass('checked')) {
                    $("#postbookmark" + post).removeClass('checked');
                }else{
                    $("#postbookmark" + post).addClass('checked');
                }
            }
        },
        error: function(jqXHR, textStatus, errorThrown) {
          console.log(textStatus, errorThrown);
        }
    });
};
/*----------------------------------------------------------
7. Bookmark Postingan End 
------------------------------------------------------------*/ 

/*----------------------------------------------------------
8. Follow Member Start 
------------------------------------------------------------*/ 
function actionFollow(user, ucode) {
    $.ajax({
        url: "<?=base_url()?>profile/follow",
        type: "post",
        data: "status="+$("#user" + user).val()+"&follow_id="+ucode,
        success: function (response) {
            var data=JSON.parse(response);
            if (data.success==true){
                if ($("#user" + user).val() == 'Unfollow') {
                    $("#user" + user).val('Follow');
                    $("#user" + user).removeClass('active');
                } else {
                    $("#user" + user).val('Unfollow');
                    $("#user" + user).addClass('active');
                }
            }
        },
        error: function(jqXHR, textStatus, errorThrown) {
           console.log(textStatus, errorThrown);
        }
    });
}
/*----------------------------------------------------------
8. Follow Member End 
------------------------------------------------------------*/ 

/*----------------------------------------------------------
9. Toggle for Content Explicit Start
------------------------------------------------------------*/
const   bodyContentHome = document.querySelector("body"),
modeToggleContentHome = body.querySelector(".mode-toggle-content");
    

modeToggleContentHome.addEventListener("click", () =>{
    if(localStorage.getItem("explicit") === 'yes'){
        // console.log('explicit')
        window.location = '<?= base_url()?>profile/get_content_type_guest/<?= $profile['ucode']?>?type=explicit'
        
    }else if(localStorage.getItem("explicit") === 'no'){
        // console.log('NON')
        window.location = '<?= base_url()?>profile/get_content_type_guest/<?= $profile['ucode']?>?type=non'
        
    }
});
/*----------------------------------------------------------
9. Toggle for Content Explicit End
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



</script>