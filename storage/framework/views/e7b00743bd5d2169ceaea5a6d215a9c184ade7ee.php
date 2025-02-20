<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Edit a product</h1>
    <div>
            <?php if($errors->any()): ?>
                <ul>
                    <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li><?php echo e($error); ?></i>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>
            <?php endif; ?>
    </div>
    <form method="post" action="<?php echo e(route('product.update',['product'=> $product])); ?>">
        <?php echo csrf_field(); ?>
        <?php echo method_field('put'); ?>
        <div>
            <label>Name</label>
            <input type="text" name="name" placeholder="name" value="<?php echo e($product->name); ?>" />
        </div>
        <div>
            <label>Quantity</label>
            <input type="text" name="qty" placeholder="Quantity" value="<?php echo e($product->qty); ?>" />
        </div>
        <div>
            <label>Price</label>
            <input type="text" name="price" placeholder="Price" value="<?php echo e($product->price); ?>" />
        </div>
        <div>
            <label>Description</label>
            <input type="text" name="description" placeholder="Description" value="<?php echo e($product->description); ?>" />
        </div>
        <div>
            <input type="submit" value="Update Product" />
        </div>
    </form>
</body>
</html><?php /**PATH C:\xampp\htdocs\app-crud\resources\views/products/edit.blade.php ENDPATH**/ ?>