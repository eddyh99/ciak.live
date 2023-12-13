<div class="modal-body">
    <div class="modal-preview-body d-flex justify-content-between">
            <div class="d-flex">
                <div class="me-2">
                    <img src="<?=$post->profile?>" class="rounded-circle pp-preview-report" alt="img">
                </div>
                <div>
                    <h4><?=$post->username?></h4>
                    <span>
                        ${hasil}
                    </span>
                </div>
            </div>
            <div>
                <form action="<?= base_url()?>godmode/reported/change_explicit/<?=$post->id_post?>" method="post">
                    <select name="content_type" class="form-select category-report">
                        <option value="">--Choose Content--</option>
                        <option value="explicit">Explicit</option>
                        <option value="non explicit">Non Explicit</option>
                    </select>
                    <button type="submit" class="btn btn-main-green">Change Content</button>
                </form>
            </div>
        </div>
        <div class="mt-3">
            <h1>
                <?php echo ($post->title_article == null) ? '' : $post->title_article?>
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
