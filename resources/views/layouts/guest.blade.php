<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        @include('partials.head')
        <link rel="stylesheet" href="{{ asset("plugins/OverlayScrollbars/overlayscrollbars.min.css") }}">
        @stack('pluginCss')
        <link href="{{ asset('css/styles-app.css') }}" rel="stylesheet">
        @stack('css')
    </head>
    <body class="login-page bg-body-secondary">
        <div class="guest-box">
            @include('partials.alert')
            
            <div class="card card-outline card-primary">
                <div class="card-header"> 
                    <a href="{{ url('/') }}" class="text-deco-none link-dark text-center link-offset-2 link-opacity-100 link-opacity-50-hover">
                        <h3 class="mb-0">{{ config('app.name') }}</h3>
                    </a> 
                </div>
                {{ $slot }}
            </div>
        </div>
        
        @include('partials.footer')

        @stack('pluginScripts')

        <script src="{{ asset('js/main-app.js') }}"></script>

        @stack('scripts')
    </body>
</html>