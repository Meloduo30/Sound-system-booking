<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $__env->yieldContent('title', 'User Dashboard'); ?></title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo e(asset('css/app.css')); ?>"> <!-- Link to your CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    
    <!-- Flatpickr CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">

    <style>
        body {
            font-family: 'Roboto', sans-serif;
            margin: 0;
            padding: 20px;
            background-color: #f4f4f4;
            color: #333;
        }

        header {
            background-color: #007bff; /* Primary color */
            color: white;
            padding: 15px 20px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
            display: flex;
            justify-content: space-between; 
            align-items: center; 
        }

        header h1 {
            margin: 0;
            font-size: 24px;
        }

        .content {
            padding: 20px;
        }

        /* Form Styles */
        form {
            margin-bottom: 20px;
            padding: 15px;
            background-color: white; /* White background for forms */
            border-radius: 8px; /* Rounded corners */
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1); /* Subtle shadow */
        }

        input[type="text"],
        .flatpickr-input {
            padding: 10px;
            margin-top: 10px;
            border-radius: 5px;
            border: 1px solid #ccc;
            width: calc(100% - 22px);
        }

        button {
            background-color: #28a745; /* Green button */
            color: white;
            border: none;
            padding: 10px 15px;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease, transform 0.2s ease; /* Smooth transition */
        }

        button:hover {
            background-color: #218838; /* Darker green on hover */
        }

        button:active {
            transform: scale(0.95); /* Slightly shrink button on click */
        }

        /* Media Queries for Responsive Design */
        @media (max-width: 768px) {
            header {
                flex-direction: column; 
                align-items: flex-start; 
                padding: 15px; 
                text-align: left; /* Align text to the left on mobile */
            }
            
            .navbar {
                flex-direction: column; 
                width: 100%; 
                display: none; 
                padding-left: 0; 
                padding-right: 0; 
                box-shadow: none; 
                margin-top: -10px; /* Adjust margin when active */
             }
             
             .navbar.active {
                 display:flex; 
                 box-shadow:none; 
                 margin-top:-10px; 
             }
             
             .navbar-toggle {
                 cursor:pointer; 
                 color:white;
                 background-color:none;
                 border:none;
                 font-size :18 px ; 
                 margin-left:auto ; 
                 margin-top:-5 px ; 
                 transition:.3s ease-in-out ;
             }
             
             .navbar-toggle:hover {
                 transform:.scale(1.1); /* Slightly enlarge toggle on hover */
             }
         }
    </style>
</head>
<body>

<header>
    <h1>User Dashboard</h1>
    <button class="navbar-toggle" onclick="toggleNavbar()">☰</button> <!-- Toggle button for mobile -->
</header>

<?php if(session('success')): ?>
    <div class="alert alert-success"><?php echo e(session('success')); ?></div>
<?php endif; ?>

<form action="/bookings" method="GET">
    <input type="text" name="search" placeholder="Search Equipment" value="<?php echo e(request('search')); ?>">
    <button type="submit">Search</button>
</form>

<form action="<?php echo e(route('bookings.store')); ?>" method="POST">
    <?php echo csrf_field(); ?>
    <input hidden type="text" name="user_id" value="1">
    <input type="text" name="equipment_name" placeholder="Equipment Name" required>
    
    <!-- Booking Date Input -->
    <input type="text" id="booking_date" name="booking_date" placeholder="Select Booking Date" required>
    
    <button type="submit">Book Now</button>
</form>

<script src='https://cdn.jsdelivr.net/npm/flatpickr'></script>
<script>
// Initialize Flatpickr
flatpickr("#booking_date", {
    dateFormat: "Y-m-d", // Format for the date input
});
</script>

</body>
</html><?php /**PATH C:\sound_system_booking\resources\views/users/dashboard.blade.php ENDPATH**/ ?>