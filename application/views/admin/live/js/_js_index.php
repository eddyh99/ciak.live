<link href="https://cdn.jsdelivr.net/npm/jquery-datatables-checkboxes@1.2.13/css/dataTables.checkboxes.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/jquery-datatables-checkboxes@1.2.13/js/dataTables.checkboxes.min.js"></script>
<script src="https://cdn.datatables.net/plug-ins/1.13.2/api/sum().js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/timeago.js/2.0.2/timeago.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/timeago.js/2.0.2/timeago.locales.min.js"></script>

<!-- DATE PICKER -->
<link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
<script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>

<script>
    var tbl_livetoday = 
        $('#table_livetoday').DataTable({
            "scrollX": true,
            "responsive": true,
            "order": [[ 2, 'asc' ]],
            "ajax": {
                "url": "<?= base_url() ?>godmode/live/get_livetoday",
                "type": "POST",
                "dataSrc": function(data) {
                    console.log(data);
                    return data;
                },
            },
            "columns": [
                {
                    "data": "username"
                },
                {
                    "data": null, "mRender": function(data, type, full, meta) {
                        if(full.meeting_type && full.purpose){
                            return 'Live Show';
                        }else if(full.meeting_type && !full.purpose){
                            return 'Meeting';
                        }else {
                            return 'Cam2Cam';
                        }
                    }
                },
                {
                    "data": null, "mRender": function(data, type, full, meta) {
                        return full.start_date;
                    }
                },
                {
                    "data": null, "mRender": function(data, type, full, meta) {
                        if(full.meeting_type && full.purpose){
                            return full.duration + ' Minutes';
                        }else {
                            return '';
                        }
                    }
                },
                {
                    "data": null, "mRender": function(data, type, full, meta) {
                        var link;
                        <?php 
                            if (stripos($_SERVER['HTTP_HOST'], 'sandbox') === 0) {
                                $url = 'https://sandbox.ciak.live/';
                            } elseif (stripos($_SERVER['HTTP_HOST'], 'local') === 0) {
                                $url = 'https://sandbox.ciak.live/';
                            } else {
                                $url = 'https://ciak.live/';
                            }
                        ?>
                        
                        if(full.meeting_type && full.purpose){
                            link = `<?= $url?>meeting/showlive?room_id=${full.roomid}`;
                            return `<div class="d-flex justify-content-center"><a href='${link}' class="btn btn-green-ciak">Check Now</a></div>`
                        }else if(full.meeting_type && !full.purpose){
                            link = `<?= $url?>meeting/showmeeting?room_id=${full.roomid}`;
                            return `<div class="d-flex justify-content-center"><a href='${link}' class="btn btn-green-ciak">Check Now</a></div>`
                        }else {
                            link = `<?= $url?>meeting/showcam?room_id=${full.roomid}`;
                            return `<div class="d-flex justify-content-center"><a href='${link}' class="btn btn-green-ciak">Check Now</a></div>`
                        }
                        
                    }
                },
            ],
        }); 
        
</script>