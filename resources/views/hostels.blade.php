<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hostels List</title>
</head>
<body>
    <h1>Available Hostels</h1>
    <ul>
        @foreach ($hostels as $hostel)
            <li>
                <strong>{{ $hostel->name }}</strong> - {{ $hostel->city }} <br>
                <p>{{ $hostel->description }}</p>
            </li>
        @endforeach
    </ul>
</body>
</html>
