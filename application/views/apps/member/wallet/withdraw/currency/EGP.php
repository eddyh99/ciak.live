<div class="withdraw-national-field mb-4">
<label for="iban">IBAN</label><br>
    <input class="form-control me-2" type="text" name="iban" id="iban">
</div>

<div class="withdraw-national-field mb-4">
<label for="bankCode">Bank Code</label><br>
    <select name="bankCode" class="form-select select-currency-withdraw  me-2" id="bankCode">
        <?php foreach ($codecur as $dt) { ?>
        <option value="<?= $dt->code ?>"><?= $dt->title ?></option>
        <?php } ?>
    </select>
</div>