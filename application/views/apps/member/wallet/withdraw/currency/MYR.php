<div class="withdraw-national-field mb-4">
    <label for="accountNumber">Account Number</label><br>
    <input class="form-control me-2" type="text" name="accountNumber" id="accountNumber">
</div>

<?php if ($type == 'national') { ?>
    <div class="withdraw-national-field mb-4">
    <label for="accountType">Account Type</label><br>
        <select name="accountType" class="form-select select-currency-withdraw me-2" id="accountType">
            <option value="">---Account Type---</option>
            <option value="ARMY_OR_POLICE_NUMBER">Army/Police Number</option>
            <option value="BUSINESS_REGISTRATION_NUMBER">Business Registration Number</option>
            <option value="MOBILE_NUMBER">Mobile Number</option>
            <option value="NRIC">NRIC</option>
        </select>
    </div>
<?php } ?>

<div class="withdraw-national-field mb-4">
    <label for="swiftCode">Swift Code</label><br>
    <input class="form-control me-2" type="text" name="swiftCode" id="swiftCode">
</div>