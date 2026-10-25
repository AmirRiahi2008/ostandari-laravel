<div class="portal-article-layout portal-article-page">
    <article class="portal-content-article portal-service-agreement" aria-labelledby="service-agreement-title" data-service-agreement="{{ $agreementKey }}">
        <header class="portal-article-heading"><h1 id="service-agreement-title">{{ $content['title'] }}</h1></header>
        <div class="portal-article-body portal-rich-text">{!! \App\Services\Html::articleBody($content['body'] ?? '') !!}</div>
    </article>
</div>
