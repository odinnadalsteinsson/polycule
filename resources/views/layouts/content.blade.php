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
      <script>
        window.Laravel = <?php echo json_encode([
          'csrfToken' => csrf_token(),
        ]); ?>
      </script>
      <script type="text/javascript" src="//downloads.mailchimp.com/js/signup-forms/popup/embed.js" data-dojo-config="usePlainJson: true, isDebug: false"></script><script type="text/javascript">require(["mojo/signup-forms/Loader"], function(L) { L.start({"baseUrl":"mc.us17.list-manage.com","uuid":"8635f821a25194ed405489111","lid":"92f595453a"}) })</script>
      <link rel="stylesheet" type="text/css" href="//cdnjs.cloudflare.com/ajax/libs/cookieconsent2/3.0.3/cookieconsent.min.css" />
      <script src="//cdnjs.cloudflare.com/ajax/libs/cookieconsent2/3.0.3/cookieconsent.min.js"></script>
      <script>
      window.addEventListener("load", function(){
      window.cookieconsent.initialise({
        "palette": {
          "popup": {
            "background": "#000"
          },
          "button": {
            "background": "#f1d600"
          }
        },
        "theme": "edgeless",
        "content": {
          "message": "Vi bruger cookies her, for at sikre den bedst mulige oplevelse",
          "dismiss": "Okay!",
          "link": "Læs mere"
        }
      })});
      </script>
  </head>
  <body>
    @include('gtm.body')
    <div id="app">
      <v-app>
        <v-parallax height="800px" src="/images/love-images-1-1500x938.jpg" {{ $jumbotron ? 'jumbotron' : '' }}>
          <v-content>
            <v-toolbar color="red darken-4" class="white--text">
              <v-toolbar-title class="white--text">{{ env('APP_NAME') }}</v-toolbar-title>
              <v-spacer></v-spacer>
              <img height="30" src="/images/polydating_logo_top-1.png">&nbsp;
              <img height="30" src="/images/polydating_logo_top-1.png">&nbsp;
              <img height="30" src="/images/polydating_logo_top-1.png">&nbsp;
              @if (Auth::guest())
                <a href="/login"><v-chip>Log ind</v-chip></a>
              @endif
            </v-toolbar>
            <v-container fluid fill-height>
              @yield('content')
            </v-container>
          </v-content>
        </v-parallax>
        <v-footer color="red darken-4" app>
          <span class="white--text">Copyright &copy; 2017 polydating.dk</span>
        </v-footer>
      </v-app>
    </div>
    <script src="{{ mix('js/app.js') }}"></script>
  </body>
</html>
