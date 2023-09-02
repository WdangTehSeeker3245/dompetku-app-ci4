<?php echo view('layout/v_header'); ?>

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Balance</h1>

    </div>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Detail Balance</h6>
        </div>
        <div class="card-body">
            <p><strong>ID :</strong> <?= $balance['id'] ?></p>
            <p><strong>Title Balance :</strong> <?= $balance['title_balance'] ?></p>
            <p><strong>Amount :</strong> <?= $balance['amount'] ?></p>
            <p><strong>Description Balance :</strong></p>
            <p><?= $balance['description_balance'] ?></p>
        </div>
    </div>
</div>

<?php echo view('layout/v_footer'); ?>