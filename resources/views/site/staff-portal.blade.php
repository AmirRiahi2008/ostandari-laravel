@php
    $manager=$portal->member;
    $portrait=$portal->portrait?->url ?: $ui->image($manager->toArray());
@endphp
<section class="staff-public" aria-label="صفحه شخصی {{ $manager->name }}">
    <header class="staff-public-heading {{ $portal->banner?'has-banner':'' }}">
        @if($portal->banner)<img class="staff-public-banner" src="{{ $portal->banner->url }}" alt="{{ $portal->title }}">@endif
        <div><a class="staff-back" href="/managers?group=1">مدیران ستادی <span aria-hidden="true">←</span></a><h1>{{ $portal->title }}</h1>@if($portal->summary)<p>{{ $portal->summary }}</p>@endif</div>
        <a class="staff-manager-login" href="{{ $portal->adminPath() }}/login">ورود مدیر صفحه</a>
    </header>
    <div class="staff-public-layout">
        <aside class="staff-public-links"><a class="staff-gallery-link" href="{{ $portal->publicPath() }}?tab=gallery">@include('icons.gallery')<span>گالری فیلم و عکس</span><span aria-hidden="true">←</span></a>
            @if($staffLinks->isNotEmpty())<section class="staff-public-card"><h2>پیوندها</h2><ul class="staff-links-list">@foreach($staffLinks as $link)<li><a href="{{ $link->url }}" target="_blank" rel="noopener noreferrer">@if($link->asset)<img src="{{ $link->asset->url }}" alt="" loading="lazy">@endif<span>{{ $link->title }}</span><span aria-hidden="true">↗</span></a></li>@endforeach</ul></section>@endif
            @if($portal->phone || $portal->email || $portal->address)<section class="staff-public-card"><h2>اطلاعات تماس</h2><dl class="staff-contact">@if($portal->phone)<div><dt>تلفن</dt><dd><a href="tel:{{ preg_replace('/[^+0-9]/','',$portal->phone) }}"><bdi>{{ $portal->phone }}</bdi></a></dd></div>@endif @if($portal->email)<div><dt>ایمیل</dt><dd><a href="mailto:{{ $portal->email }}"><bdi>{{ $portal->email }}</bdi></a></dd></div>@endif @if($portal->address)<div><dt>نشانی</dt><dd>{{ $portal->address }}</dd></div>@endif</dl></section>@endif
        </aside>
        <div class="staff-public-content">
            <nav class="staff-public-tabs" aria-label="بخش‌های صفحه مدیر">@foreach(['news'=>'اخبار','announcement'=>'اطلاعیه‌ها','about'=>'معرفی واحد','gallery'=>'تصاویر','video'=>'ویدئوها'] as $key=>$label)<a href="{{ $portal->publicPath() }}?tab={{ $key }}" @if(!$staffItem && $staffTab===$key)aria-current="page"@endif>{{ $label }}</a>@endforeach</nav>
            @if($staffItem)
                <article class="staff-public-card staff-article"><a class="staff-back" href="{{ $portal->publicPath() }}?tab={{ $staffItem->kind }}">بازگشت به {{ \App\Services\StaffPortals::KINDS[$staffItem->kind] }}</a><time datetime="{{ $staffItem->published_at->toIso8601String() }}">{{ $ui->date($staffItem->published_at->toIso8601String()) }}</time><h2>{{ $staffItem->title }}</h2>@if($staffItem->summary)<p class="staff-article-lead">{{ $staffItem->summary }}</p>@endif @if($staffItem->asset)<img class="staff-article-image" src="{{ $staffItem->asset->url }}" alt="{{ $staffItem->title }}">@endif<div class="portal-article-body">{!! \App\Services\Html::articleBody($staffItem->body ?? '') !!}</div></article>
            @elseif($staffTab==='about')
                <section class="staff-public-card"><h2>معرفی واحد</h2>@if($portal->body)<div class="portal-article-body">{!! \App\Services\Html::articleBody($portal->body) !!}</div>@endif</section>
            @elseif(in_array($staffTab,['gallery','video']))
                <section class="staff-public-card"><h2>{{ \App\Services\StaffPortals::KINDS[$staffTab] }}</h2><div class="staff-public-gallery">@foreach($staffItems as $row)<a class="staff-gallery-item" href="{{ $staffTab==='video'?$row->url:$row->asset?->url }}" target="_blank" rel="noopener noreferrer">@if($row->asset)<div><img src="{{ $row->asset->url }}" alt="{{ $row->title }}" loading="lazy">@if($staffTab==='video')<span class="staff-play" aria-hidden="true">▶</span>@endif</div>@elseif($staffTab==='video')<div class="staff-video-placeholder" aria-hidden="true">▶</div>@endif<h3>{{ $row->title }}</h3></a>@endforeach</div>{{ $staffItems->links() }}</section>
            @else
                <section class="staff-public-card"><h2>{{ \App\Services\StaffPortals::KINDS[$staffTab] }}</h2><div class="staff-news-list">@forelse($staffItems as $row)<article class="staff-news-card"><a href="{{ $portal->publicPath() }}/content/{{ $row->id }}" class="staff-news-image">@if($row->asset)<img src="{{ $row->asset->url }}" alt="{{ $row->title }}" loading="lazy">@else<span class="staff-news-placeholder" aria-hidden="true">@include('icons.document')</span>@endif</a><div><time datetime="{{ $row->published_at->toIso8601String() }}">{{ $ui->date($row->published_at->toIso8601String()) }}</time><h3><a href="{{ $portal->publicPath() }}/content/{{ $row->id }}">{{ $row->title }}</a></h3><p>{{ $row->summary ?: $ui->text($row->body ?? '') }}</p><a class="staff-news-more" href="{{ $portal->publicPath() }}/content/{{ $row->id }}">ادامه خبر <span aria-hidden="true">←</span></a></div></article>@empty<p class="staff-empty">موردی ثبت نشده است.</p>@endforelse</div>{{ $staffItems->links() }}</section>
            @endif
        </div>
        <aside class="staff-public-profile"><section class="staff-public-card staff-manager-card"><div class="staff-manager-photo" x-data="{failed:false}">@if($portrait)<img src="{{ $portrait }}" alt="{{ $manager->name }}" x-show="!failed" x-on:error="failed=true" x-init="failed=$el.complete && !$el.naturalWidth">@endif<span @if($portrait)x-show="failed" x-cloak @endif class="staff-avatar" aria-hidden="true">@include('icons.people')</span></div><h2>{{ $manager->name }}</h2><p>{{ $portal->title }}</p>@if($portal->email)<a class="staff-direct-contact" href="mailto:{{ $portal->email }}">ارتباط مستقیم</a>@elseif($portal->phone)<a class="staff-direct-contact" href="tel:{{ preg_replace('/[^+0-9]/','',$portal->phone) }}">ارتباط مستقیم</a>@endif</section></aside>
    </div>
</section>
