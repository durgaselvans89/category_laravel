<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link href="<?php echo e(asset('css/styles.css')); ?>" rel="stylesheet">
    </head>
    <body>
<div class="content">
                <div class="topnav" id="myTopnav">
                <?php $__empty_1 = true; $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                
                    <?php if(isset($categories[$key]['menu']) && (count($categories[$key]['menu']) > 0)): ?>
                        <div class="dropdown">
                            <button class="dropbtn"><?php echo e($categories[$key]['name']); ?>

                              <i class="fa fa-caret-down"></i>
                            </button>
                            <div class="dropdown-content">
                                <?php $__currentLoopData = $categories[$key]['menu']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key1 => $value1): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                        <?php if(isset($categories[$key]['menu'][$key1]['submenu']) && (count($categories[$key]['menu'][$key1]['submenu']) > 0)): ?>
                                            <div class="subdropdown">
                                                <button class="subdropbtn"><?php echo e($categories[$key]['menu'][$key1]['name']); ?>

                                                  <i class="fa fa-caret-right"></i>
                                                </button>
                                                <div class="subdropdown-content">
                                                    <?php $__currentLoopData = $categories[$key]['menu'][$key1]['submenu']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key2 => $value2): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <a href="#"><?php echo e($categories[$key]['menu'][$key1]['submenu'][$key2]['name']); ?></a>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </div>
                                            </div>
                                        <?php else: ?>
                                            <a href="#"><?php echo e($categories[$key]['menu'][$key1]['name']); ?></a>    
                                        <?php endif; ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>
                        </div>
                    <?php else: ?>
                        <a href="#"><?php echo e($categories[$key]['name']); ?></a>    
                    <?php endif; ?>    
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                        <p>No data found</p>
                <?php endif; ?>
                </div>
            
            
        </div>
    </body>
</html>
<?php /**PATH D:\xampp\htdocs\php_sample_projects\wings\laravel-category-app\resources\views/home.blade.php ENDPATH**/ ?>