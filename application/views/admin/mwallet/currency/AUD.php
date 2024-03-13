<div class="d-flex flex-row align-items-center my-3">
    <input class="form-control cost-input me-2" type="text" name="accountNumber" placeholder="accountNumber">
</div>

<?php if ($type == 'local') { ?>
    <div class="d-flex flex-row align-items-center my-3">
        <input class="form-control cost-input me-2" type="text" name="billerCode" placeholder="BPAY biller code">
    </div>
    <div class="d-flex flex-row align-items-center my-3">
        <input class="form-control cost-input me-2" type="text" name="customerReferenceNumber" placeholder="Customer Reference Number (CRN)">
    </div>
<?php } ?>

<div class="d-flex flex-row align-items-center my-3">
    <input class="form-control cost-input me-2" type="text" name="city" placeholder="City">
</div>
<div class="d-flex flex-row align-items-center my-3">
    <input class="form-control cost-input me-2" type="text" name="postCode" placeholder="Post Code">
</div>
<div class="d-flex flex-row align-items-center my-3">
    <input class="form-control cost-input me-2" type="text" name="firstLine" placeholder="FirstLine">
</div>
<div class="d-flex flex-row align-items-center my-3">
    <select name="countryCode" class="form-select category-cost me-2" id="countryCode">
        <option value="">--Country Initial--</option>
        <?php foreach ($countries_list as $cur) { ?>
            <option value="<?= $cur['code'] ?>"><?= $cur['code'] . ' - ' . $cur['name'] ?></option>
        <?php } ?>
    </select>
    <!-- <input class="form-control cost-input me-2" type="text" name="countryCode" placeholder="Country initial"> -->
</div>
<div class="d-flex flex-row align-items-center my-3">
    <input class="form-control cost-input me-2" type="text" name="state" placeholder="State">
</div>
<div class="d-flex flex-row align-items-center my-3">
    <input class="form-control cost-input me-2" type="text" name="bsbCode" placeholder="BSB Code">
</div>