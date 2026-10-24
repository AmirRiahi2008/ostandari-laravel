<div class="portal-menu-columns">
    @foreach(!empty($branch['children']) ? $branch['children'] : [$branch] as $group)
        <section class="portal-menu-group">
            <a class="portal-menu-group-title" href="{{ $group['href'] }}">{{ $group['title'] }}</a>
            @if(!empty($group['children']))
                @include('partials.mega-links',['links'=>$group['children']])
            @endif
        </section>
    @endforeach
</div>
