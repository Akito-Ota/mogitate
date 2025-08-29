<?php $__env->startSection('title', $product->name.' | 商品詳細'); ?>

<?php $__env->startPush('styles'); ?>
<link rel="stylesheet" href="<?php echo e(asset('css/show.css')); ?>">
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
<div class="detail-container">

    <div class="detail-header">
        <a class="back-link" href="<?php echo e(route('products.index')); ?>">商品一覧</a>  <?php echo e($product->name); ?>

    </div>

    <div class="detail-panel">
        
        <div class="detail-left">
            <div class="img-box">
                <img src="<?php echo e(asset($product->image ?? 'storage/image/noimage.png')); ?>" alt="<?php echo e($product->name); ?>">
            </div>
            <label class="file-label">
                <span>ファイルを選択</span>
                <input type="file" form="product-update" name="image" accept=".png,.jpeg,.jpg">
            </label>
            <?php $__errorArgs = ['image'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
            <p class="error"><?php echo e($message); ?></p>
            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
        </div>

        
        <div class="detail-right">
            <form id="product-update" method="POST" action="<?php echo e(route('products.update', $product)); ?>" enctype="multipart/form-data">
                <?php echo csrf_field(); ?>
                
                <div class="field">
                    <label>商品名</label>
                    <input type="text" name="name" value="<?php echo e(old('name', $product->name)); ?>" placeholder="商品名を入力">
                    <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <p class="error"><?php echo e($message); ?></p> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>

                
                <div class="field">
                    <label>値段</label>
                    <input type="text" name="price" value="<?php echo e(old('price', $product->price)); ?>" placeholder="値段を入力">
                    <?php $__errorArgs = ['price'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <p class="error"><?php echo e($message); ?></p> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    <p class="hint">0〜10000円以内で入力してください</p>
                </div>

                
                <div class="field">
                    <label>季節</label>
                    <?php $checked = old('season_ids', $product->seasons->pluck('id')->toArray()); ?>
                    <div class="radios">
                        <?php $__currentLoopData = $seasons; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $season): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <label class="radio">
                            <input type="checkbox" name="season_ids[]" value="<?php echo e($season->id); ?>"
                                <?php echo e(in_array($season->id, $checked ?? []) ? 'checked' : ''); ?>>
                            <span><?php echo e($season->name); ?></span>
                        </label>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                    <?php $__errorArgs = ['season_ids'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <p class="error"><?php echo e($message); ?></p> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>

                
                <div class="field">
                    <label>商品説明</label>
                    <textarea name="description" rows="5" placeholder="商品の説明を入力"><?php echo e(old('description', $product->description)); ?></textarea>
                    <?php $__errorArgs = ['description'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <p class="error"><?php echo e($message); ?></p> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    <p class="hint">120文字以内で入力してください</p>
                </div>

                
                <div class="actions">
                    <a href="<?php echo e(route('products.index')); ?>" class="btn ghost">戻る</a>
                    <button type="submit" class="btn primary">変更を保存</button>
                </div>
            </form>

            
            <form method="POST" action="<?php echo e(route('products.destroy', $product)); ?>" onsubmit="return confirm('削除しますか？');">
                <?php echo csrf_field(); ?> <?php echo method_field('DELETE'); ?>
                <button type="submit" class="delete-btn" title="削除">🗑</button>
            </form>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/resources/views/show.blade.php ENDPATH**/ ?>