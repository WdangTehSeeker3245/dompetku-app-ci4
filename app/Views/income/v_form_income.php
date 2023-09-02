<?php echo view('layout/v_header'); ?>

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Income</h1>
    </div>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary"><?php echo isset($income['id']) ? 'Update' : 'Add'; ?> Income</h6>
        </div>
        <div class="card-body">
        <form method="post" action="<?php echo isset($income['id']) ? base_url('admin/income/update/' . $income['id']) : base_url('admin/income/store'); ?>">
            <div class="mb-3">
                <label for="date" class="form-label">Date</label>
                <input type="text" id="date" name="date"  value="<?php echo isset($income['date']) ? $income['date'] : '' ; ?>">
            </div>
            <div class="mb-3">
                <label for="hour" class="form-label">Hour</label>
                <input type="text" class="form-control" id="hour" name="hour" required>
            </div>
            <div class="mb-3">
                <label for="balance">Balance</label>
                <select class="form-control" id="balance" name="balance_id">
                    <option value="">--Select Balance--</option>
                    <?php foreach ($balanceData as $balanceItem): ?>
                        <option value="<?= $balanceItem['id'] ?>" <?php if (isset($income['id'])) { echo $income['balance_id'] == $balanceItem['id'] ? 'selected' : '';}?>><?= $balanceItem['title_balance'] ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="mb-3">
                <label for="category">Category</label>
                <select class="form-control" id="category" name="category_id">
                    <option value="">--Select Category--</option>
                    <?php foreach ($categoryData as $categoryItem): ?>
                        <option value="<?= $categoryItem['id'] ?>" <?php if (isset($income['id'])) { echo $income['category_id'] == $categoryItem['id'] ? 'selected' : '';}?>><?= $categoryItem['name_category'] ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="mb-3">
                <label for="amount" class="form-label">Amount</label>
                <input type="text" class="form-control" id="amount" name="amount"  value="<?php echo isset($income['amount']) ? $income['amount'] : '' ; ?>" required>
            </div>
            <div class="mb-3">
                <label for="unit">Unit</label>
                <select class="form-control" id="unit" name="unit_id">
                    <option value="">--Select Unit--</option>
                    <?php foreach ($unitData as $unitItem): ?>
                        <option value="<?= $unitItem['id'] ?>" <?php if (isset($income['id'])) { echo  $income['unit_id'] == $unitItem['id'] ? 'selected' : '';}?>><?= $unitItem['name_unit'] ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="mb-3">
                <label for="type">Type</label>
                <select class="form-control" id="type" name="type_id">
                    <option value="">--Select Type--</option>
                    <?php foreach ($typeData as $typeItem): ?>
                        <option value="<?= $typeItem['id'] ?>" <?php if (isset($income['id'])) { echo $income['type_id'] == $typeItem['id'] ? 'selected' : '';}?>><?= $typeItem['name_type'] ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="mb-3">
                <label for="name_income" class="form-label">Name Income</label>
                <input type="text" class="form-control" id="name_income" name="name_income" value="<?php echo isset($income['name_income']) ? $income['name_income'] : '' ; ?>" required>
            </div>
            <div class="mb-3">
                <label for="income_detail" class="form-label">Income Detail</label>
                <textarea class="form-control" id="income_detail" name="income_detail"><?php echo isset($income['income_detail']) ? $income['income_detail'] : '' ; ?></textarea>
            </div>
            <button type="submit" class="btn btn-primary"><?php echo isset($income['id']) ? 'Update' : 'Add'; ?></button>
        </form>
        </div>
    </div>
</div>
<script>
    $(document).ready(function () {
        $('#date').datepicker({
            uiLibrary: 'bootstrap4',
            format: 'yyyy-mm-dd'
        });
        $('#hour').timepicker({
            timeFormat: 'HH:mm',
            interval: 1,
            minTime: '0',
            maxTime: '23:59',
            defaultTime: '<?php echo isset($income['hour']) ? $income['hour'] : '0'; ?>',
            startTime: '00:00',
            dynamic: false,
            dropdown: true,
            scrollbar: true
        });
    });
</script>
<?php echo view('layout/v_footer'); ?>