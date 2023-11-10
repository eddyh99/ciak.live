<?php if ($type == 'national') { ?>
    <div class="withdraw-national-field mb-4">
        <label for="iban">IBAN</label><br>
        <input type="text" name="iban" id="iban" autocomplete="off">
    </div>
<?php } ?>

<?php if ($type == 'international') { ?>
    <div class="withdraw-national-field mb-4">
        <label for="accountNumber">Account Number</label><br>
        <input type="text" name="accountNumber" id="accountNumber" autocomplete="off">
    </div>

    <div class="withdraw-national-field mb-4">
        <label for="swiftCode">Swift Code</label><br>
        <input type="text" name="swiftCode" id="swiftCode" autocomplete="off">
    </div>
<?php } ?>