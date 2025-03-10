@foreach ($feed as $item)
    @if ($item['type'] === 'article' || $item['type'] === 'news')
        <div class="post">
            <h2>{{ $item['title'] }}</h2>
            <p>{{ $item['content'] }}</p>
        </div>
    @elseif ($item['type'] === 'image')
        <div class="post">
            <img src="{{ $item['image_path'] }}" alt="Image" width="300">
            <p>{{ $item['caption'] }}</p>
        </div>
    @endif
@endforeach
