<?php echo view('layout/v_header'); ?>

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Category</h1>
        <a href="<?= base_url('admin/category/add') ?>" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                class="fas fa-plus fa-sm text-white-50"></i> Add Category</a>
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
            <h6 class="m-0 font-weight-bold text-primary">Table Category</h6>
        </div>
        <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Name Category</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    $index = 1 ;
                    foreach ($categoryData as $categoryItem): ?>
                        <tr>
                            <td><?= $index ?></td>
                            <td><?= $categoryItem['name_category']; ?></td>
                            <td>
                                <a href="<?= base_url('admin/category/edit/').$categoryItem['id'] ?>" class="btn btn-success"><i class="fas fa-edit"></i></a>
                                <a href="<?= base_url('admin/category/delete/').$categoryItem['id'] ?>" class="btn btn-danger"><i class="fas fa-trash"></i></a>
                            </td>
                        </tr>
                    <?php 
                    $index++;
                    endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?php echo view('layout/v_footer'); ?>