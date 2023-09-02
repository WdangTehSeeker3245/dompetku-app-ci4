<?php echo view('layout/v_header'); ?>

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Unit</h1>

    </div>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary"><?php echo isset($unit['id']) ? 'Update' : 'Add'; ?> Unit</h6>
        </div>
        <div class="card-body">
        <form method="post" action="<?php echo isset($unit['id']) ? base_url('admin/unit/update/' . $unit['id']) : base_url('admin/unit/store'); ?>">
            <div class="mb-3">
                <label for="name_unit" class="form-label">Name Unit</label>
                <input type="text" class="form-control" id="name_unit" name="name_unit" value="<?php echo isset($unit['name_unit']) ? $unit['name_unit'] : '' ; ?>" required>
            </div>
            <button type="submit" class="btn btn-primary"><?php echo isset($unit['id']) ? 'Update' : 'Add'; ?></button>
        </form>
        </div>
    </div>
</div>

<?php echo view('layout/v_footer'); ?>