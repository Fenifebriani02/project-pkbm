<li class="menu-items {{ request()->is($url . '*') ? 'active' : '' }}">
    <a href="{{ url($url ?? '') }}" class="item">
        <span class="mdi {{ $icon ?? '' }}"></span>
        <span class="item-title">{{ $title ?? '' }}</span>
    </a>
</li>
