<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/fabric.js/3.3.2/fabric.js"></script>
<script src="https://nhn.github.io/tui.image-editor/latest/examples/js/theme/black-theme.js"></script>
<script src="https://uicdn.toast.com/tui.code-snippet/v1.5.0/tui-code-snippet.min.js"></script>
<script src="https://uicdn.toast.com/tui-color-picker/v2.2.3/tui-color-picker.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/FileSaver.js/1.3.3/FileSaver.min.js"></script>
<script src="https://nhn.github.io/tui.image-editor/latest/examples/js/theme/white-theme.js"></script>
<script src="https://uicdn.toast.com/tui-image-editor/latest/tui-image-editor.js"></script>
<script>
    // FOr Settings Default
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
    
    var imageurl = localStorage.getItem("imageurl");
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
        cssMaxHeight: 500,
        cssMaxWidth: document.getElementById('tui-image-editor-container').clientWidth,
        usageStatistics: false,
    });

    window.onresize = function() {
        imageEditor.ui.resizeEditor();
    }


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
    $('.tui-image-editor-header-buttons .tui-image-editor-download-btn').replaceWith('<a><button class="tui-image-editor-download-btn bg-warning">Finish</button></a>');
    $('.tui-image-editor-header-buttons div').prepend('<i class="fa-solid fa-camera fs-6 pe-1"></i>');
    $('.tui-image-editor-header-logo').replaceWith('<a href="<?= base_url()?>post"><img class="img-fluid d-none d-md-inline-block ps-4 pt-2" src="<?= base_url()?>assets/img/new-ciak/logo.png" height="100" width="100" alt="mp"><button class="btn-cancel-upload ms-2 mt-2" style="border-radius: 99999px;"><i class="fas fa-window-close pe-2"></i>Cancel</button></a>');
    $('.tui-image-editor-header-buttons div').addClass('btn-load-add-multiple');
    $(".tui-image-editor-load-btn").attr("accept",".jpg, .png, .jpeg, .gif");
   

    

    // Check when 10 times max click
    $('.btn-load-add-multiple').each( function(){
        var counter = 0;
        $(this).click(function(){
            counter++;

            if(counter > 0 ){
                $('.tui-image-editor-header-buttons .btn-load-add-multiple .fa-camera ').replaceWith('<span style="font-family: sans-serif;">Next Image</span>');
            }

            if(counter == 10){
                $('.btn-add-img-multiple').hide();
                $('.btn-load-add-multiple').hide();
            } else {
                console.log('');
            }
        });
    });

    // Settings Hide LoadBtn
    var loadBtn = $('.tui-image-editor-header-buttons div:first');
    if (settings.hideLoadBtn) {
        loadBtn.hide();
    }

    // Hide and SHow Header Button
    $('.tui-image-editor-download-btn').hide();

    $(".btn-load-add-multiple").click(function(){
        $('.tui-image-editor-download-btn').show();
    });
    
    // For Save image multiple to localstorage
    $(document).ready(function () {
          
  
        // Initialitation Array 
        let = m_data = []
        $('.tui-image-editor-download-btn').on('click', function (e) {

            // Get Encode IMAGE
            var imageUrl = imageEditor.toDataURL({
                format: 'jpeg',
                quality: 0.5
            });

            // For push last images
            m_data.push(imageUrl);
            
            // Save into localStorage
            localforage.setItem("gbr", JSON.stringify(m_data));
            // localStorage.setItem("is_video",false);
            //localStorage.setItem('img', JSON.stringify(m_data));
            window.location.href = '<?= base_url()?>post?type=<?=$_SESSION["content_type"]?>';

        });

        // When Click Load button
        $('.btn-load-add-multiple').on('click', function (e) {
    
            // Get Encode IMAGE
            var imageUrl = imageEditor.toDataURL({
                format: 'jpeg',
                quality: 0.5
            });

            // For Push Each Image
            m_data.push(imageUrl);

        });
    });

</script>