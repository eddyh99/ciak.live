<script>
    $('#hideadive').on("click", function() {
        var iconHide = $('#iconhide').hasClass('fa-eye');
        var iconShow = $('#iconhide').hasClass('fa-eye-slash');
        if (iconHide) {
            $('.apps-adive').css('display', 'none');
            $('#iconhide').removeClass('fa-eye');
            $('#iconhide').addClass('fa-eye-slash');
        }

        if (iconShow) {
            $('.apps-adive').css('display', 'flex');
            $('#iconhide').removeClass('fa-eye-slash');
            $('#iconhide').addClass('fa-eye');
        }
    })


    $('input[name=typepromo]').on("click", function() {
        var type = $(this).val();

        if (type == 1) {
            $('#type').val('pct');
            $('#weeklylabel').html('Weekly discount price (%)');
            $('#monthlylabel').html('Monthly discount price (%)');
            $('#yearlylabel').html('Yearly discount price (%)');
        }

        if (type == 2) {
            $('#type').val('fxd');
            $('#weeklylabel').html('Weekly discount price (Fixed)');
            $('#monthlylabel').html('Monthly discount price (Fixed)');
            $('#yearlylabel').html('Yearly discount price (Fixed)');
        }
    })


    function actionFollow(user, status) {
        if (status == 'Follow') {
            if ($("#user" + user).val() == 'Unfollow') {
                $("#user" + user).val('Follow');
                $("#user" + user).removeClass('active');
                status = 'Unfollow';
            } else {
                $("#user" + user).val('Unfollow');
                $("#user" + user).addClass('active');
                status = 'Follow';
            }
        } else {
            if ($("#user" + user).val() == 'Follow') {
                $("#user" + user).val('Unfollow');
                $("#user" + user).addClass('active');
                status = 'Follow';
            } else {
                $("#user" + user).val('Follow');
                $("#user" + user).removeClass('active');
                status = 'Unfollow';
            }
        }

        // $.get("<?= base_url() ?>homepage/actionFollow?user=" + user + "&status=" + status, function(data) {
        //     var data = JSON.parse(data);
        //     console.log(data);
        //     if (data.error == 'failed') {
        //         alert(data.message);
        //         $("#user" + user).value('checked', true);
        //     }
        // });
    }

    function actionLike(user, status, post) {
        if (status == 'Like') {
            if ($("#postlike" + post).hasClass('checked')) {
                $("#postlike" + post).removeClass('checked');
                status = 'Dislike';
            } else {
                $("#postlike" + post).addClass('checked');
                status = 'Like';
            }
        } else {
            if ($("#postlike" + post).hasClass('checked')) {
                $("#postlike" + post).removeClass('checked');
                status = 'Dislike';
            } else {
                $("#postlike" + post).addClass('checked');
                status = 'Like';
            }
        }
        // $.get("<?= base_url() ?>homepage/actionFollow?user=" + user + "&status=" + status, function(data) {
        //     var data = JSON.parse(data);
        //     console.log(data);
        //     if (data.error == 'failed') {
        //         alert(data.message);
        //         $("#user" + user).value('checked', true);
        //     }
        // });
    }

    function actionStar(user, post, star) {
        if (star > 0) {
            // Mulai dari 1 sampai rate sama dengan star 
            for (var rate = 1; rate < 6; ++rate) {
                if (star < 5) { // Jika dibawah 5, akan meng-checked sampai star
                    if (rate <= star) { // Jika rate masih dibawah star atau sama dengan star akan di checked
                        $(".s-" + rate + '[name="poststar' + post + '"]').addClass('checked');
                    } else { // Jika rate sudah melebihi dari star akan di unchecked
                        $(".s-" + rate + '[name="poststar' + post + '"]').removeClass('checked');
                    }
                } else { // Jika seluruh bintang di checked
                    $(".s-" + rate + '[name="poststar' + post + '"]').addClass('checked');
                }
            }
            // Jika 5 akan meng-checked semua
            // Jika dibawah 5, akan meng-checked sampai star

        }

        // $.get("<?= base_url() ?>homepage/actionFollow?user=" + user + "&status=" + status, function(data) {
        //     var data = JSON.parse(data);
        //     console.log(data);
        //     if (data.error == 'failed') {
        //         alert(data.message);
        //         $("#user" + user).value('checked', true);
        //     }
        // });
    }
</script>