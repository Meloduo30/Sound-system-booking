<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $__env->yieldContent('title', 'Dashboard'); ?></title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Roboto', sans-serif;
            margin: 0;
            padding: 20px;
            background-color: #f4f4f4;
            color: #333;
        }

        header {
            background-color: #007bff; /* Bootstrap primary color */
            color: white;
            padding: 10px 20px;
            border-radius: 5px;
        }

        header h1 {
            margin: 0;
        }

        main {
            margin-top: 20px;
            padding: 20px;
            background-color: white;
            border-radius: 5px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }

        footer {
            margin-top: 20px;
            text-align: center;
            font-size: 14px;
        }

        @media (max-width: 600px) {
            body {
                padding: 10px;
            }

            main {
                padding: 15px;
            }
        }
    </style>
</head>
<body>

    <header>
        <h1>Dashboard</h1>
        <!-- Add navigation or header content here -->
    </header>

    <main>
        <?php echo $__env->yieldContent('content'); ?>
    </main>

    <footer>
        <p>&copy; <?php echo e(date('Y')); ?> My Application</p>
    </footer>

</body>
</html><?php /**PATH C:\sound_system_booking\resources\views/layouts/dashboard.blade.php ENDPATH**/ ?>