<title>{{ config('app.name', 'Laravel')  }} {{ isset($meta->title) ? ' - ' . $meta->title : ''}}</title>
{{--<title>{{ config('app.name', 'Laravel') . isset($meta->title) ? ' - ' . $meta->title : ''}}</title>--}}
<meta name="description" content="{{ isset($meta->seo_description) ? $meta->seo_description : $seo_description ?? '' }}">
<meta property="og:site_name" content="{{ config('app.name', 'Laravel') }}">
<meta data-hid="charset" charset="utf-8">
<meta data-hid="mobile-web-app-capable" name="mobile-web-app-capable" content="yes">
<meta data-hid="apple-mobile-web-app-title" name="apple-mobile-web-app-title" content="{{ config('app.name', 'Laravel') }}">

@if($meta->hasImage('seo_cover','seo'))
<link rel="apple-touch-icon" sizes="180x180" href="{{ $meta->image('seo_cover','seo',['w' => 180, 'h' => 180]) }}">
<meta property="og:image" content="{{ $meta->image('seo_cover','seo',['w' => 1280, 'h' => 1280]) }}" />
@endif
{{--<link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">--}}
{{--<link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">--}}

<meta data-hid="og:type" property="og:type" content="{{ isset($meta->title) ? 'art' : 'website' }}">

<meta property="og:url" content="{{url()->current()}}"/>
<meta property="og:title" content="{{ isset($meta->title) ? $meta->title : config('app.name', 'Laravel') }}"/>
<meta property="og:description" content="{{ isset($meta->seo_description) ? $meta->seo_description : $site_description ?? '' }}"/>

<meta name="twitter:title" content="{{ config('app.name', 'Laravel')  }} {{ isset($meta->title) ? ' - ' . $meta->title : ''}}">
<meta name="twitter:description" content="{{ isset($meta->seo_description) ? $meta->seo_description : $site_description ?? '' }}">

@if(isset($meta->seo_keywords))
    <meta name="keywords" content="@if($site_keywords){{ $site_keywords }},@endif @if($meta->seo_keywords) {{ str_replace(';',', ',$meta->seo_keywords) }} @endif">
@endif
