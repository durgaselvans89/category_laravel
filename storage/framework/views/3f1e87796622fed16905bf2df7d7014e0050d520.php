
<?php $__env->startSection('content'); ?>
<script>
  function checkAll(bx){
    var form = bx.form;
    var ischecked = bx.checked;
    for (var i = 0; i < form.length; ++i) {
        if (form[i].type == 'checkbox') {
            form[i].checked = ischecked;
        }
    }
}
</script>
<div class="container">
  <br>
    <div class="row justify-content-center">
        <div class="col-md-12">
            <h2>Category List</h2>
        </div>
        
        <br>
        <div class="col-md-12">
        <form  method="post" action="<?php echo e(action('CategoryController@destroy',1)); ?>">
          <?php echo e(csrf_field()); ?>

          <input name="_method" type="hidden" value="DELETE">
          <div class="col-md-12">
              <div class="float-right">
                  <a href="<?php echo e(route('category.create')); ?>" class="btn btn-outline-danger"><i class="fa fa-plus"></i> Add Category</a>
                  <button class="btn btn-outline-danger" type="submit">Delete</button>
              </div>
          </div>
          <br>
          <br>    
          <div class="col-md-12">
              <?php if(session('success')): ?>
                  <div class="alert alert-success" role="alert">
                      <?php echo e(session('success')); ?>

                  </div>
              <?php endif; ?>
              <?php if(session('error')): ?>
                  <div class="alert alert-danger" role="alert">
                      <?php echo e(session('error')); ?>

                  </div>
              <?php endif; ?>
              <table class="table table-bordered">
                <thead class="thead-light">
                  <tr>
                    <th width="5%"><input type="checkbox" name="checkbox[]" value="all" onclick="checkAll(this)"/></th>
                    <th>Category Name</th>
                    <th width="10%"><center>Sort order</center></th>
                    <th width="14%"><center>Action</center></th>
                  </tr>
                </thead>
                <tbody>
                  <?php $__empty_1 = true; $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                      <tr>
                      <th><input type="checkbox" name="checkbox[]" value="<?php echo e($category->id); ?>"/></th>
                      <td><?php echo e($category->name); ?></td>
                      <td><center><?php echo e($category->sortorder); ?></center></td>
                      <td>
                        <div class="action_btn">
                          <div class="action_btn">
                            <a href="<?php echo e(route('category.edit', $category->id)); ?>" class="btn">Edit</a>
                          </div>
                        </div>
                      </td>
                    </tr>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                      <tr>
                      <td colspan="4"><center>No data found</center></td>
                    </tr>
                  <?php endif; ?>
                </tbody>
              </table>
              <?php echo e($categories->links()); ?>

          </div>
        </form>
      </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\php_sample_projects\wings\laravel-category-app\resources\views/category/list.blade.php ENDPATH**/ ?>