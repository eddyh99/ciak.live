<script>
var months = ["Jan", "Feb", "Mar", "Apr", "May", "Jun",
    "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"
];

var currentMonth = moment().month();
var currentYear = moment().year();

var start = moment().subtract(29, 'days'); // Subtract 29 days from today
var end = moment(); // Today

var dateRange = {};
dateRange["Today"] = [moment(), moment()];
dateRange["Yesterday"] = [moment().subtract(1, 'days'), moment()];
dateRange["Last 7 Days"] = [moment().subtract(7, 'days'), moment()];
dateRange["Last 30 Days"] = [moment().subtract(29, 'days'), moment()];

$('#tgl').daterangepicker({
    startDate: end,
    endDate: end,
    ranges: dateRange,
    minDate: moment().subtract(90, 'days'),
    maxDate: moment(),
    locale: {
        format: 'MM/DD/YYYY'
    }
});

$(document).ready(function() {
        $('#tbl_historey').DataTable();
    });
var tblhistory =
    $('#tbl_history').DataTable({
        "order": [
            [4, 'desc']
        ],
        "scrollX": true,
        "responsive": true,
        "ajax": {
            "url": "<?= base_url() ?>godmode/mwallet/get_history",
            "type": "POST",
            "data": function(d) {
                d.csrf_freedy = $("#token").val();
                d.tgl = $("#tgl").val()
            },
            "dataSrc": function(data) {
                $("#token").val(data["token"]);
                return data["history"];
            },
        },
        "pageLength": 100,
        "columns": [{
                "data": "ket"
            },
            {
                "data": "amount",
                render: $.fn.dataTable.render.number(',', '.', 2, '<?= $_SESSION['symbol']?> ')
            },
            {
                "data": "cost",
                render: $.fn.dataTable.render.number(',', '.', 2, '<?= $_SESSION['symbol']?> ')
            },
            {
                "data": "income",
                render: $.fn.dataTable.render.number(',', '.', 2, '<?= $_SESSION['symbol']?> ')
            },
            {
                "data": "date_created"
            },
        ]
    });

$('#tgl').on("change", function(e) {
    e.preventDefault();
    tblhistory.ajax.reload();
});
</script>