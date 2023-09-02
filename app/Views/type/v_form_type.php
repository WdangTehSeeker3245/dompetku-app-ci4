<?php echo view('layout/v_header'); ?>

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Type</h1>
    </div>
    
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary"><?php echo isset($type['id']) ? 'Update' : 'Add'; ?> Type</h6>
        </div>
        <div class="card-body">
        <form method="post" action="<?php echo isset($type['id']) ? base_url('admin/type/update/' . $type['id']) : base_url('admin/type/store'); ?>">
            <div class="mb-3">
                <label for="name_type" class="form-label">Name Type</label>
                <input type="text" class="form-control" id="name_type" name="name_type" value="<?php echo isset($type['name_type']) ? $type['name_type'] : '' ; ?>" required>
            </div>
            <div class="mb-3">
                <label for="level" class="form-label">Level</label>
                <input type="text" class="form-control" id="level" name="level" value="<?php echo isset($type['level']) ? $type['level'] : '' ; ?>" required>
            </div>
            <button type="submit" class="btn btn-primary"><?php echo isset($type['id']) ? 'Update' : 'Add'; ?></button>
        </form>
        </div>
    </div>
</div>

<?php echo view('layout/v_footer'); ?>