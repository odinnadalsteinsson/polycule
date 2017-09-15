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
        @include('favicons')
    </head>
    <body>
      @include('gtm.body')
      <div id="app">
        <v-app>
          <main>
            <v-container>
              @if (session('status'))
                <v-chip>{{ session('status') }}</v-chip>
              @endif
              @yield('content')
            </v-container>
          </main>
        </v-app>
      </div>
      <script src="{{ mix('js/app.js') }}"></script>
  </body>
</html>
