<div class="withdraw-national-field mb-4">
    <label for="accountNumber">Account Number</label><br>
    <input type="text" name="accountNumber" id="accountNumber" autocomplete="off">
</div>

<div class="withdraw-national-field mb-4">
    <label for="billerCode">BPAY biller code</label><br>
    <input type="text" name="billerCode" id="billerCode" autocomplete="off">
</div>

<div class="withdraw-national-field mb-4">
    <label for="customerReferenceNumber">Customer Reference Number (CRN)</label><br>
    <input type="text" name="customerReferenceNumber" id="customerReferenceNumber" autocomplete="off">
</div>

<div class="withdraw-national-field mb-4">
    <label for="city">City</label><br>
    <input type="text" name="city" id="city" autocomplete="off">
</div>

<div class="withdraw-national-field mb-4">
    <label for="postCode">Post Code</label><br>
    <input type="text" name="postCode" id="postCode" autocomplete="off">
</div>

<div class="withdraw-national-field mb-4">
    <label for="firstLine">First Line</label><br>
    <input type="text" name="firstLine" id="firstLine" autocomplete="off">
</div>

<div class="withdraw-national-field mb-4">
    <label for="firstLine">Country Initial</label><br>
    <select name="countryCode" class="form-select select-currency-withdraw me-2" id="countryCode">
        <option value="">--Country Initial--</option>
        <?php foreach ($countries_list as $cur) { ?>
            <option value="<?= $cur['code'] ?>"><?= $cur['code'] . ' - ' . $cur['name'] ?></option>
        <?php } ?>
    </select>
</div>

<div class="withdraw-national-field mb-4">
    <label for="state">State</label><br>
    <input type="text" name="state" id="state" autocomplete="off">
</div>

<div class="withdraw-national-field mb-4">
    <label for="bsbCode">BSB Code</label><br>
    <input type="text" name="bsbCode" id="bsbCode" autocomplete="off">
</div>