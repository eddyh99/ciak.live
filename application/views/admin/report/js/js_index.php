<link href="https://cdn.jsdelivr.net/npm/jquery-datatables-checkboxes@1.2.13/css/dataTables.checkboxes.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/jquery-datatables-checkboxes@1.2.13/js/dataTables.checkboxes.min.js"></script>
<script src="https://cdn.datatables.net/plug-ins/1.13.2/api/sum().js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/timeago.js/2.0.2/timeago.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/timeago.js/2.0.2/timeago.locales.min.js"></script>

<!-- DATE PICKER -->
<link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
<script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
<script>

function showModal(){
    $('.modal').on('show.bs.modal', function (event) {
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
    });

    
}

var tblactive =
    $('#table_post').DataTable({
        "scrollX": true,
        "responsive": true,
        "ajax": {
            "url": "<?= base_url() ?>godmode/reported/get_all",
            "type": "POST",
            "data": function(d) {
                d.category = $("#category").val()
            },
            "dataSrc": function(data) {
                console.log(data);
                return data;
            },
        },
        order: [
            [3, 'desc']
        ],
        "pageLength": 100,
        "aoColumnDefs": [{
            "aTargets": [5],
            "mData": null,
            "mRender": function(data, type, full, meta) {
                
                var now = Math.round(Date.now()/1000);
                var from_time = Math.round(Date.parse(full.post_time)/1000);
                var selisih = Math.round((now - from_time)/60);                
                var hasil;

                if (selisih < 60){
                    hasil = selisih + " minutes ago";
                }else if(selisih > 60 && selisih < 1400){
                    hasil = Math.round(selisih/60) + " hour ago";
                }else if(selisih>1440 && selisih<2880){
                    hasil = "Yesterday";
                }else{
                    hasil = full.post_time;
                }                       

                var button = `<a  href="javascript:void(0);" class="m-1 btn btn-secondary btn-sm" data-bs-toggle="modal" onclick="showModal()" data-bs-target="#viewReport${full.id_post}">
                                    <i class="fa-solid fa-magnifying-glass"></i>
                                </a>
                                <div class="modal fade" id="viewReport${full.id_post}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-lg">
                                        <div class="modal-content">
                                        <div class="modal-header">
                                            <div>
                                                <h5 class="modal-title" id="exampleModalLabel">Preview Report (${full.category})</h5>
                                                ${full.status == 'active' ? 
                                                    '<a href="<?= base_url() ?>godmode/reported/post_lock/' +full.id_post +'" title="Lock Post" class="m-1 btn btn-danger btn-sm"><i class="fa-solid fa-lock"></i></a>' 
                                                    : '<a href="<?= base_url() ?>godmode/reported/unlockpost/' +full.id_post +'" title="Unlock Post" class="m-1 btn btn-danger btn-sm"><i class="fa-solid fa-lock-open"></i></a> ' 
                                                }
                                                <a href="<?= base_url() ?>godmode/reported/delpost/${full.id_post}" title="Delete Post" class="m-1 btn btn-warning btn-sm"><i class="fa-solid fa-trash"></i></a>
                                                <a href="<?= base_url() ?>godmode/reported/dismisspost/${full.id_post}" title="Dismiss Report" class="m-1 btn btn-warning btn-sm">Dismiss Report</a>
                                            </div>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="modal-preview-body d-flex justify-content-between">
                                                    <div class="d-flex">
                                                        <div class="me-2">
                                                            <img src="${full.profile}" class="rounded-circle pp-preview-report" alt="img">
                                                        </div>
                                                        <div>
                                                            <h4>${full.username}</h4>
                                                            <span>
                                                                ${hasil}
                                                            </span>
                                                        </div>
                                                    </div>
                                                    <div>
                                                        <form action="<?= base_url()?>godmode/reported/change_explicit" method="post">
                                                            <input type="hidden" class="form-control" id="id" name="id" value="${full.id_post}">
                                                            <select name="content_type" class="form-select category-report">
                                                                <option value="">--Choose Content--</option>
                                                                <option value="explicit">Explicit</option>
                                                                <option value="non explicit">Non Explicit</option>
                                                            </select>
                                                            <button type="submit" id="change_content_type" class="btn btn-main-green">Change Content</button>
                                                        </form>
                                                    </div>
                                                </div>
                                                <div class="mt-3">
                                                    <h1>
                                                        ${(full.title_article == null) ? '' : full.title_article}
                                                    </h1>
                                                </div>
                                                <div class="owl-preview-report">
                                                    <div class="owl-carousel owl-posts owl-theme">
                                                        ${( function image(){
                                                            media = ""
                                                            if(full.post_media.length !== 0){
                                                                full.post_media.forEach(dt =>{
                                                                    if(dt.media_type == 'non attach'){
                                                                        if(dt.imgorg.substr(-3) == 'mp4'){
                                                                            media += `
                                                                                <div class="item">
                                                                                    <div class="img">
                                                                                        <div class="vid-post">
                                                                                            <video width="100%" height="300px" loop poster="" controls controlsList="nodownload" class="d-block mx-auto videoplayer-post"> 
                                                                                                <source src="${dt.imgorg}" type="video/mp4">
                                                                                            </video>                                               
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            `
                                                                        }else{
                                                                            media += `
                                                                                <div class="item">
                                                                                    <div class="img">
                                                                                        <img src="${dt.imgorg}" class="img-post-report" alt="">
                                                                                    </div>
                                                                                </div>
                                                                            `
                                                                        }
                                                                    }
                                                                })
                                                            }
                                                            return media
                                                        })()}
                                                    </div>
                                                </div>
                                                <article class="article mt-3">
                                                    <div class="accordion" id="accordionExample">
                                                    ${(function attachment(){
                                                        attach = ""
                                                        if(full.post_media.length !== 0){
                                                            full.post_media.forEach(dt =>{
                                                                if(dt.media_type == 'attach'){
                                                                    attach += `
                                                                        <div class="accordion-item">
                                                                            <h2 class="accordion-header">
                                                                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree${dt.imgorg.substr(50, 12)}" aria-expanded="false" aria-controls="collapseThree${dt.imgorg.substr(50, 12)}">
                                                                                    ${dt.imgorg.substr(42)}
                                                                                </button>
                                                                            </h2>
                                                                        `
                                                                        if(dt.media_extension == "pdf"){
                                                                            attach += `
                                                                                <div id="collapseThree${dt.imgorg.substr(50, 12)}" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                                                                                    <div class="accordion-body body-report">
                                                                                        <embed frameBorder="0" scrolling="auto" height="500" width="100%" src="${dt.imgorg}#toolbar=0" type="application/pdf">
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            `
                                                                        }else if(dt.media_extension == "audio"){
                                                                            attach += `
                                                                                <div id="collapseThree${dt.imgorg.substr(50, 12)}" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                                                                                    <div class="accordion-body body-report">
                                                                                        <audio style="width: 80%;" controls controlsList="nodownload">>
                                                                                            <source src="${dt.imgorg}" type="audio/mpeg">
                                                                                            Your browser does not support the audio.
                                                                                        </audio>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            `
                                                                        }else if(dt.media_extension == "video"){
                                                                            attach += `
                                                                                <div id="collapseThree${dt.imgorg.substr(50, 12)}" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                                                                                    <div class="accordion-body body-report">
                                                                                        <video width="100%" height="375" loop poster="" controls controlsList="nodownload" class="d-block mx-auto videoplayer-post"> 
                                                                                            <source src="${dt.imgorg}" type="video/mp4">
                                                                                        </video>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            `
                                                                        }else if(dt.media_extension == "image"){
                                                                            attach += `
                                                                                <div id="collapseThree${dt.imgorg.substr(50, 12)}" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                                                                                    <div class="accordion-body body-report">
                                                                                        <div class="wrapper-preview-report-image">
                                                                                            <img class="attch-img" src="${dt.imgorg}" alt="img">
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            `
                                                                        } else {
                                                                            attach += `
                                                                                <div id="collapseThree${dt.imgorg.substr(50, 12)}" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                                                                                    <div class="accordion-body body-report">
                                                                                        <iframe src='https://view.officeapps.live.com/op/embed.aspx?src=${dt.imgorg}?&wdInConfigurator=True' width='100%' height='500' frameborder='0'></iframe>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            `
                                                                        }
                                                                    }
                                                                })
                                                            }
                                                            return attach
                                                        })()}
                                                    </div>
                                                    ${(full.article == null) ? '' : atob(full.article)}
                                                </article>
                                            </div>
                                        </div>
                                        </div>
                                    </div>
                                </div>
                                `;


                // if (full.status == 'active') {
                //     button = button +'<a href="<?= base_url() ?>godmode/reported/post_lock/' +full.id_post +'" title="Lock Post" class="m-1 btn btn-danger btn-sm"><i class="fa-solid fa-lock"></i></a> ';
                // }else if (full.status=='deleted'){
                //     button = button +'<a href="<?= base_url() ?>godmode/reported/unlockpost/' +full.id_post +'" title="Unlock Post" class="m-1 btn btn-danger btn-sm"><i class="fa-solid fa-lock-open"></i></a> ';
                // }
                // button = button+'<a href="<?= base_url() ?>godmode/reported/delpost/' + full.id_post +'" title="Delete Post" class="m-1 btn btn-dark btn-sm"><i class="fa-solid fa-xmark"></i></a> ';
                return button;
            }
        }],
        "columns": [
            {
                "data": "username"
            },
            {
                "data": "ucode"
            },
            {
                "data": "id_post"
            },
            {
                "data": "times", width: 100
            },
            {
                "data": null, "mRender": function(data, type, full, meta) {
                    if (full.status=='active'){
                        return "active";
                    }else{
                        return "frozen";
                    }
                }
            },
        ],
    });


// $("#change_content_type").on("click",function(e){
//     e.preventDefault();
//     $.ajax({
//         url: "<?= base_url() ?>godmode/reported/change_explicit",
//         type: "post",
//         data: {
//             "id": '443',
//             "content_type": 'non explicit'
//         },
//         success: function (response) {
//             var data=JSON.parse(response);
//             console.log(data);
//         },
//         error: function(jqXHR, textStatus, errorThrown) {
//             console.log(textStatus, errorThrown);
//         }
//     });
// })


$("#category").on("change",function(e){
    tblactive.ajax.reload();
})





</script>