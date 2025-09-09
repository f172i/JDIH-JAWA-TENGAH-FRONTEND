@php
    $segment_1 = Request::segment(1);
    $segment_2 = Request::segment(2);
    $url = $segment_1 . '/' . $segment_2;
@endphp
@if ($url == 'inventarisasi-hukum/detail')
@else
    <title>{{ env('APP_NAME') }}</title>
    <meta name="description" content="" />
    <meta name="keywords" content="" />
@endif
<meta charset="utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

<meta property="og:title" content="{{ env('APP_NAME') }}" />
<meta property="og:url" content="{{ url()->current() }}" />
<meta property="og:description"
    content="JDIH Jawa Tengah adalah website resmi pemerintah Jawa Tengah yang menyediakan informasi terkini dan terverifikasi mengenai peraturan daerah serta dokumen hukum yang berlaku. JDIH ini sangat membantu bagi masyarakat, pebisnis, dan pemerintah dalam memastikan bahwa mereka memahami dan mengikuti peraturan hukum yang berlaku.">

<meta name="robots" content="index, follow">
<meta name="author" content="Biro Hukum Provinsi Jawa Tengah">
<meta name="copyright" content="Biro Hukum Provinsi Jawa Tengah" />
<meta name="rating" content="general" />
<meta name="robots" content="index, follow" />
<meta name="googlebot" content="index, follow" />
<meta name="msnbot" content="index, follow" />
<meta name="yahoobot" content="index, follow" />
<meta name="bingbot" content="index, follow" />

<!-- S:fb meta -->
<meta property="og:type" content="article" />
<meta property="og:site_name" content="{{ url()->current() }}" />
<!-- e:fb meta -->

<!-- S:tweeter card -->
<meta name="twitter:card" content="summary_large_image" />


<meta name="twitter:title" content="{{ env('APP_NAME') }}" />
<meta name="twitter:description"
    content="JDIH Jawa Tengah adalah website resmi pemerintah Jawa Tengah yang menyediakan informasi terkini dan terverifikasi mengenai peraturan daerah serta dokumen hukum yang berlaku. JDIH ini sangat membantu bagi masyarakat, pebisnis, dan pemerintah dalam memastikan bahwa mereka memahami dan mengikuti peraturan hukum yang berlaku." />

<meta property="og:image" content="{{ asset('media/logo.png') }}">
<meta name="twitter:image" content="{{ asset('media/logo.png') }}" />
<meta property="og:image" content="{{ asset('media/logo.png') }}" />
<meta name="description"
    content="JDIH Jawa Tengah adalah website resmi pemerintah Jawa Tengah yang menyediakan informasi terkini dan terverifikasi mengenai peraturan daerah serta dokumen hukum yang berlaku. JDIH ini sangat membantu bagi masyarakat, pebisnis, dan pemerintah dalam memastikan bahwa mereka memahami dan mengikuti peraturan hukum yang berlaku.">
<meta name="keywords" content="jdih jawa tengah, jdih jateng, bantuan hukum jateng, ranham jateng">


<!-- <link rel="canonical" href="https://preview.keenthemes.com/metronic8" /> -->
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Inter:300,400,500,600,700" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
<link rel="stylesheet" href="{{ asset('css/style.bundle.css') }}">
<link rel="stylesheet" href="{{ asset('plugins/global/plugins.bundle.css') }}">
<link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}" />
<link rel="stylesheet" href="{{ asset('css/lineicons.css') }}" />
<link rel="stylesheet" href="{{ asset('css/tiny-slider.css') }}" />
<link rel="stylesheet" href="{{ asset('css/glightbox.min.css') }}" />
<link rel="stylesheet" href="{{ asset('css/style.css') }}" />
<link rel="stylesheet" href="{{ asset('css/navbars.style.css') }}" />
<link rel="stylesheet" href="{{ asset('css/form.style.css') }}" />
<link rel="stylesheet" href="{{ asset('css/owl.carousel.min.css') }}">
<link rel="stylesheet" href="{{ asset('css/slider.style.css') }}">
<link rel="stylesheet" href="{{ asset('css/owl.theme.default.min.css') }}">
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap5.min.css">
<link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css" />

<script>
    (function(w, d, s, l, i) {
        w[l] = w[l] || [];
        w[l].push({
            'gtm.start': new Date().getTime(),
            event: 'gtm.js'
        });
        var f = d.getElementsByTagName(s)[0],
            j = d.createElement(s),
            dl = l != 'dataLayer' ? '&amp;l=' + l : '';
        j.async = true;
        j.src = 'https://www.googletagmanager.com/gtm.js?id=' + i + dl;
        f.parentNode.insertBefore(j, f);
    })(window, document, 'script', 'dataLayer', 'GTM-5FS8GGP');
</script>
<!--End::Google Tag Manager -->
