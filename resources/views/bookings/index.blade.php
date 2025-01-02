@extends('admin.dashboard')
@section('content')
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&family=Montserrat:wght@600&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Roboto', sans-serif; /* Use Roboto for body text */
            margin: 0;
            padding: 20px;
            background-color: #f4f4f4;
            color: #333;
        }

        h1 {
            text-align: center;
            color: #2c3e50;
            font-family: 'Montserrat', sans-serif; /* Use Montserrat for headings */
        }

        form {
            margin-bottom: 20px;
            padding: 15px;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        input[type="text"],
        input[type="date"],
        button {
            padding: 10px;
            margin-top: 10px;
            border-radius: 5px;
            border: 1px solid #ccc;
            width: calc(100% - 22px); /* Adjust width to account for padding */
        }

        button {
            background-color: #3498db; /* Default button color */
            color: white;
            border: none;
            cursor: pointer;
        }

        button:hover {
            background-color: #2980b9; /* Darker blue on hover */
        }

        .approve-button {
            background-color: #28a745; /* Green for approve */
        }

        .approve-button:hover {
            background-color: #218838; /* Darker green on hover */
        }

        .reject-button {
            background-color: #dc3545; /* Red for reject */
        }

        .reject-button:hover {
            background-color: #c82333; /* Darker red on hover */
        }

        h2 {
            margin-top: 30px;
            color: #2c3e50;
            font-family: 'Montserrat', sans-serif; /* Use Montserrat for subheadings */
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
            background-color: #fff;
        }

        th, td {
            padding: 12px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #3498db; /* Blue header */
            color: white;
        }

        tr:hover {
            background-color: #f1f1f1; /* Light gray on row hover */
        }

        .alert-success {
            background-color: #dff0d8; /* Light green */
            color: #3c763d; /* Dark green */
            padding: 10px;
            border-radius: 5px;
            margin-bottom: 20px;
        }
    </style>
</head>
    <h1>Sound System Booking</h1>
    <form action="/bookings" method="GET">
        <input type="text" name="search" placeholder="Search Equipment" value="{{ request('search') }}">
        <button type="submit">Search</button>
    </form>
    <!-- @if (session('success'))
        <div class="alert-success">{{ session('success') }}</div>
    @endif

    <form action="{{ route('bookings.store') }}" method="POST">
        @csrf
        <input hidden type="text" name="user_id" value="1">
        <input type="text" name="equipment_name" placeholder="Equipment Name" required>
        <input type="date" name="booking_date" required>
        <button type="submit">Book Now</button>
    </form> -->

    <h2>Booking List</h2>
    <table>
        <tr>
            <th>Equipment</th>
            <th>Date</th>
            <th>Status</th>
            <th>Actions</th>
        </tr>
        @foreach($bookings as $booking)
        <tr>
            <td>{{ $booking->equipment_name }}</td>
            <td>{{ $booking->booking_date }}</td>
            <td>{{ $booking->status }}</td>
            <td>
                @if($booking->status == 'pending')
                <form action="{{ route('bookings.approve', $booking->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('PUT')
                    <button type="submit" class="approve-button">Approve</button> <!-- Green button -->
                </form>
                <form action="{{ route('bookings.reject', $booking->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="reject-button">Reject</button> <!-- Red button -->
                </form>
                @endif
            </td>
        </tr>
        @endforeach
    </table>

   

@endsection