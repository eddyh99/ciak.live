<?php if ($type == 'national') { ?>
    <div class="withdraw-national-field mb-4">
        <label for="iban">IBAN</label><br>
        <input type="text" name="iban" id="iban" autocomplete="off">
    </div>

    <!-- <div class="withdraw-national-field mb-4">
        <label for="swiftCode">Swift Code</label><br>
        <input type="text" name="swiftCode" id="swiftCode" autocomplete="off">
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
            <?php foreach ($countryEUR as $cur) { ?>
                <option value="<?= $cur['code'] ?>"><?= $cur['code'] . ' - ' . $cur['name'] ?></option>
            <?php } ?>
        </select>
    </div> -->
<?php } ?>

<?php if ($type == 'international') { ?>
 
    <div class="withdraw-national-field mb-4">
        <label for="iban">IBAN</label><br>
        <input type="text" name="iban" id="iban" autocomplete="off">
    </div>

    <div class="withdraw-national-field mb-4">
        <label for="swiftCode">Swift Code</label><br>
        <input type="text" name="swiftCode" id="swiftCode" autocomplete="off" minLength="8" maxlength="11">
    </div>

    <div class="withdraw-national-field mb-4">
        <label for="accountNumber">Account Number</label><br>
        <input type="text" name="accountNumber" id="accountNumber" autocomplete="off" minLength="4" maxlength="34">
    </div>

    <div class="withdraw-national-field mb-4">
        <label for="firstLine">Country Initial</label><br>
        <select name="countryCode" class="form-select select-currency-withdraw me-2" id="countryCode">
            <option value="">--Country Initial--</option>
            <?php foreach ($countryEUR as $cur) { ?>
                <option value="<?= $cur['code'] ?>"><?= $cur['code'] . ' - ' . $cur['name'] ?></option>
            <?php } ?>
        </select>
    </div>

    <div class="withdraw-national-field mb-4">
        <label for="city">City</label><br>
        <input type="text" name="city" id="city" autocomplete="off">
    </div>

    <div class="withdraw-national-field mb-4">
        <label for="firstLine">First Line</label><br>
        <input type="text" name="firstLine" id="firstLine" autocomplete="off">
    </div>

    <div class="withdraw-national-field mb-4">
        <label for="postCode">Post Code</label><br>
        <input type="text" name="postCode" id="postCode" autocomplete="off">
    </div>
<?php } ?>