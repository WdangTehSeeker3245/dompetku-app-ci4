<?php echo view('layout/v_header'); ?>

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Expense</h1>
        <a href="<?= base_url('admin/expense/add') ?>" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                class="fas fa-plus fa-sm text-white-50"></i> Add Expense</a>
    </div>
    <?php
        if(session()->getFlashdata('message')){
            echo '<div class="alert alert-success" role="alert">
                '.session()->getFlashdata('message').'
            </div>';
        }
        if(session()->getFlashdata('error')){
            echo '<div class="alert alert-danger" role="alert">
                '.session()->getFlashdata('error').'
            </div>';
        }
    ?>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Table Expense</h6>
        </div>
        <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Date</th>
                        <th>Balance</th>
                        <th>Category</th>
                        <th>Amount</th>
                        <th>Unit</th>
                        <th>Type</th>
                        <th>Name</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($expenseData as $expenseItem): ?>
                        <tr>
                            <td><?= $expenseItem['date']; ?></td>
                            <td><?= $expenseItem['title_balance']; ?></td>
                            <td><?= $expenseItem['name_category']; ?></td>
                            <td><?= 'Rp ' . number_format($expenseItem['amount'], 2, ',', '.'); ?></td>
                            <td><?= $expenseItem['name_unit']; ?></td>
                            <td><?= $expenseItem['name_type']; ?></td>
                            <td><?= $expenseItem['name_expense']; ?></td>
                            <td>
                                <a href="<?= base_url('admin/expense/show/').$expenseItem['id'] ?>" class="btn btn-primary"><i class="fas fa-eye"></i></a>
                                <a href="<?= base_url('admin/expense/edit/').$expenseItem['id'] ?>" class="btn btn-success"><i class="fas fa-edit"></i></a>
                                <a href="<?= base_url('admin/expense/delete/').$expenseItem['id'] ?>" class="btn btn-danger"><i class="fas fa-trash"></i></a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?php echo view('layout/v_footer'); ?>