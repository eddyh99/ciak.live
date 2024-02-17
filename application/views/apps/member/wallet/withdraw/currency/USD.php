<div class="withdraw-national-field mb-4">
    <label for="accountNumber">Account Number</label><br>
    <input type="text" name="accountNumber" id="accountNumber" autocomplete="off">
</div>


<?php if ($type == "national") { ?>
<div class="withdraw-national-field mb-4">
    <label for="abartn">Routing Number</label><br>
    <input type="text" name="abartn" id="abartn" autocomplete="off">
</div>


<div class=" mb-4">
    <label for="accountType">Account Type</label>
    <select name="accountType" id="accountType" class="form-select select-currency-withdraw">>
        <option value="">--Account Type--</option>
        <option value="SAVINGS" class="pb-3">Saving</option>
        <option value="CHECKING" class="pb-3">Checking</option>
    </select>
</div>
<?php }?>


<?php if($type == 'international'){?>

<div class="withdraw-national-field mb-4">
    <label for="swiftCode">Swift Code</label><br>
    <input type="text" name="swiftCode" id="swiftCode" autocomplete="off">
</div>
<input type="hidden" name="abartn" value="">
<input type="hidden" name="accountType" value="">
<?php }?>

<div class="withdraw-national-field mb-4 <?php if ($type == 'national') echo 'd-none'; ?>">
    <label for="firstLine">FirstLine</label><br>
    <input type="text" name="firstLine" id="firstLine" autocomplete="off" <?php if ($type == 'national') echo 'value="16192 Coastal Highway"'; ?>>
</div>

<div class="withdraw-national-field mb-4 <?php if ($type == 'national') echo 'd-none'; ?>">
    <label for="city">City</label><br>
    <input type="text" name="city" id="city" autocomplete="off"  <?php if ($type == 'national') echo 'value="Delaware"'; ?>>
</div>

<div class="withdraw-national-field mb-4 <?php if ($type == 'national') echo 'd-none'; ?>">
    <label for="state">State</label><br>
    <input type="text" name="state" id="state" autocomplete="off" <?php if ($type == 'national') echo 'value="United State"'; ?>>
</div>

<div class="withdraw-national-field mb-4 <?php if ($type == 'national') echo 'd-none'; ?>">
    <label for="postCode">Post Code</label><br>
    <input type="text" name="postCode" id="postCode" autocomplete="off" <?php if ($type == 'national') echo 'value="19958"'; ?>>
</div>


<?php if ($type == "national") { ?>

    <div class="align-items-center my-3 <?php if ($type == 'national') echo 'd-none'; ?>">
        <input class="form-control me-2" type="text" name="state" placeholder="State initial" maxlength="2"
            <?php if ($type == 'national') echo 'value="DE"'; ?>>
    </div>

    <div class="align-items-center my-3 <?php if ($type == 'national') echo 'd-none'; ?>">
        <input class="form-control me-2" type="text" name="countryCode" <?php if ($type == 'national') echo 'value="US"'; ?>>
    </div>

<?php }?>


<?php if ($type == "international") { ?>
<div class="mb-4">
    <label for="accountType">Country Initial</label>
    <select name="countryCode" class="form-select select-currency-withdraw" id="countryCode">
        <?php foreach ($countries_list as $cur) { ?>
        <option value="<?= $cur['code'] ?>"><?= $cur['code'] . ' - ' . $cur['name'] ?></option>
        <?php } ?>
    </select>
</div>
<?php } ?>