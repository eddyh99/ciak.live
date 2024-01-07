<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-datetimepicker/2.5.20/jquery.datetimepicker.min.css"/>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-datetimepicker/2.5.20/jquery.datetimepicker.full.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<!--trial tui-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/fabric.js/3.3.2/fabric.js"></script>
<script src="https://nhn.github.io/tui.image-editor/latest/examples/js/theme/black-theme.js"></script>
<script src="https://uicdn.toast.com/tui.code-snippet/v1.5.0/tui-code-snippet.min.js"></script>
<script src="https://uicdn.toast.com/tui-color-picker/v2.2.3/tui-color-picker.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/FileSaver.js/1.3.3/FileSaver.min.js"></script>
<script src="https://nhn.github.io/tui.image-editor/latest/examples/js/theme/white-theme.js"></script>
<script src="https://uicdn.toast.com/tui-image-editor/latest/tui-image-editor.js"></script>

<style>
    .tui-image-editor-download-btn {
        display: inline-block;
        position: relative;
        width: 120px;
        height: 40px;
        padding: 0;
        line-height: 40px;
        outline: none;
        border-radius: 20px;
        border: 1px solid #ddd;
        font-family: 'Noto Sans',sans-serif;
        font-size: 12px;
        font-weight: bold;
        cursor: pointer;
        vertical-align: middle;
        letter-spacing: .3px;
        text-align: center;
        background-color: #03B115;
        color: #ffffff;
    }
</style>

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
    * 5. Preview Video
    * 6. Change Type Post on Image, Video, Attachment
*/




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

var images_edit = [];
var formdata = new FormData();

<?php foreach($edit->post_media as $dt){ ?>
    console.log('<?= $dt->imgorg ?>');

    toDataURL('<?= $dt->imgorg ?>', function(dataUrl) {
    
        images_edit.push(dataUrl)
    
        $('#img-preview-post').hide();
        $('#header-preview-text').hide();
        if(images_edit.length != 0){
            $('#img-preview-post').show();
            for(let i = 0; i < images_edit.length; i++){
                $('.carousel-inner').append('<div class="carousel-item '+(i ===  0? "active" : "")+'"><img class="d-block w-100 img-edit" src="'+images_edit[i]+'"/><span class="close-img-post fs-5" onClick="del('+i+');">X</span></div>');
            }
        }else {
            $('#img-preview-post').hide();
        }
        
    })

<?php } ?>





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
    localforage.getItem('img_save', function (err, value) {
        var dataImg=JSON.parse(value);
        if(dataImg == null) {
            console.log("");
        }else {
            $('#img-preview-post').show();
            localStorage.setItem("is_video",false);

            for(let i = 0; i <= dataImg.length; i++){
                $('.carousel-inner').append('<div class="carousel-item  '+(i ===  0? "active" : "")+'"><img class="d-block w-100" src="'+dataImg[i]+'"/><span class="close-img-post fs-5" onClick="del('+i+')">X</span></div>');
            }
        }
        
    });
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

/*----------------------------------------------------------
4.  Preview Attachment End
------------------------------------------------------------*/ 
/*----------------------------------------------------------
5.  Preview Video Start
------------------------------------------------------------*/   


/*----------------------------------------------------------
5.  Preview Video End
------------------------------------------------------------*/   
/*----------------------------------------------------------
6.  Change Type Post on Image, Video, Attachment Start
------------------------------------------------------------*/     
    $("#tipepost").on("change",function(){
        if ($(this).val()=='public'){
            $("#postprice").show();
            $("#postprice").val("Free");
            $("#postprice").attr("readonly",true);
            $("#forsubs-wrap").hide();
        }else if ($(this).val()=='vs'){
            $("#postprice").show();
            $("#postprice").val("Free");
            $("#postprice").attr("readonly",true);
            $("#forsubs-wrap").hide();
        }else if ($(this).val()=="private"){
            $('#setprice_modal').modal('show');
            $("#postprice").hide();
            $("#forsubs-wrap").hide();
        }else if ($(this).val()=="special"){
            $("#postprice").show();
            $("#postprice").val("0.5");
            $("#postprice").attr("readonly",false);
            $("#forsubs-wrap").hide();
        }else if ($(this).val()=="<?= @$edit->type ?>"){
            $("#postprice").show();
            $("#postprice").val("<?= @$edit->price ?>");
            $("#postprice").attr("readonly",true);
            $("#forsubs-wrap").hide();
        }else {
            $("#postprice").show();
            $("#postprice").val("0.5");
            $("#postprice").attr("readonly",false);
            $("#forsubs-wrap").show();
        }
        
    })

/*----------------------------------------------------------
6.  Change Type Post on Image, Video, Attachment End
------------------------------------------------------------*/   

/*----------------------------------------------------------
7.  Class Explicit Content Start 
------------------------------------------------------------*/   
<?php if($_SESSION['content_type'] == 'explicit'){?>
    document.body.classList.add('explicit');
<?php } else {?>
    document.body.classList.remove('explicit');
<?php } ?>
        
/*----------------------------------------------------------
=7.  Class Explicit Content End 
------------------------------------------------------------*/   


$("#btnUpdate").on("click",function(){
    // console.log(pair[0] + " - " + pair[1]);
    formdata.append("post_id", $("#postid").val());
    formdata.append("title_article", $("#title-optional-post").val());
    formdata.append("post", $("#edit-textarea-post").val());
    formdata.append("tipe", $("#tipepost").val());
    formdata.append("price", $("#postprice").val());
    formdata.append("content_type", $("#contentype").val());
    
    var imgTmp=[];
    imgTmp = $(".img-edit").get().map(function(el) {
    
        return el.src;
    
    });
    
    imgTmp.forEach(b64toblob);
    
    console.log(formdata);
    
    $.ajax({
        url: "<?=base_url()?>post/saveEdit",
        type: "post",
        data: formdata,
        xhr: function(){
            var xhr = $.ajaxSettings.xhr();
            xhr.upload.addEventListener('progress', function(e){

                if(e.lengthComputable){
                    var completed = e.loaded/e.total;
                    var perc = Math.floor(completed * 100);
               
                    // progress.text(perc+'%');
                    progress.attr('aria-valuenow',perc);
                    progress.css('width', perc+'%');
                }
            }, false)

            xhr.addEventListener('progress', function(e){
                if(e.lengthComputable){
                    var completed = e.loaded/e.total;
                    var perc = Math.floor(completed * 100);
                    
                    // progress.text(perc+'%');
                    progress.attr('aria-valuenow',perc);
                    progress.css('width',perc+'%');
                }
            }, false)
            return xhr;
        },
        processData: false,
        contentType: false,
        success: function (response) {
            var data=JSON.parse(response);
            if(data.success == true){
                console.log("sukses");
            }

            if(data.success == false){
                $('#load-edit-profile').hide();
                setTimeout(()=>{
                    Swal.fire({
                        text: "Something Error to upload, please try again",
                        confirmButtonColor: '#03B115',
                        background: '#323436',
                        color: '#ffffff',
                        position: 'top'
                    });
                    $('#progressbar-wrapper').addClass('d-none');
                    progress.css('width', 0+'%');
                }, 2000);
            }
        },
        error: function(jqXHR, textStatus, errorThrown) {
           console.log(textStatus, errorThrown);
        }
    });
    
    
    // for (var pair of formdata.entries()) {
    //     console.log(pair[0] + " - " + pair[1]);
    // }

})


function base64ToBlob(base64, mime) 
    {
        mime = mime || '';
        var sliceSize = 1024;
        var byteChars = window.atob(base64);
        var byteArrays = [];
    
        for (var offset = 0, len = byteChars.length; offset < len; offset += sliceSize) {
            var slice = byteChars.slice(offset, offset + sliceSize);
    
            var byteNumbers = new Array(slice.length);
            for (var i = 0; i < slice.length; i++) {
                byteNumbers[i] = slice.charCodeAt(i);
            }
    
            var byteArray = new Uint8Array(byteNumbers);
    
            byteArrays.push(byteArray);
        }
    
        return new Blob(byteArrays, {type: mime});
    }


function b64toblob(item, index){
    console.log("MASUK BLOB");
    //console.log(item.length);
    if (item.length!=0){
        // console.log("MASUK SINI");
        var base64ImageContent = item.replace(/^data:image\/(png|jpg|jpeg);base64,/, "");
        var mime = item.match(/data:([a-zA-Z0-9]+\/[a-zA-Z0-9-.+]+).*,.*/);
        var blob = base64ToBlob(base64ImageContent, mime[1]);
        formdata.append("image[]",blob);
    }
}

$("#upload_image").on("change",function (event){
    files=event.target.files;
    ext=$("#upload_image").val().split('.')[1].toLowerCase();
    console.log(ext);

    if (ext=="heic"){
        $.ajax({
                url: "<?=base_url()?>post/convert_heic",
                type: "post",
                contentType: false,
                processData:false,  
                data: formdata,
                success: function(data) {
                    var imageEditor = new tui.ImageEditor('#tui-image-editor-container', {
                        includeUI: {
                            loadImage: {
                                path: data,
                                name: 'sample'
                            },
                            menu: ['text', 'crop', 'filter', 'shape', 'draw',],
                            locale: { // override default English locale to your custom
                                Color: 'Color',
                                Bold: 'Bold',
                                'Text size': 'Font Size'
                            },
                            theme: blackTheme, // or whiteTheme
                            menuBarPosition: 'bottom',
                        },
                        cssMaxHeight: 400,
                        cssMaxWidth: 500,
                        usageStatistics: false,
                    });      
                    function loadFileImg() {
                        $("input[type=file]").trigger("click");
                    }

                    // For Custom When User Load Image default ratio 1:1
                    window.onload = ()=> {
                        imageEditor.setCropzoneRect(1);
                        $('.tie-btn-crop').click(function(){
                            imageEditor.setCropzoneRect(1);
                        });
                    }   

                    // Custom Button Load And Save
                    $('.tui-image-editor-header-buttons div').prepend('<i class="fa-solid fa-camera fs-6 pe-1"></i>');
                    $('.tui-image-editor-header-logo').replaceWith('<span></span>');
                    $(".tui-image-editor-header-buttons .tui-image-editor-download-btn").remove();
                    $('.tui-image-editor-header-buttons div').addClass('btn-load-add-multiple');
                    $(".tui-image-editor-load-btn").attr("accept",".jpg, .png, .jpeg, .gif .heic");
                    $('.tui-image-editor-header-buttons .btn-load-add-multiple .fa-camera ').replaceWith('<span style="font-family: sans-serif;">Next </span>');

                    // Check when 10 times max click
                    $('.btn-load-add-multiple').each( function(){
                        var counter = 0;
                        $(this).click(function(){
                            counter++;

                            if(counter == 9){
                                // $('.btn-add-img-multiple').hide();
                                $('.btn-load-add-multiple').hide();
                            } else {
                                console.log('');
                            }
                        });
                    });

                    // For Save image multiple to localstorage
                    $(document).ready(function () {
                        // Initialitation Array 
                        let = m_data = []

                        // Click Load Button
                        $('.btn-load-add-multiple').on('click', function (e) {

                            // Get Encode IMAGE
                            var imageUrl = imageEditor.toDataURL({
                                format: 'jpeg',
                                quality: 0.5
                            });

                            // For push last images
                            m_data.push(imageUrl);


                            console.log(m_data);
                        })

                        // Click Finish button
                        $('.tui-image-editor-download-btn').on('click', function (e) {

                            // Get Encode IMAGE
                            var imageUrl = imageEditor.toDataURL({
                                format: 'jpeg',
                                quality: 0.5
                            });
                            // For Push Each Image
                            m_data.push(imageUrl);

                            // Save to Local Forage
                            localforage.setItem("img_save", JSON.stringify(m_data));
                        });

                    })
                }
            });
    }else{
        imageurl=URL.createObjectURL(files[0]);
        // Initialitation Config Tui Image Editor 
        var imageEditor = new tui.ImageEditor('#tui-image-editor-container', {
            includeUI: {
                loadImage: {
                    path: imageurl,
                    name: 'sample'
                },
                menu: ['text', 'crop', 'filter', 'shape', 'draw',],
                locale: { // override default English locale to your custom
                    Color: 'Color',
                    Bold: 'Bold',
                    'Text size': 'Font Size'
                },
                theme: blackTheme, // or whiteTheme
                menuBarPosition: 'bottom',
            },
            cssMaxHeight: 400,
            cssMaxWidth: 500,
            // cssMaxWidth: document.getElementById('tui-image-editor-container').clientWidth,
            usageStatistics: false,
        });

        function loadFileImg() {
            $("input[type=file]").trigger("click");
            // document.querySelector('.tui-image-editor-load-btn').click();
        }

        // setTimeout(function () {
        //     $("input[type=file]").trigger("click");
        // }, 2000);

        // For Custom When User Load Image default ratio 1:1
        window.onload = ()=> {
            imageEditor.setCropzoneRect(1);
            $('.tie-btn-crop').click(function(){
                imageEditor.setCropzoneRect(1);
            });
        }   

        // Custom Button Load And Save
        // $('.tui-image-editor-header-buttons .tui-image-editor-download-btn').replaceWith('<a><button class="tui-image-editor-download-btn bg-warning">Finish</button></a>');
        $('.tui-image-editor-header-buttons div').prepend('<i class="fa-solid fa-camera fs-6 pe-1"></i>');
        // $('.tui-image-editor-header-logo').replaceWith('<a><button class="tui-image-editor-download-btn  bg-warning">Finish</button></a>');
        $('.tui-image-editor-header-logo').replaceWith('<span></span>');
        $(".tui-image-editor-header-buttons .tui-image-editor-download-btn").remove();
        $('.tui-image-editor-header-buttons div').addClass('btn-load-add-multiple');
        $(".tui-image-editor-load-btn").attr("accept",".jpg, .png, .jpeg, .gif .heic");
        $('.tui-image-editor-header-buttons .btn-load-add-multiple .fa-camera ').replaceWith('<span style="font-family: sans-serif;">Next </span>');

        // Check when 10 times max click
        $('.btn-load-add-multiple').each( function(){
            var counter = 0;
            $(this).click(function(){
                counter++;

                if(counter == 9){
                    // $('.btn-add-img-multiple').hide();
                    $('.btn-load-add-multiple').hide();
                } else {
                    console.log('');
                }
            });
        });

        // For Save image multiple to localstorage
        $(document).ready(function () {
            // Initialitation Array 
            let m_data = [];
            

            // Click Load Button
            $('.btn-load-add-multiple').on('click', function (e) {

                // Get Encode IMAGE
                var imageUrl = imageEditor.toDataURL({
                    format: 'jpeg',
                    quality: 0.5
                });

                // For push last images
                m_data.push(imageUrl);

            })

            // Click Finish button
            $('.tui-image-editor-download-btn').on('click', function (e) {

                // Get Encode IMAGE
                var imageUrl = imageEditor.toDataURL({
                    format: 'jpeg',
                    quality: 0.5
                });
                // For Push Each Image
                m_data.push(imageUrl);

                m_data.forEach(b64toblob);


                for(let i = 0; i < m_data.length; i++){
                    $('.carousel-inner').append('<div class="carousel-item '+(i ===  0? "active" : "")+'"><img class="d-block w-100" src="'+m_data[i]+'"/><span class="close-img-post fs-5" onClick="del('+i+');">X</span></div>');
                }
                $("#tuieditor").modal("hide");
                // Save to Local Forage
                // localforage.setItem("img_save", JSON.stringify(m_data));
            });



        })
    }
    
    $("#tuieditor").modal("show");
    
})

</script>