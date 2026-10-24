<section class="portal-useful-panel" aria-labelledby="useful-links-title">
    <header><h2 id="useful-links-title">پیوندهای مفید</h2><a href="{{ $ui->href('/links',$county) }}">همهٔ پیوندها ←</a></header>
    <div class="portal-useful-grid">@foreach(array_slice($ui->usefulLinks($home['links'] ?? []),0,14) as $link)<a class="portal-useful-link" href="{{ $ui->href($link['url'] ?? $link['href'] ?? '/links',$county) }}">@include('partials.link-symbol')<span>{{ $link['title'] }}</span><span aria-hidden="true">↖</span></a>@endforeach</div>
</section>
