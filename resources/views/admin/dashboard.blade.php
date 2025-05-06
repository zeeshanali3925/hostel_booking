<h2>Pending Hostels</h2>
@foreach($hostels as $hostel)
    <p>{{ $hostel->name }} - <a href="{{ route('admin.approve', $hostel->id) }}">Approve</a> | <a href="{{ route('admin.reject', $hostel->id) }}">Reject</a></p>
<<<<<<< HEAD
@endforeach
=======
@endforeach
>>>>>>> 08d23048286da9052358b69b8d1e15dbb96fd314
