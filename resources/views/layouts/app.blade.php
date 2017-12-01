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
          "message": "Dette website bruger cookies for at sikre den bedst mulige oplevelse",
          "dismiss": "Okay!",
          "link": "Læs mere"
        }
      })});
      </script>
  </head>
  <body>
    @include('gtm.body')
    <div id="app">
      @yield('content')
    </div>
    <script src="{{ mix('js/app.js') }}"></script>
  </body>
</html>
