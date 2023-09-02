<?php echo view('layout/v_header'); ?>

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Expense</h1>
    </div>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary"><?php echo isset($expense['id']) ? 'Update' : 'Add'; ?> Expense</h6>
        </div>
        <div class="card-body">
        <form method="post" action="<?php echo isset($expense['id']) ? base_url('admin/expense/update/' . $expense['id']) : base_url('admin/expense/store'); ?>">
            <div class="mb-3">
                <label for="date" class="form-label">Date</label>
                <input type="text" id="date" name="date"  value="<?php echo isset($expense['date']) ? $expense['date'] : '' ; ?>">
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
                        <option value="<?= $balanceItem['id'] ?>" <?php if (isset($expense['id'])) { echo $expense['balance_id'] == $balanceItem['id'] ? 'selected' : '';}?>><?= $balanceItem['title_balance'] ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="mb-3">
                <label for="category">Category</label>
                <select class="form-control" id="category" name="category_id">
                    <option value="">--Select Category--</option>
                    <?php foreach ($categoryData as $categoryItem): ?>
                        <option value="<?= $categoryItem['id'] ?>" <?php if (isset($expense['id'])) { echo $expense['category_id'] == $categoryItem['id'] ? 'selected' : '';}?>><?= $categoryItem['name_category'] ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="mb-3">
                <label for="amount" class="form-label">Amount</label>
                <input type="text" class="form-control" id="amount" name="amount"  value="<?php echo isset($expense['amount']) ? $expense['amount'] : '' ; ?>" required>
            </div>
            <div class="mb-3">
                <label for="unit">Unit</label>
                <select class="form-control" id="unit" name="unit_id">
                    <option value="">--Select Unit--</option>
                    <?php foreach ($unitData as $unitItem): ?>
                        <option value="<?= $unitItem['id'] ?>" <?php if (isset($expense['id'])) { echo  $expense['unit_id'] == $unitItem['id'] ? 'selected' : '';}?>><?= $unitItem['name_unit'] ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="mb-3">
                <label for="type">Type</label>
                <select class="form-control" id="type" name="type_id">
                    <option value="">--Select Type--</option>
                    <?php foreach ($typeData as $typeItem): ?>
                        <option value="<?= $typeItem['id'] ?>" <?php if (isset($expense['id'])) { echo $expense['type_id'] == $typeItem['id'] ? 'selected' : '';}?>><?= $typeItem['name_type'] ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="mb-3">
                <label for="name_expense" class="form-label">Name Expense</label>
                <input type="text" class="form-control" id="name_expense" name="name_expense" value="<?php echo isset($expense['name_expense']) ? $expense['name_expense'] : '' ; ?>" required>
            </div>
            <div class="mb-3">
                <label for="expense_detail" class="form-label">Expense Detail</label>
                <textarea class="form-control" id="expense_detail" name="expense_detail"><?php echo isset($expense['expense_detail']) ? $expense['expense_detail'] : '' ; ?></textarea>
            </div>
            <button type="submit" class="btn btn-primary"><?php echo isset($expense['id']) ? 'Update' : 'Add'; ?></button>
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
            defaultTime: '<?php echo isset($expense['hour']) ? $expense['hour'] : '0'; ?>',
            startTime: '00:00',
            dynamic: false,
            dropdown: true,
            scrollbar: true
        });
    });
</script>
<?php echo view('layout/v_footer'); ?>