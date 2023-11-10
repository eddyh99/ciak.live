<script>
    $(".my-rating").starRating({
      strokeColor: '#894A00',
      strokeWidth: 10,
      starSize: 25,
      readOnly:true
    });
</script>

<script>
    
/*----------------------------------------------------------
    Modul Name  : js-index
    Desc        : Modul ini di digunakan untuk melakukan 
                  interaksi dengan menggunakan javascript secara general
        
------------------------------------------------------------*/ 

/**
 * TABLE OF CONTENTS
 *
 * 1. Hide Story Homepage 
 * 2. Promotion Profile
 * 3. Follow Interaction
 * 4. Like & Star Interaction
 * 5. Click Go To Search
 * 6. Owl Carausel
 * 7. Search Data        
 * 8. Readmore For Guest Profile        
 * 9. GSAP Scroll Trigger  
 * 10. Toggle for Content Explicit      
 */

/*----------------------------------------------------------
1. Hide Story Homepage Start        
------------------------------------------------------------*/ 


$('#hideadive').on("click", function() {
    var iconHide = $('#iconhide').hasClass('fa-eye');
    var iconShow = $('#iconhide').hasClass('fa-eye-slash');
    if (iconHide) {
        $('.apps-adive').css('display', 'none');
        $('#iconhide').removeClass('fa-eye');
        $('#iconhide').addClass('fa-eye-slash');
    }

    if (iconShow) {
        $('.apps-adive').css('display', 'flex');
        $('#iconhide').removeClass('fa-eye-slash');
        $('#iconhide').addClass('fa-eye');
    }
})

/*----------------------------------------------------------
1. Hide Story Homepage End        
------------------------------------------------------------*/ 

/*----------------------------------------------------------
2. Promotion Profile Start        
------------------------------------------------------------*/ 
$('input[name=typepromo]').on("click", function() {
    var type = $(this).val();

    if (type == 1) {
        $('#type').val('pct');
        $('#weeklylabel').html('Weekly discount price (%)');
        $('#monthlylabel').html('Monthly discount price (%)');
        $('#yearlylabel').html('Yearly discount price (%)');
    }

    if (type == 2) {
        $('#type').val('fxd');
        $('#weeklylabel').html('Weekly discount price (Fixed)');
        $('#monthlylabel').html('Monthly discount price (Fixed)');
        $('#yearlylabel').html('Yearly discount price (Fixed)');
    }
});
/*----------------------------------------------------------
2. Promotion Profile End        
------------------------------------------------------------*/ 


/*----------------------------------------------------------
3. Follow Interaction Start        
------------------------------------------------------------*/ 
function actionFollow(user, ucode) {
    $.ajax({
        url: "<?=base_url()?>profile/follow",
        type: "post",
        data: "status="+$("#user" + user).val()+"&follow_id="+ucode,
        success: function (response) {
            var data=JSON.parse(response);
            console.log(data.success);
            if (data.success==true){
                console.log($("#user" + user).val());
                if ($("#user" + user).val() == 'Unfollow') {
                    $("#user" + user).val('Follow');
                    $("#user" + user).removeClass('active');
                } else {
                    console.log("ganti unfollow");
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

function subscribe(ucode,jenis ){
    $.ajax({
        url: "<?=base_url()?>profile/subscribe",
        type: "post",
        data: "ucode="+ucode+"&jenis="+jenis,
        success: function (response) {
            if (response){
                $("#subscribeleft").show();
                $("#subscribebox").hide();
            }
        },
        error: function(jqXHR, textStatus, errorThrown) {
           console.log(textStatus, errorThrown);
        }
    });
}
/*----------------------------------------------------------
3. Follow Interaction End        
------------------------------------------------------------*/ 


/*----------------------------------------------------------
4. Follow & Star Interaction Start        
------------------------------------------------------------*/ 
function actionLike(post) {
    var status;
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
                }else{
                    $("#postlike" + post).addClass('checked');
                }
            }
        },
        error: function(jqXHR, textStatus, errorThrown) {
          console.log(textStatus, errorThrown);
        }
    });
};


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
4. Follow & Star Interaction End        
------------------------------------------------------------*/ 

/*----------------------------------------------------------
5. Click Go To Search Start        
------------------------------------------------------------*/ 
$(document).ready(function(){
    $("#homepagesearch").focus(function(){
        window.location.href = "<?= base_url()?>searching";
    });
});
/*----------------------------------------------------------
5. Click Go To Search End        
------------------------------------------------------------*/ 


/*----------------------------------------------------------
6. Owl Carausel Start        
------------------------------------------------------------*/ 
$(document).ready(function(){
    $('.owl-nonfollow').owlCarousel({
        loop: false,
        margin: 10,
        autoplay: false,
        autoplayTimeout: 5000,
        responsive:{
            0:{
                items:3
            },
            600:{
                items:5
            },
            1000:{
                items:3
            },
            1200:{
                items:5
            }
        }
    });

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
7. Search Data Start        
------------------------------------------------------------*/ 

$('#suggestionslist').hide();
var typingTimer;                //timer identifier
var doneTypingInterval = 3000;  //time in ms, 3 seconds for example
var $input = $('#search_data');
let typingCount = 0;

//on keyup, start the countdown
$input.on('keyup', function (e) {
    clearTimeout(typingTimer);
    typingTimer = setTimeout(doneTyping, doneTypingInterval);
    var lengthIn = $(this).val().length; 

    if (e.keyCode === 8) {
        if(lengthIn === 0){
            $('.spinner-search').hide();
            $('.fa-magnifying-glass').show();  
        }
    }else{
        if(lengthIn === 2){
            $('#searching-icon').append('<div id="spinner-searching" class="spinner-border spinner-search spinner-border-sm" role="status"> <span class="visually-hidden">Loading...</span> </div>');
            $('.fa-magnifying-glass').hide();
        }
    }

});

//on keydown, clear the countdown 
$input.on('keydown', function (e) {
    clearTimeout(typingTimer);
    
});

//user is "finished typing," do something
function doneTyping () {
  //do something
    var input=$('#search_data').val();
    if (input.length < 3) {
        $('#suggestionslist').hide();
    } else {
        $.ajax({
            url: "<?=base_url()?>searching/member_search?term="+input,
            success: function(data, response) {
                $('.spinner-search').hide();
                $('.fa-magnifying-glass').show();
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


/*----------------------------------------------------------
8. Readmore For Guest Profile Start
------------------------------------------------------------*/ 

$(function() {  
    $('.article').readmore({
        speed: 75, 
        collapsedHeight: 95, 
        moreLink: `<a class="ac" href="#">Read more</a>`, 
        lessLink: `<a class="ac" href="#">Close</a>`, 
    }); 


    $(document).on( 'shown.bs.tab', 'a[data-bs-toggle=\'tab\']', function (e) {
        $('.article').readmore({
            speed: 75, 
            collapsedHeight: 95, 
            moreLink: `<a class="ac" href="#">Read more</a>`, 
            lessLink: `<a class="ac" href="#">Close</a>`, 
        });


    })
});


var page = 1;
$('.spinner-load-content').hide();
var maxpage = $('#max-page').val();


$(window).scroll(function() {
 
    if ((window.innerHeight + Math.ceil(window.pageYOffset)) >= document.body.offsetHeight) { 
    // if($(window).scrollTop() + window.innerHeight == $(document).height()) {
        if(page != maxpage){
            page++;
            $.ajax({
                url: "<?= base_url()?>homepage/load_more/"+page,
                type: "GET",
                beforeSend: function(){
                    $('.spinner-load-content').show();
                },
                success: function(html, response) {
                    $('.spinner-load-content').hide();
                    $('#load-post-homepage').append(html);
                    
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    alert("ERROR");
                }
            });
        }else{
            Swal.fire({
                html:  `<div class="d-flex justify-content-center">
                            <div>
                                <i class="fas fa-photo-video text-success fs-3"></i>
                            </div>
                            <div class="ms-3">No More Result Found</div>
                        </div>`,
                showConfirmButton: false,
                showCloseButton: true,
                background: '#323436',
                color: '#ffffff',
                position: 'top',
                timer: 4000,
            });
        }
   }
});


/*----------------------------------------------------------
8. Readmore For Guest Profile End
------------------------------------------------------------*/ 


/*----------------------------------------------------------
9. GSAP Scroll Triger Start
------------------------------------------------------------*/ 
gsap.registerPlugin(ScrollTrigger);

let allVideoDivs = gsap.utils.toArray('.vid-post');

allVideoDivs.forEach((videoDiv, i) => {
  
  let videoElem = videoDiv.querySelector('video')
  
  ScrollTrigger.create({
    trigger: videoElem,
    start: 'top 90%',
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

// Otomatis ke pause ketika modal close
$('body').on('hidden.bs.modal', '.modal', function () {
    $('video').trigger('pause');
    $('audio').trigger('pause');
});
/*----------------------------------------------------------
9. GSAP Scroll Triger End
------------------------------------------------------------*/


/*----------------------------------------------------------
10. Toggle for Content Explicit Start
------------------------------------------------------------*/

$('#explicit').on('click', function(){
    localStorage.setItem('explicit', 'yes');
});

let bodyContentHome = document.querySelector("body"),
modeToggleContentHome = body.querySelector(".mode-toggle-content");
    

modeToggleContentHome.addEventListener("click", () =>{
    if(localStorage.getItem("explicit") === 'yes'){
        // console.log('explicit')
        window.location = '<?= base_url()?>homepage/get_content_type?type=explicit'
        
    }else if(localStorage.getItem("explicit") === 'no'){
        // console.log('NON')
        window.location = '<?= base_url()?>homepage/get_content_type?type=non'
        
    }
});



/*----------------------------------------------------------
10. Toggle for Content Explicit End
------------------------------------------------------------*/




</script>