@extends('layouts.base')
@push('styles')<link rel="stylesheet" href="/styles/home-page.css">@endpush
@section('body')
<div x-data="portalPage" data-design="{{ $page['scope'] }}" data-preview="false" data-section="site" data-path="{{ request()->getPathInfo() }}" class="min-h-screen w-full font-vazirmatn">
    <div class="container-asli source-portal" data-county-portal="{{ $county['slug'] ?? '' }}">
        @include('partials.header')
        <main id="main-content" class="source-main {{ $view==='home' ? 'source-home' : 'source-content' }}">
            @if($view!=='home' && !$county)
                <nav class="source-breadcrumb" aria-label="مسیر صفحه"><a href="/">صفحه اصلی</a><span aria-hidden="true">/</span>@if($view==='article')<span aria-current="page">{{ ['news'=>'اخبار','announcement'=>'اطلاعیه‌ها','resolution'=>'مصوبات','duty'=>'شرح وظایف واحدها','event'=>'رویدادها'][$content['type'] ?? 'news'] ?? 'مطالب' }}</span>@elseif($view==='service-agreement')<span aria-current="page">{{ $section['title'] ?? $title }}</span>@else<h1>{{ $title }}</h1>@endif</nav>
            @endif
            @include('site.'.$view)
        </main>
    </div>
    @include('partials.footer')
</div>
@endsection
