@include('site.county-map')
<div class="source-directory">@foreach($ui->data('frontend')['counties'] as $entry)<a class="source-directory-card" href="/{{ $entry['slug'] }}">فرمانداری شهرستان {{ $entry['name'] }} ←</a>@endforeach</div>
