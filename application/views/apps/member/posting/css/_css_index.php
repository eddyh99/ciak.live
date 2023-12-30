<link rel="stylesheet" href="https://uicdn.toast.com/tui-image-editor/latest/tui-image-editor.css">
<link rel="stylesheet" href="https://uicdn.toast.com/tui-color-picker/v2.2.3/tui-color-picker.css">
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" />

<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">


<style>
    @import url('http://fonts.googleapis.com/css?family=Noto+Sans+TC+Sliced');

    html, body {
        height: 100% !important;
        margin: 0 !important;
    };
    canvas * { font-family:'Noto Sans TC Sliced';}

    .tui-image-editor-submenu-item {
        /* padding: 30px 100px !important; */
        
        display: flex !important;
        justify-content: center !important;
    }

    .tui-image-editor-menu {
        display: flex !important;
        justify-content: center !important;
    }

    .tui-image-editor-button.preset.preset-3-2,
    .tui-image-editor-button.preset.preset-none,
    .tui-image-editor-button.preset.preset-4-3,
    .tui-image-editor-button.preset.preset-5-4, 
    .tui-image-editor-button.preset.preset-7-5,
    .tie-btn-delete,
    .tie-btn-deleteAll,
    .tie-btn-history,
    .tie-btn-reset,
    .tie-btn-redo,
    .tie-btn-undo,
    .tie-btn-hand,
    .tui-image-editor-icpartition {
        display: none !important;
    }

    .tui-image-editor-container .tui-image-editor-help-menu.top {
        width: 99px !important;
    }

    .splide__slide img {
        width: 100%;
        height: auto;
        padding: 2px;
    }

    .splide__track {
        background-color: black;
        padding: 10px;
    }

    .splide {
        width: 100%;
        height: auto;
    }

    .img-preview-post {
        width: auto;
        height: auto;
        /* padding: 25px; */
        padding: 5px 25px 50px 25px;
        position: relative;
    }

    .img-preview-post .cls-post {
        position: absolute;
    }

    .img-preview-post .carousel .carousel-inner .carousel-item  {
        background-color: #000000;
    }
    .img-preview-post .carousel .carousel-inner .carousel-item img {
        height: 250px;
        object-fit: contain;
    }

    .img-preview-post .carousel .carousel-control-prev .carousel-control-prev-icon,
    .img-preview-post .carousel .carousel-control-next .carousel-control-next-icon {
        background-color: green;
    }

    .close-img-post {
        position: absolute;
        z-index: 99;
        right: 16px;
        top: 10px;
        cursor: pointer;
        background-color: #484848;
        padding: 0px 8px;
        border-radius: 9999999px;
    }
    
    .icon-upload-video {
      cursor: pointer;
    }

    /* .tui-image-editor-container .tui-image-editor-main {
        top: 160px
    } */

    .tui-image-editor-header-buttons {
        display: flex !important;
        flex-direction: column !important;
        margin-right: 205px !important;
        gap: 2px;
        z-index: 3;
    }

        
    .tui-image-editor-wrap{
        top: 0 !important;
    }

    /* .tui-image-editor {
        width: 100% !important;
        overflow: hidden;
    }

    .tui-image-editor-canvas-container{
        max-width: 100% !important;
        max-height: auto !important;
    } */

    .tui-image-editor-canvas-container .lower-canvas{
        left: 50% !important;
        transform: translateX(-50%) !important;
    }

    .note-editor .note-toolbar {
        background-color: transparent;
    }

    .note-statusbar {
        display: none;
    }
    .note-editor.note-frame {
        border: transparent !important;
    }
        
    @media (min-width: 375px) {
        .tui-image-editor-header-buttons {
            margin-right: 172px !important;
        }

        .tui-image-editor-container .tui-image-editor-download-btn {
            margin-top: 8px !important;
            margin-left: 20px !important;
        }
        
    }

    @media (min-width: 425px) {
        .tui-image-editor-header-buttons {
            margin-right: 165px !important;
        }
    }

    @media (min-width: 768px) {
        .tui-image-editor-header-buttons {
            margin-right: 90px !important;
        }
    }

    @media (min-width: 992px) {
        .tui-image-editor-header-buttons {
            display: block !important;
            margin-right: 20px !important;
        }
    }

    @media (min-width: 1024px)  {
        /* .tui-image-editor-wrap{
            top: 100px !important;
        } */
    } 

    @media (min-width: 1200px) {
        .tui-image-editor-header-buttons {
            display: block !important;
            /* margin-right: 0px !important; */
        }

        /* .tui-image-editor-container .tui-image-editor-main {
            top: 60px
        } */
    }


</style>