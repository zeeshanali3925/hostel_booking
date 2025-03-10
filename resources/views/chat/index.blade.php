@extends('layouts.app')

@section('content')
<div class="container mx-auto p-6">
    <div class="bg-white p-4 shadow-lg rounded-lg">
        <h2 class="text-2xl font-bold mb-4">Communication Center</h2>
        <div id="messages" class="border p-4 h-60 overflow-y-scroll bg-gray-100"></div>
        
        <form id="message-form" class="mt-4">
            <input type="text" id="message-input" placeholder="Type a message..." class="w-full p-2 border rounded">
            <button type="submit" class="mt-2 bg-blue-500 text-white px-4 py-2 rounded">Send</button>
        </form>
    </div>
</div>

<script>
    document.getElementById('message-form').addEventListener('submit', function(e) {
        e.preventDefault();
        let messageInput = document.getElementById('message-input').value;
        fetch('/messages', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
            body: JSON.stringify({ receiver_id: 1, message: messageInput }) // Replace 1 with actual receiver_id
        }).then(response => response.json())
        .then(data => {
            document.getElementById('messages').innerHTML += `<p>${data.message}</p>`;
            document.getElementById('message-input').value = '';
        });
    });

    function fetchMessages() {
        fetch('/messages')
            .then(response => response.json())
            .then(messages => {
                document.getElementById('messages').innerHTML = '';
                messages.forEach(msg => {
                    document.getElementById('messages').innerHTML += `<p>${msg.message}</p>`;
                });
            });
    }

    setInterval(fetchMessages, 3000);
</script>
@endsection
