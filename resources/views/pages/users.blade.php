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
              <img src="{{ $user->getPhoto('40') }}" height="40px"/>
            </v-list-tile-avatar>
            <v-list-tile-content>
              <v-list-tile-title><a href="/users/{{ $user->id}}">{{ $user->name ?: 'Medlem #' . $user->id }}</a>
                @if (Auth::user()->isAn('admin'))
                  ({{ $user->email }})
                @endif
              </v-list-tile-title>
            </v-list-tile-content>
          </v-list-tile>
        @endforeach
        <v-card-text>
          <center>{{ $users->links('molecules.pagination') }}</center>
        </v-card-text>
      </v-list>
    </v-card>
  </v-flex>
</v-layout>
@endsection
