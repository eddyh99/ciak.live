
<div class="withdraw-national-field mb-4">
    <label for="accountNumber">Account Number</label><br>
    <input type="text" name="accountNumber" id="accountNumber" autocomplete="off">
</div>

<div class="withdraw-national-field mb-4">
<label for="bankCode">Bank Code</label><br>
    <select name="bankCode" class="form-select select-currency-withdraw me-2" id="bankCode">
        <?php foreach ($codecur as $dt) { ?>
        <option value="<?= $dt->code ?>"><?= $dt->title ?></option>
        <?php } ?>
    </select>
</div>