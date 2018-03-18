@extends('layouts.content')

@section('content')
<v-layout column align-center justify-center>
  <v-flex xs12 sm6>
    <v-card hover>
      <v-card-title>
        <v-flex fluid>
          <h1>Opret din gratis {{ env('APP_NAME') }} profil nu</h1>
          <register>
            {{ csrf_field() }}
          </register>
        </v-flex>
      </v-card-title>
    </v-card>
  </v-flex>
</v-layout>
@endsection
