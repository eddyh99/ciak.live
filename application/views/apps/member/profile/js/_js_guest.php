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

function subscribe(ucode, jenis){
    $.ajax({
        url: `<?= base_url()?>profile/subscribe`,
        type: "POST",
        data: "ucode="+ucode+"&jenis="+jenis,
        success: function(html) {
            //location.reload();
        },
        error: function(jqXHR, textStatus, errorThrown) {
            //munculin toast errornya
            console.log("ERROR");
        }
    });
}


</script>