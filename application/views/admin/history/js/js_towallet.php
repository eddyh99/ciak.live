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


var tblhistory =
    $('#tbl_history').DataTable({
        "order": [
            [5, 'desc']
        ],
        "scrollX": true,
        "responsive": true,
        "ajax": {
            "url": "<?= base_url() ?>admin/transactions/historywallet",
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
        "aoColumnDefs": [{
            "aTargets": [6],
            "mRender": function(data, type, row) {
                return "<?= $_SESSION['symbol']?> " + (parseFloat(row.referral_sender_fee) + parseFloat(
                        row.referral_receiver_fee) +
                    parseFloat(row.sender_fee) + parseFloat(row.receiver_fee)).toLocaleString(
                    'en', {
                        minimumFractionDigits: 2
                    })
            }
        }],
        "pageLength": 100,
        "columns": [{
                "data": "ket"
            },
            {
                "data": "cost",
                render: $.fn.dataTable.render.number(',', '.', 2, '<?= $_SESSION['symbol']?> ')
            },
            {
                "data": "referral_sender_fee",
                render: $.fn.dataTable.render.number(',', '.', 2, '<?= $_SESSION['symbol']?> ')
            },
            {
                "data": "referral_receiver_fee",
                render: $.fn.dataTable.render.number(',', '.', 2, '<?= $_SESSION['symbol']?> ')
            },
            {
                "data": "sender_fee",
                render: $.fn.dataTable.render.number(',', '.', 2, '<?= $_SESSION['symbol']?> ')
            },
            {
                "data": "receiver_fee",
                render: $.fn.dataTable.render.number(',', '.', 2, '<?= $_SESSION['symbol']?> ')
            },
            {
                "data": "date_created"
            },
            {
                "data": "date_created"
            },
        ]
    });

$('#tgl').on("change", function(e) {
    e.preventDefault();
    tblhistory.ajax.reload();
    $($.fn.dataTable.tables(true)).DataTable()
        .columns.adjust()
        .responsive.recalc();
});
</script>