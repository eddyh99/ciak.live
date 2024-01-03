<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-datetimepicker/2.5.20/jquery.datetimepicker.min.css"/>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-datetimepicker/2.5.20/jquery.datetimepicker.full.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>



<script>
/*----------------------------------------------------------
    Modul Name  : _js_index Edit Post
    Desc        : Modul ini di digunakan untuk melakukan 
                  berinteraksi dengan Edit Postingan image, video, attachment
        
------------------------------------------------------------*/ 

/*
    * TABLE OF CONTENTS
    *
    * 1. Summer Note
    * 2. Hide Show Icon Post Img, Vid, Attch
    * 3. Preview Image
    * 4. Preview Attachment
*/
var images_edit = [];
<?php foreach($edit->post_media as $dt){ ?>
    // alert('<?= $dt->id ?>');
    console.log('<?= $dt->id ?>');
    images_edit.push('<?= $dt->imgorg ?>');
    localforage.setItem("img_edit", JSON.stringify(images_edit));
<?php } ?>

console.log(images_edit);


/*----------------------------------------------------------
1. Summer Note Start
------------------------------------------------------------*/ 
$(document).ready(function() {
    $('#edit-textarea-post').summernote({
        toolbar: [
            ['style', ['style']],
            ['font', ['bold', 'italic', 'underline']],
        ],
        height: 200,
        disableResizeEditor: true,
        disableDragAndDrop: true,
        placeholder: "What's on your mind",
    });
    $("#edit-textarea-post").summernote("removeModule", "autoLink");
    
});
$('.note-statusbar').hide(); 
/*----------------------------------------------------------
1. Summer Note End
------------------------------------------------------------*/


/*----------------------------------------------------------
2 Hide Show Icon Post Img, Vid, Attch Start
------------------------------------------------------------*/ 
$(document).ready(function(){
    $("#toggle-iconpost").click(function(e) {
        e.preventDefault();
        $("#hidden-iconpost").toggle();
    });

    $(".icon-upload-video").click(function() {
        $("#hidden-iconpost").toggle();
        localforage.clear().then(function() {
                // Run this code once the database has been entirely deleted.
            console.log('Database is now empty.');
        }).catch(function(err) {
            // This code runs if there were any errors
            console.log(err);
        });
    });

    $(".icon-upload-attach").click(function() {
        $("#hidden-iconpost").toggle();
        $('select[name*="tipepost"] option[value="special"]').remove();
    });

});
/*----------------------------------------------------------
2 Hide Show Icon Post Img, Vid, Attch End
------------------------------------------------------------*/ 

/*----------------------------------------------------------
3. Preview Image Start
------------------------------------------------------------*/ 

$('#img-preview-post').hide();
$('#header-preview-text').hide();
if(images_edit.length != 0){
    $('#img-preview-post').show();
    for(let i = 0; i < images_edit.length; i++){
        $('.carousel-inner').append('<div class="carousel-item '+(i ===  0? "active" : "")+'"><img class="d-block w-100" src="'+images_edit[i]+'"/><span class="close-img-post fs-5" onClick="del('+i+');">X</span></div>');
    }
}else {
    console.log("HIDE ONLY");
    $('#img-preview-post').hide();
}

// Function for delete image in X button
function del(index){
    
    // Remove element HTML
    $('.carousel-item').remove();
    
    images_edit.splice(index, 1);
    if(images_edit.length != 0){
        $('#img-preview-post').show();
        for(let i = 0; i < images_edit.length; i++){
            $('.carousel-inner').append('<div class="carousel-item '+(i ===  0? "active" : "")+'"><img class="d-block w-100" src="'+images_edit[i]+'"/><span class="close-img-post fs-5" onClick="del('+i+');">X</span></div>');
        }
    }else {
        console.log("HIDE ONLY");
        $('#img-preview-post').hide();
    }
    return false;
}


// $('#img-preview-post').hide();
// localforage.getItem('img_edit', function (err, value) {
//     var dataImg=JSON.parse(value);
//     console.log(typeof dataImg.length);
//     if(dataImg == null) {
//         console.log("");
//     }else {
//         if(dataImg.length < 1){
//             localStorage.setItem("is_video",true);
//             $('#img-preview-post').hide();
//             console.log("HIDE");
//         } else {
//             console.log("MASUK");
//             $('#img-preview-post').show();
//             localStorage.setItem("is_video",false);

//             for(let i = 0; i < dataImg.length; i++){
//                 $('.carousel-inner').append('<div class="carousel-item  '+(i ===  0? "active" : "")+'"><img class="d-block w-100" src="'+dataImg[i]+'"/><span class="close-img-post fs-5" onClick="del('+i+')">X</span></div>');
//             }
//         }
//     }
// });

// Function for delete image in X button
// function del(index){
//     // index.preventDefault()
//     localforage.getItem('img_edit', function (err, value) {
//         var dataImg=JSON.parse(value);
//         dataImg.splice(index, 1);
//         localforage.setItem("img_edit", JSON.stringify(dataImg));
//     });
//     $('#myDiv').load('#myDiv')
//         // location.replace(location.href.split('#')[0]);
//     location.reload();
// }



/*----------------------------------------------------------
3. Preview Image End
------------------------------------------------------------*/ 

/*----------------------------------------------------------
4.  Preview Attachment Start
------------------------------------------------------------*/   
$(function() {
    $('#header-preview-text').hide();
    $('#upload_attch').on('change', function(){
        var input = document.getElementById('upload_attch');
        var children = "";
        if(this.files[0].size > 50097152){
            Swal.fire({
                text: "File is too big! max 50MB",
                showCloseButton: true,
                showConfirmButton: false,
                background: '#323436',
                color: '#ffffff',
                position: 'top'
            });
            this.value = "";
        }else{
            files = input.files;
            localStorage.setItem("is_video","attach");
            for (var i = 0; i < input.files.length; ++i) {
                children += '<li class="text-preview-attch">' + input.files.item(i).name + '</li>';
            }
            $('#header-preview-text').show();
            $('#attch-preview-post').append('<ul>'+children+'</ul>');
        }
    })
});
/*----------------------------------------------------------
4.  Preview Attachment End
------------------------------------------------------------*/ 

</script>