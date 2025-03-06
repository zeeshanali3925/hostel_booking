@foreach($users as $user)
    <div class="bg-white p-4 mb-2 shadow rounded">
        <p><strong>{{ $user->frist_name }} {{ $user->last_name }}</strong></p>
        <p>{{ $user->email }}</p>
    </div>
@endforeach
