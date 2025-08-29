<?php $__env->startSection('title', '商品登録'); ?>

<?php $__env->startPush('styles'); ?>
<link rel="stylesheet" href="<?php echo e(asset('css/create.css')); ?>">
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
<div class="container">
    <h2>商品登録</h2>

    
    <?php if($errors->any()): ?>
    <div class="error-box">
        <ul>
            <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <li><?php echo e($error); ?></li>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </ul>
    </div>
    <?php endif; ?>

    <form action="<?php echo e(route('products.store')); ?>" method="POST" enctype="multipart/form-data">
        <?php echo csrf_field(); ?>

        
        <div class="field">
            <label for="name">商品名</label>
            <input type="text" name="name" id="name" value="<?php echo e(old('name')); ?>" placeholder="商品名を入力">
        </div>

        
        <div class="field">
            <label for="price">価格</label>
            <input type="text" name="price" id="price" value="<?php echo e(old('price')); ?>" placeholder="例: 800">
            <p class="hint">0〜10000円以内で入力してください</p>
        </div>

        
        <div class="field">
            <label for="image">商品画像</label>
            <input type="file" name="image" id="image" accept="image/png, image/jpeg">
        </div>

        
        <div class="field">
            <label>季節</label>
            <div class="checkbox-group">
                <?php $__currentLoopData = $seasons; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $season): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <label>
                    <input type="checkbox" name="season_ids[]" value="<?php echo e($season->id); ?>"
                        <?php echo e(in_array($season->id, old('season_ids', [])) ? 'checked' : ''); ?>>
                    <?php echo e($season->name); ?>

                </label>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>

        
        <div class="field">
            <label for="description">商品説明</label>
            <textarea name="description" id="description" rows="4" placeholder="商品の説明を入力"><?php echo e(old('description')); ?></textarea>
        </div>

        
        <div class="form-buttons">
            <button type="submit" class="btn-submit">登録する</button>
            <a href="<?php echo e(route('products.index')); ?>" class="btn-cancel">戻る</a>
        </div>
    </form>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/resources/views/create.blade.php ENDPATH**/ ?>