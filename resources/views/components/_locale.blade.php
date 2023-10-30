<form action="{{ route('set.locale', $lang) }}" method="POST" class="d-inline">
    @csrf
    <button type="submit" class="btn">
        <img src="{{ asset('vendor/blade-flags/language-' . $lang . '.svg') }}" alt="" width="20"
            height="20">
    </button>
</form>
