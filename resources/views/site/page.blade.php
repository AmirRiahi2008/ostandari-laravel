@extends('layouts.base')
@push('styles')<link rel="stylesheet" href="/styles/home-page.css">@endpush
@section('body')
<div x-data="portalPage" data-design="{{ $page['scope'] }}" data-preview="false" data-section="site" data-path="{{ request()->getPathInfo() }}" class="min-h-screen w-full font-vazirmatn">
    <div class="container-asli source-portal" data-county-portal="{{ $county['slug'] ?? '' }}">
        @include('partials.header')
        <main id="main-content" class="source-main {{ $view==='home' ? 'source-home' : 'source-content' }}">
            @if($view!=='home')<nav class="source-breadcrumb" aria-label="مسیر صفحه"><a href="{{ $ui->href('/',$county) }}">صفحه اصلی</a><span aria-hidden="true">/</span><h1>{{ $title }}</h1></nav>@endif
            @include('site.'.$view)
        </main>
    </div>
    @include('partials.footer')
</div>
@endsection
