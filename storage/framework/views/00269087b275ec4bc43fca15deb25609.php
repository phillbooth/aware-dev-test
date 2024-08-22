<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Stored Jokes</title>
    <?php echo app('Illuminate\Foundation\Vite')(['resources/css/app.css', 'resources/js/app.js']); ?>
</head>
<body class="bg-gray-100 min-h-screen flex flex-col items-center py-6">
    <div class="w-full max-w-3xl bg-white p-8 rounded-lg shadow-md">
        <h1 class="text-2xl font-bold mb-6 text-center">Stored Jokes</h1>

        <?php if($jokes->isEmpty()): ?>
            <p class="text-center text-gray-700">No jokes available.</p>
        <?php else: ?>
            <ul class="space-y-4">
                <?php $__currentLoopData = $jokes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $joke): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li class="bg-gray-100 p-4 rounded-lg shadow">
                        <strong><?php echo e($joke->id); ?>:</strong> <?php echo e($joke->joke); ?>

                    </li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>
        <?php endif; ?>
    </div>
</body>
</html>
<?php /**PATH C:\laragon\www\laravel-task\your-project-name\resources\views\jokes\index.blade.php ENDPATH**/ ?>