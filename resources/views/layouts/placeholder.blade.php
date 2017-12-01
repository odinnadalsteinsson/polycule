@extends('layouts.app')

@section('content')
<v-app dark>
  <v-parallax height="800px" src="/images/love-images-1-1500x938.jpg" jumbotron>
    <v-content>
      <v-toolbar dark color="red darken-4">
        <v-toolbar-title class="white--text"><img height="16" src="/images/polydating_logo_top-1.png"> {{ env('APP_NAME') }}</v-toolbar-title>
        <v-spacer></v-spacer>
        <v-icon>fa-heart-o</v-icon>
        <v-icon>fa-heart</v-icon>
        <v-icon>fa-heart-o</v-icon>
      </v-toolbar>
      <v-container fluid fill-height>
          <v-layout column align-center justify-center>
            <v-flex xs12><br>
              <p><strong>Velkommen til Polydating!</strong></p>
              <p>Snart åbner nordens første datingside dedikeret til mennsker, der ønsker alternative, åbne eller polyamorøse forhold.</p>
              <p>Vi har nu {{ Newsletter::getMembers()['total_items'] }} tilmeldte på mailinglisten! :-)</p>
              <p>Tilmeld også dig selv på mailinglisten og få besked så snart sitet åbner.</p>
              <p>mvh. Odinn</p>
              <v-icon>fa-heart-o</v-icon>
              <v-icon>fa-thumbs-o-up</v-icon>
            </v-flex>
          </v-layout>
      </v-container>
    </v-content>
  </v-parallax>
  <v-footer color="red darken-4" app>
    <span class="white--text">&copy; 2017 polydating.dk</span>
  </v-footer>
</v-app>
@endsection
