

<?php $__env->startSection('content'); ?>
<style>
    .container {
        max-width: 800px;
        margin: 0 auto;
        padding: 20px;
        background-color: white;
        border-radius: 8px;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
    }

    h1, h2, h3 {
        color: #333;
    }

    .alert {
        background-color: #f8d7da;
        color: #721c24;
        padding: 10px;
        border-radius: 5px;
        margin-bottom: 20px;
    }

    form {
        margin-bottom: 30px;
    }

    input[type="email"],
    input[type="password"],
    input[type="text"],
    input[type="date"] {
        width: calc(100% - 20px);
        padding: 10px;
        margin-bottom: 10px;
        border: 1px solid #ccc;
        border-radius: 5px;
    }

    button {
        background-color: #007bff; /* Bootstrap primary color */
        color: white;
        padding: 10px 15px;
        border: none;
        border-radius: 5px;
        cursor: pointer;
    }

    button:hover {
        background-color: #0056b3; /* Darker shade for hover effect */
    }

    table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 20px;
    }

    table th,
    table td {
        padding: 10px;
        text-align: left;
        border-bottom: 1px solid #ddd;
    }

    table th {
        background-color: #f2f2f2; /* Light gray for header */
    }

    @media (max-width: 600px) {
        input[type="email"],
        input[type="password"],
        input[type="text"],
        input[type="date"],
        button {
            width: 100%;
            margin-bottom: 15px; /* Adjusted for smaller screens */
        }
    }
</style>

<div class="container">
    <h1>Admin Panel</h1>

    <?php if($errors->any()): ?>
        <div class="alert alert-danger">
            <ul>
                <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li><?php echo e($error); ?></li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>
        </div>
    <?php endif; ?>

    <form method="POST" action="<?php echo e(route('admin.login')); ?>">
        <?php echo csrf_field(); ?>
        <input type="hidden" name="redirect" value="<?php echo e(route('bookings.index')); ?>">
        <input type="email" name="email" placeholder="Email" required>
        <input type="password" name="password" placeholder="Password" required>
        <button type="submit">Login</button>
    </form>


    <h2>Booking Management</h2>

    <form action="<?php echo e(route('bookings.store')); ?>" method="POST">
        <?php echo csrf_field(); ?>
        <input type="text" name="equipment_name" placeholder="Equipment Name" required>
        <input type="date" name="booking_date" required>
        <button type="submit">Book Now</button>
    </form>

</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\sound_system_booking\resources\views/auth/login.blade.php ENDPATH**/ ?>