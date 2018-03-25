@extends('layouts.content')

@section('content')
<v-layout row wrap>
  <v-flex xs12 sm6 md4>
    <v-card hover>
      <v-card-media class="white--text" src="{{ $user->getPhoto(400) }}" height="400px">
        <v-container fill-height fluid>
          <v-layout fill-height>
            <v-flex xs12 align-end flexbox>
              <span class="headline">{{ $first ? $first : 'Medlem #' . $user->id }} {{ $user->age() ? $user->age() . ' år' : '' }}</span>
            </v-flex>
          </v-layout>
        </v-container>
      </v-card-media>
      <vue-dropzone style="border: 0px" :options="dropzoneOptions" id="myVueDropzone" url="/media/{{ $user->id}}" v-on:vdropzone-success="showSuccess" :max-file-size-in-m-b="100">
        {{ csrf_field() }}
      </vue-dropzone>
      {{-- <dropzone style="border: 0px" id="myVueDropzone" url="/media/{{ $user->id}}" v-on:vdropzone-success="showSuccess" :max-file-size-in-m-b="100">
      </dropzone> --}}
    </v-card>
  </v-flex>

  <v-flex xs12 sm6 md4>
    <v-card hover>
      <v-card-text>
        <h1>Profil</h1>
        <about id={{ $user->id }} text="{{ $user->about }}"></about>
      </v-card-text>
    </v-card>
  </v-flex>

  <v-flex xs12 sm6 md4>
    <v-card>
      <v-card-text>
        <h2>Etiketter (demo data)</h2>
        <div class="input-group input-group--focused input-group--dirty input-group--text-field input-group--select input-group--autocomplete input-group--chips primary--text">
          <p>
            <label>Personlige data</label>
            @forelse ($user->genders() as $gender)
              <v-chip close class="primary primary--text" outline>{{ $gender->name }}</v-chip>
            @empty
              <v-chip class="primary primary--text" outline>Køn ikke angivet</v-chip>
            @endforelse
            @foreach ($data['body'] as $body)
              <v-chip close  class="primary primary--text" outline>{{ $body }}</v-chip>
            @endforeach
          </p>
        </div>
        <div class="input-group input-group--focused input-group--dirty input-group--text-field input-group--select input-group--autocomplete input-group--chips primary--text">
          <p>
            <label class="red--text">Seksualitet og forhold</label>
            @foreach ($data['sexuality'] as $sexuality)
              <v-chip close class="red red--text" outline>{{ $sexuality }}</v-chip>
            @endforeach
            @forelse ($user->relationshipStatuses() as $status)
              <v-chip close class="red red--text" outline>{{ $status->name }}</v-chip>
            @empty
              <v-chip class="red red--text" outline>Forholdsstatus ikke angivet</v-chip>
            @endforelse
          </p>
        </div>
        <p>
          <chip-box></chip-box>
        </p>
      </v-card-text>
    </v-card>
  </v-flex>
</v-layout>
@endsection
