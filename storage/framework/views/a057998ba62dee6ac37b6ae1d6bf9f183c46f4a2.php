
<?php $__env->startSection('content'); ?>
<div class="container">
  <br>
    <div class="row justify-content-center">
      <div class="col-md-12">
        <h2>Edit Category</h2>
      </div>
      <br>
      <div class="col-md-12">
            <?php if(session('success')): ?>
                <div class="alert alert-success" role="alert">
                    <?php echo e(session('success')); ?>

                </div>
            <?php endif; ?>
            <?php if(session('error')): ?>
                <div class="alert alert-error" role="alert">
                    <?php echo e(session('error')); ?>

                </div>
            <?php endif; ?>
      <form action="<?php echo e(route('category.update', $category->id)); ?>" method="POST">
        <?php echo e(csrf_field()); ?>

        <input name="_method" type="hidden" value="PATCH">
        <div class="col-md-12">
          <div class="float-right">
            <button type="submit" class="btn btn-primary">Save</button>
            <a href="<?php echo e(route('category.index')); ?>" class="btn btn-primary">Cancel</a>
          </div>
        </div>
        <br/>
        <br/>
        <div class="col-md-12">  
          <div class="form-group">
            <input type="hidden" value="<?php echo e(csrf_token()); ?>" name="_token" />
            <label for="title">Category Name *</label>
            <input type="text" class="form-control <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="name" name="name" value="<?php echo e($category->name); ?>">
            <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
              <div class="alert alert-danger"><?php echo e($message); ?></div>
            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
          </div>
          <div class="form-group">
            <label for="title">Parent</label>
            <select class="form-control" id="parent_id" name="parent_id">
              <option value="0">No Parent</option>
              <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <option value="<?php echo e($cat->id); ?>" <?php if($cat->id==$category->parent_id): ?> selected <?php endif; ?>><?php echo e($cat->name); ?></option>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>
          </div>
          <div class="form-group">
            <label for="title">Sort Order *</label>
            <input type="number" class="form-control <?php $__errorArgs = ['sortorder'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="sortorder" name="sortorder" value="<?php echo e($category->sortorder); ?>">
            <?php $__errorArgs = ['sortorder'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
              <div class="alert alert-danger"><?php echo e($message); ?></div>
            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
          </div>
          <div class="form-group">
          <label for="status">Status</label>
          <select class="form-control" id="status" name="status">
            <option value="1" <?php if($category->status == '1'): ?> selected <?php endif; ?>>Enabled</option>
            <option value="0" <?php if($category->status == '0'): ?> selected <?php endif; ?>>Disabled</option>
          </select>
          </div>
        </div>  
      </form>
      </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\php_sample_projects\wings\laravel-category-app\resources\views/category/edit.blade.php ENDPATH**/ ?>