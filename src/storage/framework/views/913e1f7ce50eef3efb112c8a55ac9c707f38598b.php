<?php $__env->startSection('title', '商品一覧'); ?>
<?php $__env->startPush('styles'); ?>
<link rel="stylesheet" href="<?php echo e(asset('css/products.css')); ?>">
<?php $__env->stopPush(); ?>
<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="sidebar">
        <h2>商品一覧</h2>

        <form method="GET" action="<?php echo e(route('products.index')); ?>" class="search-box">
            <input type="text" name="q" value="<?php echo e($q); ?>" placeholder="商品名で検索">
            <button type="submit">検索</button>

            
            <label class="sort-label">価格順で表示</label>
            <select name="sort" onchange="this.form.submit()">
                <option value="" <?php echo e($sort==='' ? 'selected' : ''); ?>>デフォルト</option>
                <option value="price_asc" <?php echo e($sort==='price_asc'  ? 'selected' : ''); ?>>低い順に表示</option>
                <option value="price_desc" <?php echo e($sort==='price_desc' ? 'selected' : ''); ?>>高い順に表示</option>
            </select>
        </form>


        <div class="chips">
            <?php if($q !== ''): ?>
            <span class="chip">「<?php echo e($q); ?>」
                <a href="<?php echo e(route('products.index', array_filter(['sort'=>$sort]))); ?>">×</a>
            </span>
            <?php endif; ?>
            <?php if($sort === 'price_asc'): ?>
            <span class="chip">低い順
                <a href="<?php echo e(route('products.index', array_filter(['q'=>$q]))); ?>">×</a>
            </span>
            <?php elseif($sort === 'price_desc'): ?>
            <span class="chip">高い順
                <a href="<?php echo e(route('products.index', array_filter(['q'=>$q]))); ?>"></a>
            </span>
            <?php endif; ?>
        </div>

        <a href="<?php echo e(route('products.create')); ?>" class="btn-add">+ 商品を追加</a>
    </div>

    <div class="grid">
        <?php $__empty_1 = true; $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
        <a class="card" href="<?php echo e(url('/products/'.$product->id)); ?>">
            <div class="thumb">
                <img src="<?php echo e(asset($product->image ?? 'storage/image/noimage.png')); ?>" alt="<?php echo e($product->name); ?>">
            </div>
            <div class="meta">
                <div class="name"><?php echo e($product->name); ?></div>
                <div class="price">¥<?php echo e(number_format($product->price)); ?></div>
            </div>
        </a>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
        <p>該当する商品がありません。</p>
        <?php endif; ?>
    </div>
    <a class="card" href="<?php echo e(route('products.show', $product->id)); ?>">
        <div class="thumb">
            <img src="<?php echo e(asset($product->image ?? 'storage/image/noimage.png')); ?>" alt="<?php echo e($product->name); ?>">
        </div>
        <div class="meta">
            <div class="name"><?php echo e($product->name); ?></div>
            <div class="price">¥<?php echo e(number_format($product->price)); ?></div>
        </div>
    </a>


    <div class="pager">
        <?php echo e($products->onEachSide(1)->links()); ?>

    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/resources/views/index.blade.php ENDPATH**/ ?>