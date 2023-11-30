<div class="d-flex flex-row align-items-center my-3">
    <input class="form-control me-2" type="text" name="accountNumber" placeholder="Account Number">
</div>

<?php if ($type == 'local') { ?>
    <div class="d-flex flex-row align-items-center my-3">
        <select name="accountType" class="form-control me-2" id="accountType">
            <option value="">--Account Type--</option>
            <option value="ARMY_OR_POLICE_NUMBER">Army/Police Number</option>
            <option value="BUSINESS_REGISTRATION_NUMBER">Business Registration Number</option>
            <option value="MOBILE_NUMBER">Mobile Number</option>
            <option value="NRIC">NRIC</option>
        </select>
    </div>
<?php } ?>

<div class="d-flex flex-row align-items-center my-3">
    <input class="form-control me-2" type="text" name="swiftCode" placeholder="Swift Code">
</div>