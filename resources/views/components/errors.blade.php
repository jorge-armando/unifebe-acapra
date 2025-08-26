@if(session('messages'))
    @foreach(session('messages') as $message)
        <div class="alert alert-{{ $message['type'] }}">
            {{ $message['text'] }}
        </div>
    @endforeach
@endif