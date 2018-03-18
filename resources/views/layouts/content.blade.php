<!doctype html>
<html lang="{{ app()->getLocale() }}">
  <head>
      @include('gtm.head')
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, minimal-ui">
      <meta name="csrf-token" content="{{ csrf_token() }}">
      <title>{{ env('APP_NAME') }}</title>
      <link href="{{ mix('css/app.css') }}" rel="stylesheet">
      @include('utils.cookie-consent')
      @include('utils.csrf-token')
      @include('utils.mailchimp')
      @include('utils.facebook')
      @include('utils.favicons')
      @stack('head')
  </head>
  <body>
    @include('gtm.body')
    <div id="app">
      <v-app style="background-image: url({{ "/images/" . env('BACKGROUND_PICTURE') }}); background-size: cover">
        <v-content>
          @include('organisms.navigation')
          <v-container fluid fill-height grid-list-sm>
            @yield('content')
          </v-container>
        </v-content>
        @include('organisms.footer')
      </v-app>
    </div>
    <script src="{{ mix('js/app.js') }}"></script>
  </body>
</html>
