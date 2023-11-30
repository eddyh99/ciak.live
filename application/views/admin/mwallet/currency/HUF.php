<div class="d-flex flex-row align-items-center my-3">
    <input class="form-control me-2" type="text" name="accountNumber" placeholder="Account Number">
</div>

<?php if ($type == 'local') { ?>
    <div class="d-flex flex-row align-items-center my-3">
        <input class="form-control me-2" type="text" name="IBAN" placeholder="IBAN">
    </div>
<?php } ?>