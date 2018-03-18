@extends('layouts.content')

@section('content')
<v-layout row wrap>
  <v-flex xs12 sm6 md4>
    <v-card hover>
      <v-card-media class="white--text" src="{{ $user->getPhoto(400) }}" height="400px">
        <v-container fill-height fluid>
          <v-layout fill-height>
            <v-flex xs12 align-end flexbox>
              <span class="headline">{{ $user->name ? $user->name : 'Medlem #' . $user->id }} {{ $user->age() ? $user->age() . ' år' : '' }}</span>
            </v-flex>
          </v-layout>
        </v-container>
      </v-card-media>
      <v-card-title>
        <div>{!! nl2br($user->about) ?: 'Mangler beskrivelse' !!}</div>
      </v-card-title>
      <v-card-actions>
        @forelse ($user->genders() as $gender)
          <v-chip class="primary primary--text" outline>{{ $gender->name }}</v-chip>
        @empty
          <v-chip class="primary primary--text" outline>Køn ikke angivet</v-chip>
        @endforelse
        @forelse ($user->relationshipStatuses() as $status)
          <v-chip class="red red--text" outline>{{ $status->name }}</v-chip>
        @empty
          <v-chip class="red red--text" outline>Forholdsstatus ikke angivet</v-chip>
        @endforelse
        @if (Auth::user()->id == $user->id || Auth::user()->isAn('admin'))
          <v-spacer></v-spacer>
          <v-btn href="/users/{{ $user->id}}/edit">Ret profil</v-btn>
        @endif
      </v-card-actions>
    </v-card>
  </v-flex>
  {{-- <v-flex d-flex xs12 sm6 md3>
    <v-layout row wrap>
      <v-flex d-flex>
        <v-card color="indigo" dark>
          <v-card-title primary-title>
            <div>
              <h3 class="headline mb-0">{{ $user->name }}</h3>
              <div>{{ $user->about }}</div>
            </div>
          </v-card-title>
          <v-chip color="primary" text-color="white">Primary</v-chip>
          <v-chip color="secondary" text-color="white">Secondary</v-chip>
          <v-chip color="red" text-color="white">Colored Chip</v-chip>
          <v-chip color="green" text-color="white">Colored Chip</v-chip>
          <v-card-text></v-card-text>
        </v-card>
      </v-flex>
      <v-flex d-flex>
        <v-layout row wrap>
          <v-flex d-flex v-for="n in 2" :key="n" xs12>
            <v-card color="red lighten-2" dark>
            <v-card-text>hest</v-card-text>
            </v-card>
          </v-flex>
        </v-layout>
      </v-flex>
    </v-layout>
  </v-flex>
  <v-flex d-flex xs12 sm6 md2 child-flex>
    <v-card color="green lighten-2" dark>
      <v-card-text>
        hest
      </v-card-text>
    </v-card>
  </v-flex>
  <v-flex d-flex xs12 sm6 md3>
    <v-card color="blue lighten-2" dark>
      <v-card-text>
        <chips></chips>
        hest
      </v-card-text>
    </v-card>
  </v-flex> --}}
</v-layout>
@endsection
