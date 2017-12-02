@extends('layouts.content')

@section('content')
<v-layout row>
  <v-flex xs12 sm6 offset-sm3>
    <v-card>
      <v-toolbar color="red darken-4" dark>
        <v-toolbar-title class="text-xs-center">Medlemmer</v-toolbar-title>
      </v-toolbar>
      <v-list>
        @foreach ($users as $user)
          <v-list-tile avatar>
            <v-list-tile-avatar>
              <img src="{{ $user->hasPhoto() ? $user->getPhoto('40x40') : Gravatar::src($user->email) }}"/>
            </v-list-tile-avatar>
            <v-list-tile-content>
              <v-list-tile-title>{{ empty($user->name) ? '(navn mangler)' : $user->name }}</v-list-tile-title>
            </v-list-tile-content>
          </v-list-tile>
        @endforeach
      </v-list>
    </v-card>
  </v-flex>
</v-layout>
@endsection
