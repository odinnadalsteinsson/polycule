@extends('layouts.content')

@section('content')
<v-layout column align-center justify-center>
  <v-flex xs12 sm6>
    <v-card hover>
      <v-card-title>
        <v-flex fluid>
          <h1>Log ind på {{ env('APP_NAME') }} her</h1>
          <login>
            {{ csrf_field() }}
          </login>
        </v-flex>
      </v-card-title>
    </v-card>
  </v-flex>
</v-layout>
@endsection
