@extends('layouts.app')

@section('content')
<div class="container mx-auto">
    <h2 class="text-2xl font-bold mb-4">Users List</h2>
    <div id="users-container">
        @include('users.partials.list')
    </div>
    <div id="loading" class="text-center my-4 hidden">
        <p>Loading...</p>
    </div>
</div>

<script>
    let page = 1;
    let loading = false;

    window.onscroll = function () {
        if ((window.innerHeight + window.scrollY) >= document.body.offsetHeight - 100) {
            if (!loading) {
                loadMoreUsers();
            }
        }
    };

    function loadMoreUsers() {
        loading = true;
        document.getElementById('loading').classList.remove('hidden');
        page++;

        fetch(`/users?page=${page}`)
            .then(response => response.text())
            .then(data => {
                document.getElementById('users-container').innerHTML += data;
                document.getElementById('loading').classList.add('hidden');
                loading = false;
            })
            .catch(() => {
                document.getElementById('loading').classList.add('hidden');
                loading = false;
            });
    }
</script>
@endsection
