<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <title><?php echo $__env->yieldContent('title', 'mogitate'); ?></title>
    <link rel="stylesheet" href="<?php echo e(asset('css/app.css')); ?>">
    <?php echo $__env->yieldPushContent('styles'); ?>
</head>

<body>

    <header class="site-header">
        <h1 class="site-logo">mogitate</h1>
    </header>


    <main>
        <?php echo $__env->yieldContent('content'); ?>
    </main>
</body>

</html><?php /**PATH /var/www/resources/views/layouts/app.blade.php ENDPATH**/ ?>