<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta name="csrf-token" content="{{ csrf_token() }}">
<!--<link rel="icon" href="{{ asset('favicon.ico') }}" type="image/x-icon" />-->

<title>
    {{ ucfirst(config('app.name')) }} - {{ $pageTitle ?? 'Leading Learning Platform' }}
</title>

<link href="{{ asset('plugins/fontawesome/css/all.min.css') }}" rel="stylesheet"/>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" integrity="sha384-4LISF5TTJX/fLmGSxO53rV4miRxdg84mZsxmO8Rx5jGtp/LbrixFETvWa5a6sESd" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fontsource/source-sans-3@5.0.12/index.css" integrity="sha256-tXJfXfp6Ewt1ilPzLDtQnJV4hclT9XuaZUKyUvmyr+Q=" crossorigin="anonymous">

<link rel="stylesheet" href="{{ asset("plugins/toastr/toastr.min.css") }}">
<link href="{{ asset('plugins/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" >
<link href="{{ asset('css/adminlte.min.css') }}" rel="stylesheet" />
<link href="{{ asset('plugins/video-js/video-js.min.css') }}" rel="stylesheet" />
