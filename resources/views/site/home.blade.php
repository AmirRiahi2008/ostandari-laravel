<div class="home-experience">
<h1 class="source-sr-only">درگاه الکترونیکی استانداری مازندران</h1>
<section class="home-intro" aria-label="تازه‌های استانداری">
<div class="container-body d-f6279acc73263f">@include('site.latest')<div class="container-body-right">@include('site.slider')</div>@include('site.governor')</div>
</section>
<div class="sections-container">
<section class="home-counties" aria-label="فرمانداری‌های مازندران" data-home-reveal="true">@include('site.county-map')</section>
<section class="home-information" aria-label="مصوبات و پیوندهای مفید" data-home-reveal="true">
<div class="container-peyvand">
<div class="mz-portal-wrapper">
<div class="mz-portal-news">
<h2 class="mz-portal-title">مصوبات و اطلاعیه‌ها</h2>
<p class="mz-portal-subtitle">آخرین مصوبات و اطلاعیه‌های سازمان را مطالعه کنید.</p>
<ul class="mz-news-list" id="mzNewsList">@forelse(array_slice([...($home['announcements'] ?? []),...($home['resolutions'] ?? [])],0,6) as $item)<li class="mz-news-item">
<div>@include('icons.document')</div>
<div>
<time class="mz-news-date">{{ $ui->date($item['published_at'] ?? null) }}</time>
<p>
<a href="{{ $ui->article($item,$county) }}">{{ $item['title'] }}</a>
</p>
</div>
</li>@empty<li class="source-empty">مطلبی در این بخش منتشر نشده است.</li>@endforelse</ul>
<a class="source-more" href="{{ $ui->href('/regulations',$county) }}">مشاهدهٔ همهٔ اسناد <span aria-hidden="true">←</span>
</a>
</div>
<div class="mz-portal-links">
<h2 class="mz-portal-title">پیوندهای مفید</h2>
<p class="mz-portal-subtitle">پیوندهای مفید سازمان را اینجا مطالعه کنید.</p>
<div class="mz-links-grid">@php($useful=!empty($home['links'])?$home['links']:collect($ui->data('official-site')['pages'])->whereIn('id',$ui->data('official-site')['useful'])->all())@foreach(array_slice($useful,0,14) as $item)<a class="mz-link-btn" href="{{ $ui->href($item['url'] ?? $item['href'] ?? '/links',$county) }}">
<span>{{ $item['title'] }}</span>
<span class="home-link-arrow" aria-hidden="true">↖</span>
</a>@endforeach</div>
</div>
</div>
</div>
</section>
<section class="home-managers" aria-labelledby="home-managers-title" data-home-reveal="true">
<div class="container-modiran">
<div class="home-section-heading">
<div>
<h2 id="home-managers-title">مدیران و مسئولان استان</h2>
</div>
<a href="{{ $ui->href('/managers',$county) }}" class="home-text-link">مشاهدهٔ همه <span aria-hidden="true">←</span>
</a>
</div>@include('site.home-managers')</div>
</section>
<section class="home-public-relations" aria-labelledby="home-media-title" data-home-reveal="true">
<div class="container-omomi">
<div class="stdprx-container">
<div class="stdprx-header home-section-heading">
<div>
<h2 id="home-media-title">روابط عمومی استانداری</h2>
</div>
<a href="{{ $ui->href('/news',$county) }}" class="home-text-link">آرشیو اخبار <span aria-hidden="true">←</span>
</a>
</div>
<div class="stdprx-body">
<div class="stdprx-tv">
<a class="stdprx-screen" href="{{ $ui->href('/gallery',$county) }}" aria-label="گالری روابط عمومی">@if($image=$ui->image(($home['galleries'][0]['items'][0] ?? [])))<img src="{{ $image }}" alt="" loading="lazy">@endif<div class="home-media-caption">
<span>مازندران در قاب تصویر</span>
<strong>{{ $home['galleries'][0]['title'] ?? 'روایت تصویری رویدادهای استان' }}</strong>
<span class="home-media-action">مشاهدهٔ گالری ←</span>
</div>
</a>
</div>
<div class="stdprx-timeline">
<ul class="stdprx-list">@foreach(array_slice(!empty($home['events'])?$home['events']:($home['news']??[]),0,6) as $item)<li class="stdprx-item">
<time>{{ $ui->date($item['published_at'] ?? null) }}</time>
<a href="{{ $ui->article($item,$county) }}">{{ $item['title'] }}</a>
</li>@endforeach</ul>
<div class="stdprx-actions">
<a class="stdprx-btn live" href="{{ $ui->href('/news',$county) }}">اخبار</a>
<a class="stdprx-btn archive" href="{{ $ui->href('/gallery',$county) }}">آرشیو</a>
</div>
</div>
</div>
</div>
</div>
</section>
<section class="home-gallery" aria-labelledby="home-gallery-title" data-home-reveal="true">
<div class="container-galery">
<section class="gallery-section">
<div class="home-section-heading">
<div>
<h2 class="gallery-title" id="home-gallery-title">گالری تصاویر</h2>
</div>
<a href="{{ $ui->href('/gallery',$county) }}" class="home-text-link">همهٔ گالری‌ها <span aria-hidden="true">←</span>
</a>
</div>
<div class="gallery-wrapper">@foreach($home['galleries'] ?? [] as $item)<article class="gallery-card1">
<div class="card1-header">
<a class="card1-title" href="{{ $ui->href('/gallery?id='.$item['id'],$county) }}">{{ $item['title'] }}</a>
<a class="jahatha" href="{{ $ui->href('/gallery?id='.$item['id'],$county) }}">↖</a>
</div>
<a class="image-box" href="{{ $ui->href('/gallery?id='.$item['id'],$county) }}">@if($image=$ui->image($item['items'][0] ?? []))<img src="{{ $image }}" alt="" loading="lazy">@endif<p class="caption">مشاهدهٔ گالری ←</p>
</a>
</article>@endforeach</div>
</section>
</div>
</section>
</div>
</div>