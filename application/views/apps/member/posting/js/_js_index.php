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

<script>

/*----------------------------------------------------------
Modul Name  : _js_index Post
Desc        : Modul ini di digunakan untuk melakukan 
            berinteraksi dengan postingan image, video, attachment,
            Live, Cam2Cam, Meeting Room
        
------------------------------------------------------------*/ 

/*
    * TABLE OF CONTENTS
    *
    * 1. Summer Note
    * 2. Hide Show Icon Post Img, Vid, Attch
    * 3. Preview Image
    * 4. Set Localstorage Textare & Discard Post
    * 5. Tabs Button Change Post
    * 6. Function Blob Image
    * 7. Preview Video
    * 8. Preview Attachment
    * 9. *Process Upload Button
    * 10. Change Type Post on Image, Video, Attachment
    * 11. Settings Live Show
    * 12. Settings Cam2Cam
    * 13. Searching Invite Guest
    * 14. Class Explicit Content
    * 15. Save Set Subscription
    * 16. Show Preview Invite Guest
*/


/*----------------------------------------------------------
1. Summer Note Start
------------------------------------------------------------*/ 
     $(document).ready(function() {
        $('#textarea-post').summernote({
            toolbar: [
                ['style', ['style']],
                ['font', ['bold', 'italic', 'underline']],
            ],
            height: 200,
            disableResizeEditor: true,
            disableDragAndDrop: true,
            placeholder: "What's on your mind",
        });
        $("#textarea-post").summernote("removeModule", "autoLink");
        
    });
    $('.note-statusbar').hide(); 
/*----------------------------------------------------------
1. Summer Note End
------------------------------------------------------------*/ 


/*----------------------------------------------------------
2 Hide Show Icon Post Img, Vid, Attch Start
------------------------------------------------------------*/ 
// for open all icon upload 
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


});
/*----------------------------------------------------------
2 Hide Show Icon Post Img, Vid, Attch End
------------------------------------------------------------*/ 


/*----------------------------------------------------------
3. Preview Image Start
------------------------------------------------------------*/ 
    $('#img-preview-post').hide();
    localforage.getItem('gbr', function (err, value) {
        var dataImg=JSON.parse(value);
        console.log(dataImg);
        if(dataImg == null) {
            console.log("");
        }else {
            if(dataImg.length == '1'){
                localStorage.setItem("is_video",true);
                $('#img-preview-post').hide();
            } else {
                $('#img-preview-post').show();
                localStorage.setItem("is_video",false);

                for(let i = 1; i < dataImg.length; i++){
                    $('.carousel-inner').append('<div class="carousel-item  '+(i ===  1? "active" : "")+'"><img class="d-block w-100" src="'+dataImg[i]+'"/><span class="close-img-post fs-5" onClick="del('+i+')">X</span></div>');
                }
            }
        }
        
    });
    
    // Function for delete image in X button
    function del(index){
        localforage.getItem('gbr', function (err, value) {
            var dataImg=JSON.parse(value);
            dataImg.splice(index, 1);
            localforage.setItem("gbr", JSON.stringify(dataImg));
        });
        $('#myDiv').load('#myDiv')
            // location.replace(location.href.split('#')[0]);
        // e.preventDefault()
        location.reload();
    }

/*----------------------------------------------------------
3. Preview Image End
------------------------------------------------------------*/ 



/*----------------------------------------------------------
4.  Set Localstorage Textare & Discard Pos Start
------------------------------------------------------------*/ 
    let textarea_post = localStorage.getItem('textarea-post');
    let title_optional_post = localStorage.getItem('title-optional-post');
 
    // Set Local storage for text area
    $('.add-textarea-local').click(function() {
        let textarea_input = $("#textarea-post").val();
        let title_optional_input = $("#title-optional-post").val();
        localStorage.setItem('textarea-post', textarea_input);
        localStorage.setItem('title-optional-post', title_optional_input);
    });
    $("#textarea-post").val(textarea_post);
    $("#title-optional-post").val(title_optional_post);

    // Discard All localstorage if already in localstorage
    $('#discard-post').click(function(){
        localStorage.removeItem('textarea-post');
        localStorage.removeItem('title-optional-post');
        localStorage.removeItem('is_video');
        // localforage.clear();
        localforage.clear().then(function() {
            // Run this code once the database has been entirely deleted.
            console.log('Database is now empty.');
        }).catch(function(err) {
            // This code runs if there were any errors
            console.log(err);
        });
    })
/*----------------------------------------------------------
4.  Set Localstorage Textare & Discard Pos End
------------------------------------------------------------*/ 



/*----------------------------------------------------------
5.  Tabs Button Change Post Start
------------------------------------------------------------*/     
    function openTabs(evt, tabName) {
        $("#jenis").val(tabName);
        var i, tabcontent, tablinks;
        tabcontent = document.getElementsByClassName("tabcontent");

        for (i = 0; i < tabcontent.length; i++) {
            tabcontent[i].style.display = "none";
        }
        tablinks = document.getElementsByClassName("tablinks");

        for (i = 0; i < tablinks.length; i++) {
            tablinks[i].className = tablinks[i].className.replace(" active", "");
        }

        document.getElementById(tabName).style.display = "block";
        evt.currentTarget.className += " active";
        if(tabName != 'Post'){
            $('#post-type').hide();
            $('#btnpublish').hide()
        }else{
            $('#post-type').show();
            $('#btnpublish').show()
        }

        if(tabName == 'Post'){
            $('#title-post').text("Post")
        } else if(tabName == 'Live') {
            $('#title-post').text("Live Show")
        } else if(tabName == 'Cam2cam') {
            $('#title-post').text("Cam 2 Cam")
        } else if(tabName == 'Meeting') {
            $('#title-post').text("Meeting Room")
        }
    }

    document.getElementById("defaultOpen").click();
/*----------------------------------------------------------
5.  Tabs Button Change Post End
------------------------------------------------------------*/    


/*----------------------------------------------------------
6.  Function Blob Image Start
------------------------------------------------------------*/    
    let formdata;
    
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
        if ((item.length!=0) && (index>0)){
            var base64ImageContent = item.replace(/^data:image\/(png|jpg|jpeg);base64,/, "");
            var mime = item.match(/data:([a-zA-Z0-9]+\/[a-zA-Z0-9-.+]+).*,.*/);
            var blob = base64ToBlob(base64ImageContent, mime[1]);
            formdata.append("image[]",blob);
        }
    }
/*----------------------------------------------------------
6.  Function Blob Image End
------------------------------------------------------------*/


/*** trial tui ***/
var settings = {
    i18n: { 
            Color: 'Color',
            Bold: 'Bold',
            'Text size': 'Font Size',
            load : 'load',
        },
    imgName : 'Image',
    hideLoadBtn : false,
};
    


$("#upload_image").on("change",function (event){
    files=event.target.files;
    ext=$("#upload_image").val().split('.')[1];
    //if (ext=="heic"){
        formdata = new FormData();
        formdata.append('image', files[0]); 
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
                        cssMaxHeight: 500,
                        cssMaxWidth: document.getElementById('tui-image-editor-container').clientWidth,
                        usageStatistics: false,
                    });      
                }
            });
    // }else{
    //     imageurl=URL.createObjectURL(files[0]);
    //     // Initialitation Config Tui Image Editor 
    //     var imageEditor = new tui.ImageEditor('#tui-image-editor-container', {
    //         includeUI: {
    //             loadImage: {
    //                 path: imageurl,
    //                 name: 'sample'
    //             },
    //             menu: ['text', 'crop', 'filter', 'shape', 'draw',],
    //             locale: { // override default English locale to your custom
    //                 Color: 'Color',
    //                 Bold: 'Bold',
    //                 'Text size': 'Font Size'
    //             },
    //             theme: blackTheme, // or whiteTheme
    //             menuBarPosition: 'bottom',
    //         },
    //         cssMaxHeight: 500,
    //         cssMaxWidth: document.getElementById('tui-image-editor-container').clientWidth,
    //         usageStatistics: false,
    //     });
    // }
    
    $("#tuieditor").modal("show");
    
})

/*----------------------------------------------------------
7.  Preview Video Start
------------------------------------------------------------*/   
    var files
    $("#upload_video").on("change", function(event){
        files = event.target.files;
        for (var i = 0; i < files.length; i++) {
            var f = files[i];
            // Only process video files.
            if (!f.type.match('video.*')) {
                continue;
            }
            var source = document.createElement('video');
            source.width = 280;
            source.height = 240;
            source.controls = true;
            source.classList.add('d-block');
            source.src = URL.createObjectURL(files[i]);
            localStorage.setItem("is_video","video");
            
            $('#img-preview-post').show();
            $('.carousel-inner').append('<div class="carousel-item '+(i ==  1? "active" : "")+' d-block"><div class="d-flex justify-content-center"><video src="'+URL.createObjectURL(files[i])+'" class="d-block" width="280" height="240" controls></video><span class="close-img-post fs-5" onClick="del('+i+')">X</span></div></div>');
        }
    }) ;

/*----------------------------------------------------------
7.  Preview Video End
------------------------------------------------------------*/   


/*----------------------------------------------------------
8.  Preview Attachment Start
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
8.  Preview Attachment End
------------------------------------------------------------*/ 


/*----------------------------------------------------------
9.  Process Upload Button Start
------------------------------------------------------------*/ 
// var id_stitch = $('#id_stitch').val();
$(document).ready(function(){
    $("#btnpublish").on("click",function(){
        formdata = new FormData();
        var jenis=$("#jenis").val();
        var tipepost=$("#tipepost").val();
        var is_video= localStorage.getItem("is_video");
        // var vs_data = $('#vs-preview').html();
        
        // $('#load-edit-profile').show();
        if (jenis=="Post"){
            if (tipepost=="special" || tipepost=="download"){
                if (parseFloat($("#postprice").val())<0.5){
                    alert("Minimum post price is 0.5");
                    return;
                }
            }
            
            if (is_video=="video" || is_video==null){
                if (typeof files !== 'undefined'){
                    for (var i = 0; i < files.length; i++) {
                        var f = files[i];
                        formdata.append("video[]",f);
                    }
                }
                
                // if(id_stitch){
                //     console.log("STITCH");
                //     formdata.append("post", $("#textarea-post").val());
                //     formdata.append("tipe", 'vs');
                //     formdata.append("price", 'Free');
                //     formdata.append("stitch", id_stitch);
                // }else{
                //     console.log("NO STITCH");
                //     formdata.append("post", $("#textarea-post").val());
                //     formdata.append("tipe",$("#tipepost").val());
                //     formdata.append("price",$("#postprice").val());
                // }
                
                formdata.append("title_article", $("#title-optional-post").val());
                formdata.append("post", $("#textarea-post").val());
                formdata.append("tipe",$("#tipepost").val());
                formdata.append("price",$("#postprice").val());

                
                $('#progressbar-wrapper').removeClass('d-none');
                var progress = $('.progress-bar');

                $.ajax({
                 
                    url: "<?=base_url()?>post/savepost",
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
                            localStorage.removeItem('textarea-post');
                            localStorage.removeItem('title-optional-post');
                            localStorage.removeItem('is_video');
                            location.replace('<?= base_url()?>homepage');
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

            }else if (is_video=="attach"){
                console.log("100-attach");
                if (typeof files !== 'undefined'){
                    console.log("200");
                    for (var i = 0; i < files.length; i++) {
                        var f = files[i];
                        console.log(f);
                        formdata.append("attach[]",f);
                    }
                }
                formdata.append("title_article", $("#title-optional-post").val());
                formdata.append("post",$("#textarea-post").val());
                formdata.append("tipe",$("#tipepost").val());
                formdata.append("price",$("#postprice").val());
    
                $('#progressbar-wrapper').removeClass('d-none');
                var progress = $('.progress-bar');

                $.ajax({
                    url: "<?=base_url()?>post/savepost",
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
                            localStorage.removeItem('textarea-post');
                            localStorage.removeItem('title-optional-post');
                            localStorage.removeItem('is_video');
                            location.replace('<?= base_url()?>homepage');
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
                       alert(errorThrown);
                    }
                });
            }else{
                localforage.getItem('gbr', function (err, value) {
                    var dataImg=JSON.parse(value);
                    if(dataImg != null) {
                        dataImg.forEach(b64toblob);
                        formdata.append("title_article", $("#title-optional-post").val());
                        formdata.append("post",$("#textarea-post").val());
                        formdata.append("tipe",$("#tipepost").val());
                        formdata.append("price",$("#postprice").val());
                        
                        $('#progressbar-wrapper').removeClass('d-none');
                        var progress = $('.progress-bar');

                        $.ajax({
                            url: "<?=base_url()?>post/savepost",
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
                                    localStorage.removeItem('textarea-post');
                                    localStorage.removeItem('title-optional-post');
                                    localforage.clear();
                                    localStorage.removeItem('is_video');
                                    location.replace('<?= base_url()?>homepage');
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
                    }
                });
            }
        }
    })
})
/*----------------------------------------------------------
9.  Process Upload Button End
------------------------------------------------------------*/ 


/*----------------------------------------------------------
10.  Change Type Post on Image, Video, Attachment Start
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
        }else{
            $("#postprice").show();
            $("#postprice").val("0.5");
            $("#postprice").attr("readonly",false);
            $("#forsubs-wrap").show();
        }
        
    })
/*----------------------------------------------------------
10.  Change Type Post on Image, Video, Attachment End
------------------------------------------------------------*/   


/*----------------------------------------------------------
11.  Settings Live Show Start 
------------------------------------------------------------*/       
/*Setting Live Show*/
    $("#row_durasi").hide();
    $("#priceshow").hide();
    $("#schedule").hide();
    
    $("#time").on("change",function(){
        if ($(this).val()=="schedule"){
            $("#schedule").show();
        }else{
            $("#schedule").hide();
            $("#schedule").val('');
        }
    });
    
    $("#pilih_price").on("change",function(){
       if ($(this).val()=="ticket"){
            $("#row_durasi").show();
       }else{
            $("#row_durasi").hide();
       }
       
       if ($(this).val()=="free"){
           $("#priceshow").hide();
       }else{
           $("#priceshow").show();
       }
    });
    
    $("#schedule").datetimepicker({
        minDate:0,
        minTime:0
        });

    function validate(){
        if ($("#time").val()=="schedule"){
            if (("#schedule").val().length==0){
                alert("Please choose your schedule performance")
                return false;
            }
        }
        
        if ($("#pilih_price").val()=="ticket"){
            if ((parseFloat($("#priceshow").val())<0.5) || ($("#priceshow").val().length==0)) {
                alert("Minimum ticket Price is 0.5");
                return false;
            }
        }else if ($("#pilih_price").val()=="minutes"){
            if ((parseFloat($("#priceshow").val())<0.5) || ($("#priceshow").val().length==0)) {
                alert("Minimum show Price is 0.5");
                return false;
            }
        }
        
        
        if ($("pilih_price").val()=="free"){
           $("#priceshow").val('0');
        }
        
        return true

    };
/*----------------------------------------------------------
11.  Settings Live Show End 
------------------------------------------------------------*/   


/*----------------------------------------------------------
12.  Settings Cam2Cam Start 
------------------------------------------------------------*/   
    function validatecam(){
        if ((parseFloat($("#pricecam").val())<0.5) || ($("#pricecam").val().length==0)) {
            alert("Minimum Cam 2 Cam service price is 0.5");
            return false;
        }

        return true

    };
/*----------------------------------------------------------
12.  Settings Cam2Cam End 
------------------------------------------------------------*/   


/*----------------------------------------------------------
13.  Searching Invite Guest Start 
------------------------------------------------------------*/ 

    // CAM2CAM
    $('#suggestionslist').hide();
    //setup before functions
    var typingTimer;             
    var doneTypingInterval = 5000;  
    var $input = $('#search_data_invt');

    //on keyup, start the countdown
    $input.on('keyup', function () {
        clearTimeout(typingTimer);
        typingTimer = setTimeout(doneTyping(), doneTypingInterval);
    });

    //on keydown, clear the countdown 
    $input.on('keydown', function () {
        clearTimeout(typingTimer);
    });

    //user is "finished typing," do something
    function doneTyping () {
        var input=$('#search_data_invt').val();
        if (input.length < 3) {
            $('#suggestionslist').hide();
        } else {
            console.log("200 search");
            $.ajax({
                url: "<?=base_url()?>post/invite_search?term="+input,
                success: function(data, response) {
                    $('.spinner-search').hide();
                    $('.fa-magnifying-glass').show();
                    console.log(response);
                    // return success
                    if (data.length > 0) {
                        $('#suggestionslist').html(data);
                        $('#suggestionslist').show();
                    }
                }
            });

        }  
    }

    // MEETINGROOM SEARCHING
    $('#suggestionslistmeeting').hide();
    //setup before functions
    var typingTimerMeeting;             
    var doneTypingIntervalMeeting = 5000;  
    var $inputMeeting = $('#search_data_invt_meeting');

    //on keyup, start the countdown
    $inputMeeting.on('keyup', function () {
        clearTimeout(typingTimerMeeting);
        typingTimerMeeting = setTimeout(doneTypingMeeting(), doneTypingIntervalMeeting);
    });

    //on keydown, clear the countdown 
    $inputMeeting.on('keydown', function () {
        clearTimeout(typingTimerMeeting);
    });

    //user is "finished typing," do something
    function doneTypingMeeting () {
        var inputMeeting=$('#search_data_invt_meeting').val();
        if (inputMeeting.length < 3) {
            $('#suggestionslistmeeting').hide();
        } else {
            console.log("200 search");
            $.ajax({
                url: "<?=base_url()?>post/invite_search?term="+inputMeeting,
                success: function(data, response) {
                    $('.spinner-search').hide();
                    $('.fa-magnifying-glass').show();
                    console.log(response);
                    // return success
                    if (data.length > 0) {
                        $('#suggestionslistmeeting').html(data);
                        $('#suggestionslistmeeting').show();
                    }
                }
            });

        }  
    }
/*----------------------------------------------------------
13.  Searching Invite Guest End 
------------------------------------------------------------*/   

/*----------------------------------------------------------
14.  Class Explicit Content Start 
------------------------------------------------------------*/   
<?php if($_SESSION['content_type'] == 'explicit'){?>
    document.body.classList.add('explicit');
<?php } else {?>
    document.body.classList.remove('explicit');
<?php } ?>
        
/*----------------------------------------------------------
14.  Class Explicit Content End 
------------------------------------------------------------*/   

/*----------------------------------------------------------
15. Save Set Subscription Start 
------------------------------------------------------------*/   
$(document).ready(function(){
    $('#formSetSubs').submit(function(e){
        e.preventDefault();

        $.ajax({
            url: '<?=base_url()?>post/savesubscription',
            type: 'POST',
            data: $("#formSetSubs").serialize(),
            success: function (response) {
                let ress = JSON.parse(response)
                if(ress.code == '200'){
                    $('#setprice_modal').modal('hide');
                    Swal.fire({
                        text: 'Set Subscription Successfully',
                        showCloseButton: true,
                        showConfirmButton: false,
                        background: '#323436',
                        color: '#ffffff',
                        position: 'top'
                    });
                }else{
                    Swal.fire({
                        text: 'Set Subscription Error',
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
15. Save Set Subscription End
------------------------------------------------------------*/  


/*----------------------------------------------------------
16. Show Preview Invite Guest Start
------------------------------------------------------------*/  

function invite_guest_active(id, img, username){
    $('.people').removeClass('active');
    $('#invite1').prop('checked', false);
    $('#invite2').prop('checked', false);

    $('.people-cam2cam'+id).addClass('active');
    $('#guestcam').val(id);
    $('#meetingcam').val(id);
    $('#invite1').prop('checked', true);

    $('.preview-cam2cam-guest').removeClass('d-none');
    $('#img-preview-cam2cam-guest').attr('src', img);
    $('#username-preview-cam2cam-guest').text(username);
    $('#check-preview-cam2cam-guest').addClass('fa-check');

    $('.preview-meeting-guest').removeClass('d-none');
    $('#img-preview-meeting-guest').attr('src', img);
    $('#username-preview-meeting-guest').text(username);
    $('#check-preview-meeting-guest').addClass('fa-check');

}

$('#invite2').click(function(){
    $('.preview-meeting-guest').addClass('d-none');
})
/*----------------------------------------------------------
16. Show Preview Invite Guest End
------------------------------------------------------------*/ 

$(document).ready(function() {
    setTimeout(function() {
        $(".alert").alert('close');
    }, 3000);
});


</script>