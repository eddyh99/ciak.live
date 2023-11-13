<?php if ($type == 'national') { ?>

<div class="withdraw-national-field mb-4">
    <label for="accountNumber">Account Number</label><br>
    <input type="text" name="accountNumber" id="accountNumber" autocomplete="off">
</div>

<div class="withdraw-national-field mb-4">
    <label for="sortCode">Sort Code</label><br>
    <input type="text" name="sortCode" id="sortCode" autocomplete="off">
</div>

<?php } ?>

<?php if ($type == 'international') { ?>
    <div class="withdraw-national-field mb-4">
        <label for="iban">IBAN</label><br>
        <input class="form-control me-2" type="text" name="iban" id="iban">
    </div>

<?php } ?>