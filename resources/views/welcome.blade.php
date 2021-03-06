@extends('layouts.content')

@section('content')
<v-layout column align-center justify-center>
  <v-flex xs12 class="white--text"><br>
    <p><strong>Velkommen til {{ env('APP_NAME') }}!</strong></p>
    <p>Snart åbner nordens første datingside dedikeret til mennesker, der ønsker alternative, åbne eller polyamorøse forhold.</p>
    <p>Vi har nu {{ Newsletter::getMembers()['total_items'] }} tilmeldte på mailinglisten! :-)</p>
    <p>Tilmeld også dig selv på mailinglisten og få besked så snart sitet åbner.</p>
    <p>mvh. Odinn</p>
    <v-icon dark>fa-heart-o</v-icon>
    <v-icon dark>fa-thumbs-o-up</v-icon>
  </v-flex>
</v-layout>
@endsection
