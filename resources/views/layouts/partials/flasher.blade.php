@foreach (['success', 'warnning', 'error'] as $flash)
    @if ($message = Session::get($flash))
        <div id="flasher_msg" class="fixed  transition-all duration-1000  -right-full bottom-10 px-4 py-2 rounded-lg  {{ $flash == "success" ?  "bg-green-500 text-white" : ($flash == "warnning" ? "bg-amber-600/80" : "bg-red-600/70 text-white") }} text-black">{{ $message }}</div>
    @endif
@endforeach
