<link href="https://cdn.jsdelivr.net/npm/jquery-datatables-checkboxes@1.2.13/css/dataTables.checkboxes.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/jquery-datatables-checkboxes@1.2.13/js/dataTables.checkboxes.min.js"></script>
<script src="https://cdn.datatables.net/plug-ins/1.13.2/api/sum().js"></script>
<script>
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
            [0, 'asc']
        ],
        "pageLength": 100,
        "aoColumnDefs": [{
            "aTargets": [5],
            "mData": null,
            "mRender": function(data, type, full, meta) {
                var button = `  <button class="m-1 btn btn-secondary btn-sm" data-bs-toggle="modal" data-bs-target="#viewReport${full.id_post}">
                                    <i class="fa-solid fa-magnifying-glass"></i>
                                </button>
                                <div class="modal fade" id="viewReport${full.id_post}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Modal ${full.username}${full.id_post}</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            Content Report . . .
                                        </div>
                                        </div>
                                    </div>
                                </div>
                                `;
                if (full.status == 'active') {
                    button = button +'<a href="<?= base_url() ?>godmode/reported/post_lock/' +full.id_post +'" title="Lock Post" class="m-1 btn btn-danger btn-sm"><i class="fa-solid fa-lock"></i></a> ';
                }else if (full.status=='deleted'){
                    button = button +'<a href="<?= base_url() ?>godmode/reported/unlockpost/' +full.id_post +'" title="Unlock Post" class="m-1 btn btn-danger btn-sm"><i class="fa-solid fa-lock-open"></i></a> ';
                }
                button = button+'<a href="<?= base_url() ?>godmode/reported/delpost/' + full.id_post +'" title="Delete Post" class="m-1 btn btn-dark btn-sm"><i class="fa-solid fa-xmark"></i></a> ';
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



</script>