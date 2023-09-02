<?php echo view('layout/v_header'); ?>

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Category</h1>

    </div>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary"><?php echo isset($category['id']) ? 'Update' : 'Add'; ?> Category</h6>
        </div>
        <div class="card-body">
        <form method="post" action="<?php echo isset($category['id']) ? base_url('admin/category/update/' . $category['id']) : base_url('admin/category/store'); ?>">
            <div class="mb-3">
                <label for="name_category" class="form-label">Name Category</label>
                <input type="text" class="form-control" id="name_category" name="name_category" value="<?php echo isset($category['name_category']) ? $category['name_category'] : '' ; ?>" required>
            </div>
            <button type="submit" class="btn btn-primary"><?php echo isset($category['id']) ? 'Update' : 'Add'; ?></button>
        </form>
        </div>
    </div>
</div>

<?php echo view('layout/v_footer'); ?>