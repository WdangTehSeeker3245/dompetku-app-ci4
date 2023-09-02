<?php echo view('layout/v_header'); ?>

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Expense</h1>

    </div>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Detail Expense</h6>
        </div>
        <div class="card-body">
            <p><strong>ID :</strong> <?= $expense['id'] ?></p>
            <p><strong>Date :</strong> <?= $expense['date'] ?></p>
            <p><strong>Hour :</strong> <?= $expense['hour'] ?></p>
            <p><strong>Balance :</strong> <?= $expense['title_balance'] ?></p>
            <p><strong>Category :</strong> <?= $expense['name_category'] ?></p>
            <p><strong>Amount :</strong> <?= $expense['amount'] ?></p>
            <p><strong>Unit :</strong> <?= $expense['name_unit'] ?></p>
            <p><strong>Type :</strong> <?= $expense['name_type'] ?></p>
            <p><strong>Name Income :</strong> <?= $expense['name_expense'] ?></p>
            <p><strong>Income Detail :</strong></p>
            <p><?= $expense['expense_detail'] ?></p>
        </div>
    </div>
</div>

<?php echo view('layout/v_footer'); ?>