<a href="{{ $url ?? '' }}" class="btn btn-outline-{{ $class ?? '' }}"
    @isset($modal) data-bs-toggle="modal" @endisset>
    @isset($icons)
        <i class="mdi {{ $icon ?? '' }}"></i>
    @endisset
    <span>{{ $label ?? '' }}</span>
</a>
