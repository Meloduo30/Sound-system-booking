<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $__env->yieldContent('title', 'Admin Dashboard'); ?></title>
    
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo e(asset('css/app.css')); ?>"> <!-- Link to your CSS -->
    <style>
        body {
            font-family: 'Roboto', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }

        header {
            background-color: #007bff; /* Primary color */
            color: white;
            padding: 20px 30px; /* Increased padding for better spacing */
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
            display: flex;
            justify-content: space-between; /* Space between items */
            align-items: center; /* Center items vertically */
        }

        header h1 {
            margin: 0;
            font-size: 26px; /* Slightly larger font size */
        }

        .navbar {
            display: flex;
            justify-content: space-around; /* Evenly space navbar items */
            background-color: #343a40; /* Dark background for navbar */
            padding: 15px 0; /* Increased padding for navbar */
        }

        .navbar a {
            color: white;
            text-decoration: none;
            padding: 12px 25px; /* Increased padding for better click area */
            border-radius: 5px; /* Rounded corners */
            transition: background-color 0.3s ease, transform 0.2s ease; /* Smooth transition */
        }

        .navbar a:hover {
            background-color: #495057; /* Darker shade on hover */
            transform: translateY(-2px); /* Lift effect on hover */
        }

        .content {
            padding: 30px; /* Increased padding for content area */
        }

        .content h2 {
            color: #333; /* Darker text for content headings */
            font-size: 24px; /* Larger heading size */
            margin-bottom: 15px; /* Space below headings */
        }

        .content p {
            line-height: 1.8; /* Improved readability */
            margin-bottom: 15px; /* Space below paragraphs */
        }

        .notifications {
            margin: 15px 0;
            padding: 15px;
            border-radius: 5px;
            background-color: #ffc107; /* Yellow background for notifications */
            color: white;
            font-weight: bold;
        }

        @media (max-width: 768px) {
            header {
                flex-direction: column; /* Stack items on smaller screens */
                align-items: flex-start; /* Align items to the start */
                padding: 15px; /* Adjust padding for mobile */
            }
            
            .navbar {
                flex-direction: column; /* Stack navbar items vertically */
                width: 100%; /* Full width on mobile */
                display: none; /* Hide navbar initially on mobile */
                padding-left: 0; 
                padding-right: 0;
                box-shadow: none; 
                margin-top: 10px; /* Space above navbar on mobile */
            }
            
            .navbar.active {
                display: flex; /* Show navbar when active */
                box-shadow: 0 -2px 5px rgba(0, 0, 0, 0.1); /* Shadow when active */
            }
            
            .navbar-toggle {
                cursor: pointer; 
                color: white;
                background-color: transparent;
                border: none;
                font-size: 20px; 
                margin-left: auto; 
                margin-top: 10px; 
                transition: transform 0.2s ease;
            }

            .navbar-toggle:hover {
                transform: rotate(90deg); /* Rotate toggle on hover for effect */
            }
        }
    </style>
</head>
<body>

<header>
    <h1>Admin Dashboard</h1>
    <button class="navbar-toggle" onclick="toggleNavbar()">☰</button> <!-- Toggle button for mobile -->
</header>

<div class="navbar" id="navbar">
    <a href="<?php echo e(route('admin.dashboard')); ?>">Dashboard</a>
    <a href="<?php echo e(route('admin.users')); ?>">Users</a>
    <a href="<?php echo e(route('admin.settings')); ?>">Settings</a>
    <!-- Add more links as needed -->
</div>

<!-- Notifications Section -->
<div class="notifications">
    You have new notifications! Check them out.
</div>

<div class="content">
    <?php echo $__env->yieldContent('content'); ?>
</div>

<script>
    function toggleNavbar() {
        const navbar = document.getElementById('navbar');
        navbar.classList.toggle('active'); // Toggle active class for showing/hiding
    }
</script>

</body>
</html><?php /**PATH C:\sound_system_booking\resources\views/admin/dashboard.blade.php ENDPATH**/ ?>