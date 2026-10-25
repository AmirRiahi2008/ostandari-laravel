<div class="manager-grid">
@foreach($items as $person)
<article class="card1">
    <div class="card1-bala"><div class="cart1-img" x-data="{failed:false}">
        @if($image=$ui->image($person))
            <img src="{{ $image }}" alt="{{ empty($person['media_id']) && !empty($person['image_url']) ? 'تصویر موقت' : $person['name'] }}" loading="lazy" x-show="!failed" x-init="failed=$el.complete && $el.naturalWidth===0" x-on:error="failed=true"><div class="cart1-avatar" x-show="failed" x-cloak>@include('icons.people')</div>
        @else<div class="cart1-avatar">@include('icons.people')</div>@endif
    </div><div class="cart1-onvan"><h3>{{ $person['name'] }}</h3><div class="badge">{{ $person['position'] ?? '' }}</div></div></div>
    <div class="cart1-p-class"><p>{{ $person['organization']['name'] ?? $person['position'] ?? '' }}</p></div>
    <div class="buttons"><a class="btn-outline" href="{{ $ui->href('/managers?person='.$person['id'],$county) }}">پروفایل</a><a class="btn-solid" href="{{ !empty($person['email']) ? 'mailto:'.$person['email'] : $ui->href('/contact',$county) }}">ارتباط</a></div>
    @if(!empty($person['bio']))<p>{{ $ui->text($person['bio']) }}</p>@endif
    @if(!empty($person['body']))<div class="portal-article-body">{!! \App\Services\Html::clean($person['body']) !!}</div>@endif
</article>
@endforeach
</div>
@if(($view??null)==='members' && !empty($meta) && $meta['last_page']>1)
<nav class="portal-pagination" aria-label="صفحه‌های مدیران">@for($number=max(1,$meta['current_page']-3);$number<=min($meta['last_page'],$meta['current_page']+3);$number++)<a href="{{ request()->fullUrlWithQuery(['page'=>$number]) }}" @if($number===$meta['current_page'])aria-current="page"@endif>{{ $number }}</a>@endfor</nav>
@endif
