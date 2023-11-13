<div class="withdraw-national-field mb-4">
    <label for="accountNumber">Account Number</label><br>
    <input class="form-control me-2" type="text" name="accountNumber" id="accountNumber">
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
    <label for="countryCode">Country Initial</label><br>
    <select name="countryCode" class="form-select select-currency-withdraw  me-2" id="countryCode">
        <?php foreach ($countries_list as $cur) { ?>
            <option value="<?= $cur['code'] ?>"><?= $cur['code'] . ' - ' . $cur['name'] ?></option>
        <?php } ?>
    </select>
</div>

<div class="withdraw-national-field mb-4">
    <label for="city">City</label><br>
    <input class="form-control me-2" type="text" name="city" id="city">
</div>

<div class="withdraw-national-field mb-4">
    <label for="firstLine">First Line</label><br>
    <input class="form-control me-2" type="text" name="firstLine" id="firstLine">
</div>

<div class="withdraw-national-field mb-4">
    <label for="postCode">Post Code</label><br>
    <input class="form-control me-2" type="text" name="postCode" id="postCode">
</div>