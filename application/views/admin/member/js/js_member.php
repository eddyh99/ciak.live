<link href="https://cdn.jsdelivr.net/npm/jquery-datatables-checkboxes@1.2.13/css/dataTables.checkboxes.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/jquery-datatables-checkboxes@1.2.13/js/dataTables.checkboxes.min.js"></script>
<script src="https://cdn.datatables.net/plug-ins/1.13.2/api/sum().js"></script>
<script>
var i = 1;

var tblactive =
    $('#memberactive').DataTable({
        "scrollX": true,
        "responsive": true,
        "ajax": {
            "url": "<?= base_url() ?>godmode/member/get_all?status=active",
            "type": "POST",
            "dataSrc": function(data) {
                return data["member"];
            },
        },
        order: [
            [0, 'asc']
        ],
        "pageLength": 100,
        "aoColumnDefs": [{
            "aTargets": [6],
            "mData": "email",
            "mRender": function(data, type, full, meta) {
                var button = '<a href="<?= base_url() ?>godmode/member/changepass/' + full
                    .id +
                    '" class="m-1 btn btn-secondary btn-sm">Change Password</a> ';
                if (full.status == 'active') {
                    button = button +
                        '<a href="<?= base_url() ?>godmode/member/disabled/' +
                        full.id +
                        '" class="m-1 btn btn-danger btn-sm">Disable</a> ';
                } else if (full.status == 'new') {
                    button = '<a href="<?= base_url() ?>godmode/member/activate/' + full
                        .id +
                        '" class="m-1 btn btn-dark btn-sm">Activate</a> ';
                } else if (full.status = 'disabled') {
                    button = button + '<a href="<?= base_url() ?>godmode/member/enabled/' +
                        full.id +
                        '" class="m-1 btn btn-warning btn-sm">Enable</a> ';
                }
                return button;
            }
        }],
        "columns": [{
                "mRender": function(data, type, full, meta) {
                    return i++;
                }
            },
            {
                "data": "username"
            },
            {
                "data": "email"
            },
            {
                "data": "ucode"
            },
            {
                "data": "referral"
            },
            {
                "data": "status"
            },
        ],
    });


var tbldisable =
    $('#memberdisabled2').DataTable({
        "scrollX": true,
        "responsive": true,
        "ajax": {
            "url": "<?= base_url() ?>godmode/member/get_all?status=disabled",
            "type": "POST",
            "dataSrc": function(data) {
                return data["member"];
            },
        },
        order: [
            [0, 'asc']
        ],
        "pageLength": 100,
        "aoColumnDefs": [{
            "aTargets": [6],
            "mData": "email",
            "mRender": function(data, type, full, meta) {
                var button = '<a href="<?= base_url() ?>godmode/member/changepass/' + full
                    .id +
                    '" class="m-1 btn btn-secondary btn-sm">Change Password</a> ';
                if (full.status == 'active') {
                    button = button +
                        '<a href="<?= base_url() ?>godmode/member/disabled/' +
                        full.id +
                        '" class="m-1 btn btn-danger btn-sm">Disable</a> ';
                } else if (full.status == 'new') {
                    button = '<a href="<?= base_url() ?>godmode/member/activate/' + full
                        .id +
                        '" class="m-1 btn btn-dark btn-sm">Activate</a> ';
                } else if (full.status = 'disabled') {
                    button = button + '<a href="<?= base_url() ?>godmode/member/enabled/' +
                        full.id +
                        '" class="m-1 btn btn-warning btn-sm">Enable</a> ';
                }
                return button;
            }
        }],
        "columns": [{
                "mRender": function(data, type, full, meta) {
                    return i++;
                }
            },
            {
                "data": "username"
            },
            {
                "data": "email"
            },
            {
                "data": "ucode"
            },
            {
                "data": "referral"
            },
            {
                "data": "status"
            },
        ],
    });
    
var tblnew = 
    $('#membernew').DataTable({
        "pageLength": 100,
        "ajax": {
            "url": "<?= base_url() ?>godmode/member/get_all?status=new",
            "type": "POST",
            "dataSrc": function(data) {
                return data["member"];
            },
        },
        'columnDefs': [{
            'targets': 0,
            'data':"id",
            'checkboxes': {
               'selectRow': true
            }
        },
        {
            "targets": 1,
            "data"  : "username",
        },
        {
            "targets": 2,
            "data"  : "email",
        },
        {
            "targets": 3,
            "data"  : "ucode",
        },
        {
            "targets": 4,
            "data"  : "referral",
        },
        {
            "targets": 5,
            "data"  : "status",
        },
        {   
            "targets":6,
            "data"   : null,
            "render" : function(data, type, full, meta) {
                var button = '<a href="<?= base_url() ?>godmode/member/activate/' + full
                        .id + '" class="m-1 btn btn-success btn-sm">Activate</a> ';
                
                button = button + '<a href="<?= base_url() ?>godmode/member/delete/' + full
                    .id +
                    '" class="m-1 btn btn-danger btn-sm">Delete</a> ';
                return button;
            }
        }
        ],
        'select': {
         'style': 'multi'
        },
        'order': [[1, 'asc']]
   });
   
   // Handle form submission event 
   $('#frm-activate').on('submit', function(e){
      var form = this;
      
      var rows_selected = tblnew.column(0).checkboxes.selected();

      // Iterate over all selected checkboxes
      $.each(rows_selected, function(index, rowId){
         // Create a hidden element 
         $(form).append(
             $('<input>')
                .attr('type', 'hidden')
                .attr('name', 'id[]')
                .val(rowId)
         );
      });
   });   
   
$('#bank').on("change", function(e) {
    e.preventDefault();
    i = 1;
    tblactive.ajax.reload();
    tblactive2.ajax.reload();
    tbldisable.ajax.reload();
    tblnew.ajax.reload();
});
</script>