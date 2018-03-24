<v-toolbar color="red darken-4" class="white--text">
  <v-toolbar-title class="white--text">
    <a style="color: inherit; text-decoration: inherit;" href="/">{{ env('APP_NAME') }}</a>
    {{-- {{ Request::ip() }} --}}
  </v-toolbar-title>
  <v-spacer></v-spacer>
  <img height="30" src="/images/polydating_logo_top-1.png">&nbsp;
  <img height="30" src="/images/polydating_logo_top-1.png">&nbsp;
  <img height="30" src="/images/polydating_logo_top-1.png">&nbsp;
  @if (Request::ip() == env('ADMIN_IP') || strpos(Request::ip(), '172.') !== false || Auth::user()->id == 1)
    @if (Auth::guest())
      <v-btn href="/login">Log ind</v-btn>
    @else
      <v-btn href="/users">Medlemmer</v-btn>
      <logout>{{ csrf_field() }}</logout>
    @endif
  @endif
</v-toolbar>
