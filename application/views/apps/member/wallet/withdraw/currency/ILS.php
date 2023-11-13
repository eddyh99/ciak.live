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

<div class="withdraw-national-field mb-4">
<label for="branchCode">Branch Code</label><br>
    <select name="branchCode" class="form-select select-currency-withdraw  me-2" id="branchCode">
    </select>
</div>

<div class="withdraw-national-field mb-4">
<label for="countryCode">Initial Country</label><br>
    <select name="countryCode" class="form-select select-currency-withdraw  me-2" id="countryCode">
        <?php foreach ($countries_list as $cur) { ?>
        <option value="<?= $cur['code'] ?>"><?= $cur['code'] . ' - ' . $cur['name'] ?></option>
        <?php } ?>
    </select>
</div>

<div class="withdraw-national-field mb-4">
<label for="city">City</label><br>
    <input class="form-control me-2" type="text" name="city" id="City">
</div>

<div class="withdraw-national-field mb-4">
<label for="firstLine">First Line</label><br>
    <input class="form-control me-2" type="text" name="firstLine" id="FirstLine">
</div>

<div class="withdraw-national-field mb-4">
<label for="postCode">Post Code</label><br>
    <input class="form-control me-2" type="text" name="postCode" id="Post Code">
</div>