$("#btnref").click(function () {
    var copyText = document.getElementById("refcode");
    copyText.select();
    copyText.setSelectionRange(0, 99999);
    navigator.clipboard.writeText(copyText.value);
});

$("#btnucode").click(function () {
    var copyText = document.getElementById("ucode");
    copyText.select();
    copyText.setSelectionRange(0, 99999);
    navigator.clipboard.writeText(copyText.value);
});