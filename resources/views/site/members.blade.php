@php
    $memberProfile=($view??null)==='members' && request()->filled('person');
    $staffPersonalLinks=\App\Services\StaffPortals::links($items);
@endphp
<div class="manager-grid portal-member-grid {{ $memberProfile?'is-profile':'' }}">
@foreach($items as $person)
@php
    $memberOrganization=$person['organization']['name']??(($person['organization_id']??null)===($home['organization']['id']??0)?($home['organization']['name']??''):'');
@endphp
<article class="portal-member-card {{ $memberProfile?'is-profile':'' }}">
    <header class="portal-member-heading">
        <div class="portal-member-portrait" x-data="{failed:false}">
            @if($image=$ui->image($person))
                <img src="{{ $image }}" alt="{{ empty($person['media_id']) && !empty($person['image_url']) ? 'تصویر موقت' : $person['name'] }}" width="88" height="88" loading="lazy" x-show="!failed" x-init="failed=$el.complete && $el.naturalWidth===0" x-on:error="failed=true">
                <span class="portal-member-avatar" x-show="failed" x-cloak aria-hidden="true">@include('icons.people')</span>
            @else
                <span class="portal-member-avatar" aria-hidden="true">@include('icons.people')</span>
            @endif
        </div>
        <div class="portal-member-identity"><h3>{{ $person['name'] }}</h3><p class="portal-member-position">{{ $person['position'] ?? '' }}</p></div>
    </header>
    @if(($person['kind']??'')==='governor' && !empty($person['term_period']))<p class="portal-governor-term"><span>دوره تصدی</span><bdi>{{ $person['term_period'] }}</bdi></p>@endif
    @if($memberOrganization && $memberOrganization!==($person['position']??''))<p class="portal-member-organization">{{ $memberOrganization }}</p>@endif
    @if($memberProfile)
        @if(!empty($person['bio']))<p class="portal-member-bio">{{ $ui->text($person['bio']) }}</p>@endif
        @if(!empty($person['body']))<div class="portal-article-body">{!! \App\Services\Html::clean($person['body']) !!}</div>@endif
    @endif
    <div class="portal-member-actions">
        @if(isset($staffPersonalLinks[$person['id']]))<a class="portal-member-personal" href="{{ $staffPersonalLinks[$person['id']] }}" aria-label="ورود به صفحه شخصی {{ $person['name'] }}">ورود به صفحه شخصی <span aria-hidden="true">←</span></a>@endif
        <a class="portal-member-profile" href="{{ $ui->href('/managers?person='.$person['id'],$county) }}" aria-label="مشاهدهٔ پروفایل {{ $person['name'] }}">مشاهده پروفایل <span aria-hidden="true">←</span></a>
        <a class="portal-member-contact" href="{{ !empty($person['email']) ? 'mailto:'.$person['email'] : $ui->href('/contact',$county) }}" aria-label="ارتباط با {{ $person['name'] }}">ارتباط</a>
    </div>
</article>
@endforeach
</div>
@if(($view??null)==='members' && !empty($meta) && $meta['last_page']>1)
<nav class="portal-pagination" aria-label="صفحه‌های مدیران">@for($number=max(1,$meta['current_page']-3);$number<=min($meta['last_page'],$meta['current_page']+3);$number++)<a href="{{ request()->fullUrlWithQuery(['page'=>$number]) }}" @if($number===$meta['current_page'])aria-current="page"@endif>{{ $number }}</a>@endfor</nav>
@endif
