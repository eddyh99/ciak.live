<link rel="stylesheet" href="//cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css">
<script src="//cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>

<style>
    table.dataTable td.dataTables_empty {
        color: #ffffff;
    }

    .table-striped>tbody>tr:nth-of-type(odd)>* {
        color: #ffffff;
    }

    .dataTables_wrapper .dataTables_length select {
        background-color: #22283A;
    }

    input[type="month"].monthlyfilter::-webkit-calendar-picker-indicator {
        color: #ffffff;
        background: url('<?= base_url()?>assets/img/new-ciak/history-filter-icon.svg') no-repeat;
        cursor: pointer;
        padding-left: 4px;
    }

    .monthlyfilter {
        background-color: #4D4D4D;
        color: #ffffff;
        border: none;
        border-radius: 4px;
        padding: 6px;
    }
</style>

<script>

var historywallet = $('#historywallet').DataTable();



</script>