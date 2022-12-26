<script>
$(function() {
    var mode = "<?php echo @$_SESSION['mode']; ?>";
    if (mode == 'checked') {
        $.ajax({
            type: "POST",
            url: "<?= base_url() ?>auth/mode",
            data: 'mode=light',
            cache: false,
            success: function(data) {
                // console.log("Light Mode");
            }
        });
        $('.dark').addClass('light');
        $('.dark').removeClass('dark');
    } else {
        $.ajax({
            type: "POST",
            url: "<?= base_url() ?>auth/mode",
            data: 'mode=dark',
            cache: false,
            success: function(data) {
                // console.log("Dark Mode");
            }
        });
        $('.light').addClass('dark');
        $('.light').removeClass('light');
    }

    // if ($('#mode').is(":checked")) {
    // } else {
    // }

    $('#mode').on("click", function() {
        if ($('#mode').is(":checked")) {
            $.ajax({
                type: "POST",
                url: "<?= base_url() ?>auth/mode",
                data: 'mode=light',
                cache: false,
                success: function(data) {
                    // console.log("Light Mode");
                }
            });
            $('.dark').addClass('light');
            $('.dark').removeClass('dark');
        } else {
            $.ajax({
                type: "POST",
                url: "<?= base_url() ?>auth/mode",
                data: 'mode=dark',
                cache: false,
                success: function(data) {
                    // console.log("Dark Mode");
                }
            });
            $('.light').addClass('dark');
            $('.light').removeClass('light');
        }
    })
})
</script>