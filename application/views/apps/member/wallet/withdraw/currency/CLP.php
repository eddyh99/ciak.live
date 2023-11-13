<div class="withdraw-national-field mb-4">
    <label for="accountNumber">Account Number</label><br>
    <input class="form-control me-2" type="text" id="accountNumber" name="accountNumber" maxlength="18" autocomplete="off">
</div>

<div class="withdraw-national-field mb-4">
    <label for="accountType">Account Type</label><br>
    <select name="accountType" class="form-select select-currency-withdraw me-2" id="accountType">
        <option value="SAVING">Saving</option>
        <option value="CHECKING">Checking</option>
    </select>
</div>

<div class="withdraw-national-field mb-4">
    <label for="bankCode">Bank Code</label><br>
    <select name="bankCode" class="form-select select-currency-withdraw me-2" id="bankCode">
        <?php foreach ($codecur as $dt) { ?>
        <option value="<?= $dt->code ?>"><?= $dt->title ?></option>
        <?php } ?>
    </select>
</div>

<div class="withdraw-national-field mb-4">
    <label for="rut">Rut</label><br>
    <input class="form-control me-2" id="rut" type="text" name="rut" autocomplete="off">
</div>


<div class="withdraw-national-field mb-4">
    <label for="phoneNumber">Phone Number</label><br>
    <input class="form-control me-2" id="phoneNumber" type="text" name="phoneNumber" autocomplete="off" >
</div>