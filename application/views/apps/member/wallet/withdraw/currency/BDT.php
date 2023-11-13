
<div class="withdraw-national-field mb-4">
    <label for="accountNumber">Account Number</label><br>
    <input type="text" name="accountNumber" id="accountNumber" autocomplete="off">
</div>

<div class="mb-4">
    <label for="bankCode">Bank Code</label><br>
    <select name="bankCode" class="form-select select-currency-withdraw" id="bankCode">
        <option value="" >--Bank Code--</option>
        <?php foreach ($codecur as $dt) { ?>
            <option value="<?= $dt->code ?>"><?= $dt->title ?></option>
        <?php } ?>
    </select>
</div>

<div class="withdraw-national-field mb-4">
    <label for="branchCode">Branch Code</label><br>
    <select name="branchCode" class="form-select select-currency-withdraw me-2" id="branchCode"></select>
</div>