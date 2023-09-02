<?php echo view('layout/v_header'); ?>

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Income</h1>

    </div>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Detail Income</h6>
        </div>
        <div class="card-body">
            <p><strong>ID :</strong> <?= $income['id'] ?></p>
            <p><strong>Date :</strong> <?= $income['date'] ?></p>
            <p><strong>Hour :</strong> <?= $income['hour'] ?></p>
            <p><strong>Balance :</strong> <?= $income['title_balance'] ?></p>
            <p><strong>Category :</strong> <?= $income['name_category'] ?></p>
            <p><strong>Amount :</strong> <?= $income['amount'] ?></p>
            <p><strong>Unit :</strong> <?= $income['name_unit'] ?></p>
            <p><strong>Type :</strong> <?= $income['name_type'] ?></p>
            <p><strong>Name Income :</strong> <?= $income['name_income'] ?></p>
            <p><strong>Income Detail :</strong></p>
            <p><?= $income['income_detail'] ?></p>
        </div>
    </div>
</div>

<?php echo view('layout/v_footer'); ?>