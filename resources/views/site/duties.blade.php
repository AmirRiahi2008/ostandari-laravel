<div class="portal-duties-directory">
@forelse(collect($items)->groupBy(fn($item)=>($item['duty_group'] ?? null) ?: 'سایر واحدها') as $group=>$units)
    <section class="portal-duty-group"><header><h2>{{ $group }}</h2><span>{{ $units->count() }} واحد</span></header>
        <div class="portal-duties-grid">@foreach($units as $item)<article class="portal-duty-item"><span class="portal-duty-symbol" aria-hidden="true">@include('icons.document')</span><h3><a href="{{ $ui->article($item,$county) }}">{{ $item['title'] }}</a></h3>@if(!empty($item['excerpt']))<p>{{ $ui->text($item['excerpt']) }}</p>@endif<a class="portal-duty-read" href="{{ $ui->article($item,$county) }}">مشاهدهٔ شرح وظایف <span aria-hidden="true">←</span></a></article>@endforeach</div>
    </section>
@empty
    <p class="portal-feed-empty">شرح وظایفی منتشر نشده است.</p>
@endforelse
</div>
@if($meta && $meta['last_page']>1)<nav class="portal-pagination" aria-label="صفحه‌های شرح وظایف">@for($number=max(1,$meta['current_page']-3);$number<=min($meta['last_page'],$meta['current_page']+3);$number++)<a href="{{ request()->fullUrlWithQuery(['page'=>$number]) }}" @if($number===$meta['current_page'])aria-current="page"@endif>{{ $number }}</a>@endfor</nav>@endif
