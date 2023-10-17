<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

<script>
    $("#guestnote").select2({
        placeholder: "Please Write a Note/Select Note",
        tags:true
    });
    
    $('#guestnote').one('select2:open', function(e) {
        $('input.select2-search__field').prop('placeholder', 'Please Write a Note/Select Note');
    });
</script>