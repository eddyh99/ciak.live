<link href="https://cdn.jsdelivr.net/npm/jquery-datatables-checkboxes@1.2.13/css/dataTables.checkboxes.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/jquery-datatables-checkboxes@1.2.13/js/dataTables.checkboxes.min.js"></script>
<script src="https://cdn.datatables.net/plug-ins/1.13.2/api/sum().js"></script>
<script>
    $("#search").on("click",function(){
        var postid=$("#postid").val();
        $.ajax({
            url: "<?=base_url()?>godmode/member/detail_post?post_id="+postid,
            success: function (response) {
                $("#resultpost").html();
                $("#resultpost").html(response);
            },
            error: function(jqXHR, textStatus, errorThrown) {
               console.log(textStatus, errorThrown);
            }
        });
    })
</script>