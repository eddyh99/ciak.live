<?php if ($type == 'national') { ?>
<div class="withdraw-national-field mb-4">
    <label for="iban">IBAN</label><br>
    <input type="text" name="iban" id="iban" autocomplete="off">
</div>
<?php } ?>

<?php if ($type == 'international') { ?>
<div class="align-items-center my-3">
    <input class="form-control me-2" type="text" name="accountNumber" placeholder="Account Number">
</div>

<div class="align-items-center my-3">
    <input class="form-control me-2" type="text" name="swiftCode" placeholder="Swift Code">
</div>
<?php } ?>