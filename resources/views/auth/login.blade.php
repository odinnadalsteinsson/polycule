@extends('layouts.content')

@section('content')
<v-layout column>
  <v-flex xs12 sm6 offset-sm3>
    <v-card>
      <v-card-title>
        <v-flex fluid>
          <h1>Log ind på polydating her</h1>
          <login>
            {{ csrf_field() }}
          </login>
        </v-flex>
      </v-card-title>
    </v-card>
  </v-flex>
</v-layout>
@endsection
