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

    // Initialitation Config Tui Image Editor
    var imageEditor = new tui.ImageEditor('#tui-image-editor-container', {
        includeUI: {
            loadImage: {
                path: '<?= base_url()?>assets/img/empty-img.png',
                name: 'sample'
            },
            menu: ['text', 'crop', 'filter', 'shape', 'draw',],
            locale: { // override default English locale to your custom
                Color: 'Color',
                Bold: 'Bold',
                'Text size': 'Font Size'
            },
            theme: blackTheme, // or whiteTheme
            initMenu: 'crop',
            menuBarPosition: 'bottom',
        },
        cssMaxWidth: 360,
        cssMaxHeight: 500,
        usageStatistics: false,
    });

    window.onresize = function() {
        imageEditor.ui.resizeEditor();
    }

    // For Custom When User Load Image default ratio 1:1
    window.onload = ()=> {
        imageEditor.setCropzoneRect(1);

        $('.tie-btn-crop').click(function(){
            imageEditor.setCropzoneRect(1);
        });
    }

    // Custom Button Load And Save
    $('.tui-image-editor-header-buttons .tui-image-editor-download-btn').replaceWith('<a href="<?= base_url()?>post"><button class="tui-image-editor-download-btn bg-warning">Finish</button></a>');
    $('.tui-image-editor-header-buttons div').prepend('<i class="fa-solid fa-camera fs-6 pe-1"></i>');
    $('.tui-image-editor-header-logo').replaceWith('<a href="<?= base_url()?>post"><img class="img-fluid ps-4 pt-2" src="<?= base_url()?>assets/img/new-ciak/logo.png" height="100" width="100" alt="mp"></a>');

    
    // Settings Hide LoadBtn
    var loadBtn = $('.tui-image-editor-header-buttons div:first');
    if (settings.hideLoadBtn) {
        loadBtn.hide();
    }

    $('.tui-image-editor-download-btn').hide();
    
    // Hide Header Button
    $(".tui-image-editor-load-btn").click(function(){
        $('.tui-image-editor-download-btn').show();
        // $('.tui-image-editor-header-buttons div').hide();
    });



    $(document).ready(function ($) {
        $('.tui-image-editor-download-btn').on('click', function (e) {

            let m_data = [''];
            
            // Get Encode IMAGE
            var imageUrl = imageEditor.toDataURL({
                format: 'jpeg',
                quality: 0.5
            });

            // Push to array
            m_data.push(imageUrl);
            
            // Save in localstorage
            $_COOKIE["img"]=JSON.stringify(m_data);
            //localStorage.setItem('img', JSON.stringify(m_data));

            // Go to preview image
            window.location.href = '<?= base_url()?>post';

        });
    });


</script>