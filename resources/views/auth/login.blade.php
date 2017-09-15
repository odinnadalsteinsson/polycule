@extends('layouts.app')

@section('content')
<v-layout column>
  <v-flex xs12 sm6 offset-sm3>
    <v-card hover>
      <v-card-media class="white--text" height="300px" src="http://lorempixel.com/400/300/cats/">
        <v-container fill-height fluid>
          <v-layout fill-height>
            <v-flex xs12 align-end flexbox>
              <span class="headline">Polycule</span>
            </v-flex>
          </v-layout>
        </v-container>
      </v-card-media>
      <v-card-title>
        <div>Velkommen til polycule. En ny måde at date på. Designet og udviklet for polyamourøse.</div>
        <v-flex fluid>
          <login>
            {{ csrf_field() }}
          </login>
        </v-flex>
      </v-card-title>
    </v-card>
  </v-flex>
</v-layout>
@endsection
