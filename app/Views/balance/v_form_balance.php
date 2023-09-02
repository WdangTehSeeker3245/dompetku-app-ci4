<?php echo view('layout/v_header'); ?>

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Balance</h1>

    </div>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary"><?php echo isset($balance['id']) ? 'Update' : 'Add'; ?> Balance</h6>
        </div>
        <div class="card-body">
        <form method="post" action="<?php echo isset($balance['id']) ? base_url('admin/balance/update/' . $balance['id']) : base_url('admin/balance/store'); ?>">
            <div class="mb-3">
                <label for="title_balance" class="form-label">Title Balance</label>
                <input type="text" class="form-control" id="title_balance" name="title_balance" value="<?php echo isset($balance['title_balance']) ? $balance['title_balance'] : '' ; ?>" required>
            </div>
            <div class="mb-3">
                <label for="amount" class="form-label">Amount</label>
                <input type="number" class="form-control" id="amount" name="amount" value="<?php echo isset($balance['amount']) ? $balance['amount'] : '' ; ?>" required>
            </div>
            <div class="mb-3">
                <label for="description_balance" class="form-label">Description Balance</label>
                <textarea class="form-control" id="description_balance" name="description_balance"><?php echo isset($balance['description_balance']) ? $balance['description_balance'] : '' ; ?></textarea>
            </div>
            <button type="submit" class="btn btn-primary"><?php echo isset($balance['id']) ? 'Update' : 'Add'; ?></button>
        </form>
        </div>
    </div>
</div>

<?php echo view('layout/v_footer'); ?>