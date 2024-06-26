<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>



<style>
   .select2-container--default .select2-selection--single{
        background-color: #000;
        border: 1px solid #016247;
    }

    .select2-search--dropdown{
        background-color: #000;
    }

    .select2-search__field{
        background-color: #000;
        color: #FFF;
    }

    .select2-results { 
        background-color: #016247;
    }

    .select2-container--default .select2-results__option--highlighted.select2-results__option--selectable {
        background-color: #016247;
    }

    .popover-body {
        background-color: #292929;
        color: #FFFFFF;
    }
</style>

<script>
    const popoverTriggerList = document.querySelectorAll('[data-bs-toggle="popover"]');
    const popoverList = [...popoverTriggerList].map(popoverTriggerEl => new bootstrap.Popover(popoverTriggerEl));


    $("#guestnote").select2({
        placeholder: "Please Write a Note/Select Note",
        tags: true, 
    });
    
    $('#guestnote').one('select2:open', function(e) {
        $('input.select2-search__field').prop('placeholder', 'Please Write a Note/Select Note');
    });
</script>