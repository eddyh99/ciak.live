<div class="withdraw-national-field mb-4">
    <label for="accountNumber">Account Number</label><br>
    <input class="form-control me-2" type="text" name="accountNumber" id="accountNumber">
</div>

<div class="withdraw-national-field mb-4">
    <label for="bankCode">Bank Code</label><br>
    <select name="bankCode" class="form-control  me-2" id="bankCode">
        <?php foreach ($codecur as $dt) { ?>
        <option value="<?= $dt->code ?>"><?= $dt->title ?></option>
        <?php } ?>
    </select>
</div>

<div class="withdraw-national-field mb-4">
    <label for="branchCode">Branch Code</label><br>
    <select name="branchCode" class="form-control select-currency-withdraw  me-2" id="branchCode">
    </select>
</div>