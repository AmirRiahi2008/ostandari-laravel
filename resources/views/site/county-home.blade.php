@php
    $record=$organization['county'] ?? [];
    $governor=$home['governor'] ?? [];
    $photo=$ui->image($governor['image'] ?? null);
    $people=collect($home['members']??[])->except('county_governor')->flatten(1)->all();
    $about=$path==='/about';
@endphp
<div class="source-office portal-county-office portal-county-home" data-county-office="{{ $county['slug'] }}" data-office-view="{{ $about?'about':'home' }}">
    @if(!$about)
        <h1 class="portal-visually-hidden">فرمانداری شهرستان {{ $county['name'] }}</h1>
        <div class="portal-county-intro {{ !empty($governor['name'])?'with-governor':'' }}">
            <div class="county-home-slideshow">@include('site.slider')</div>
            @if(!empty($governor['name']))<aside class="portal-office-governor" aria-label="فرماندار {{ $county['name'] }}"><div class="portal-office-portrait"><img src="{{ $photo ?? '/design/site/assets/image/logo.png' }}" alt="{{ $governor['name'] }}" width="144" height="168"></div><h2>{{ $governor['name'] }}</h2><p>فرماندار شهرستان {{ $county['name'] }}</p><div class="portal-office-actions"><a class="portal-office-button" href="{{ $ui->href('/contact?type=normal',$county) }}">ارتباط با فرماندار</a><a class="portal-office-button is-outline" href="{{ $ui->href('/about',$county) }}">معرفی شهرستان</a></div></aside>@endif
        </div>
    @endif
    @if($aerial=$ui->image($organization['aerial'] ?? null))<figure class="county-aerial-panel"><img src="{{ $aerial }}" alt="تصویر هوایی شهرستان {{ $county['name'] }}" loading="lazy"><figcaption>تصویر هوایی شهرستان {{ $county['name'] }}</figcaption></figure>@endif
    <div class="portal-office-content-grid"><div class="portal-office-main-column">
        <section class="portal-office-panel {{ $about?'portal-office-about':'portal-office-news' }}"><header class="portal-office-panel-head"><h2>{{ $about?'دربارهٔ شهرستان '.$county['name']:'اخبار و اطلاعیه‌ها' }}</h2>@if(!$about)<a href="{{ $ui->href('/news',$county) }}">مشاهده همه ←</a>@endif</header><div class="portal-office-panel-body">
            @if($about)<div class="portal-rich-text">{!! \App\Services\Html::clean($record['body'] ?? $record['description'] ?? '<p>معرفی شهرستان هنوز در پرتال ثبت نشده است.</p>') !!}</div>
            @else
                <div class="cb2-center" x-data="{tab:0}"><div class="news-top"><div class="news-tabs2"><div class="news-tab-slider" :style="{transform:'translateX('+(tab===0?0:-100)+'%)'}"></div>@foreach(['اخبار','اطلاعیه‌ها'] as $i=>$label)<button type="button" class="news-tab-btn" :class="{'active':tab==={{ $i }}}" :aria-pressed="tab==={{ $i }}" @click="tab={{ $i }}">{{ $label }}</button>@endforeach</div><span class="news-count-pill">فرمانداری {{ $county['name'] }}</span></div>
                @foreach(['news','announcements'] as $i=>$kind)<div class="news-list2 portal-county-card-grid" aria-live="polite" x-show="tab==={{ $i }}" @if($i>0) x-cloak @endif>@forelse($home[$kind]??[] as $item)@include('site.news-card')@empty<p class="source-empty">مطلبی برای فرمانداری {{ $county['name'] }} در این بخش منتشر نشده است.</p>@endforelse</div>@endforeach</div>
            @endif
        </div></section>
        <section class="portal-office-panel"><header class="portal-office-panel-head"><h2>گالری تصاویر</h2><a href="{{ $ui->href('/gallery',$county) }}">مشاهده همه ←</a></header><div class="portal-office-panel-body"><div class="portal-office-gallery">@forelse($home['galleries']??[] as $album)<a href="{{ $ui->href('/gallery?id='.$album['id'],$county) }}"><div class="portal-office-gallery-image">@if($image=$ui->image($album['cover'] ?? $album['items'][0]['image'] ?? null))<img src="{{ $image }}" alt="" width="420" height="270" loading="lazy">@endif</div><h3>{{ $album['title'] }}</h3></a>@empty<p class="source-empty">تصویری برای فرمانداری {{ $county['name'] }} منتشر نشده است.</p>@endforelse</div></div></section>
    </div><aside class="portal-office-sidebar" aria-label="اطلاعات و خدمات فرمانداری {{ $county['name'] }}">
        <section class="portal-office-panel"><header class="portal-office-panel-head"><h2>مدیران شهرستان {{ $county['name'] }}</h2></header><div class="portal-office-panel-body">@include('site.members',['items'=>$people])</div></section>
        <section class="portal-office-panel"><header class="portal-office-panel-head"><h2>دسترسی سریع</h2></header><div class="portal-office-panel-body portal-office-shortcuts"><a href="{{ $ui->href('/services',$county) }}">میز خدمت الکترونیکی ←</a><a href="{{ $ui->href('/contact',$county) }}">ارتباط با فرمانداری ←</a><a href="/citizen">پیگیری درخواست‌ها ←</a></div></section>
        <section class="portal-office-panel portal-office-newsletter"><header class="portal-office-panel-head"><h2>عضویت در خبرنامه</h2></header><div class="portal-office-panel-body"><p>از طریق ایمیل از آخرین اخبار و اطلاعیه‌ها مطلع شوید.</p><form class="portal-form" x-data="apiForm('newsletter/subscribe')" @submit.prevent="submit($event)"><label>ایمیل<input type="email" name="email" required dir="ltr"></label><button class="portal-office-button" :disabled="busy">عضویت در خبرنامه</button><p role="status" x-text="message"></p><p role="alert" x-text="error"></p></form></div></section>
        @if(!empty($home['links']))<section class="portal-office-panel"><header class="portal-office-panel-head"><h2>پیوندهای مرتبط</h2></header><div class="portal-office-panel-body"><ul class="portal-office-links">@foreach($home['links'] as $link)<li><a href="{{ $ui->href($link['url'],$county) }}">{{ $link['title'] }}</a></li>@endforeach</ul></div></section>@endif
    </aside></div>
    @if(!$about)@include('site.events-home')@endif
    <section class="portal-office-locator" aria-label="{{ $county['name'] }} در یک نگاه"><div class="portal-office-location-copy"><span class="portal-office-eyebrow">استان مازندران</span><h2>{{ $county['name'] }} <span>در یک نگاه</span></h2><p>{{ $ui->text($record['description'] ?? '') }}</p><a class="portal-office-button" href="{{ $ui->href('/about',$county) }}">دربارهٔ شهرستان {{ $county['name'] }} ←</a></div><div class="portal-office-location-map"><svg viewBox="0 -20 650 315" role="img" aria-label="موقعیت شهرستان {{ $county['name'] }} در استان مازندران">@foreach($ui->data('frontend')['counties'] as $region)<path d="{{ $region['shape'] }}" fill="{{ $region['slug']===$county['slug']?'#00477a':'#e5edf5' }}" stroke="#a9bed0" stroke-width="0.8" vector-effect="non-scaling-stroke"/>@endforeach<text x="{{ $county['label'][0] }}" y="{{ $county['label'][1] }}" fill="#003e68" stroke="#fff" stroke-width="4" paint-order="stroke" font-size="15" font-weight="800" text-anchor="middle" direction="rtl">{{ $county['name'] }}</text></svg><p>موقعیت شهرستان {{ $county['name'] }}</p></div></section>
</div>
