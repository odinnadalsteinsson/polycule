@extends('layouts.app')

@section('content')
<v-layout column>
  <v-flex xs12 sm6 offset-sm3>
    <v-card hover>
      <v-card-media class="black--text" height="300px" src="{{ Auth::user()->getPhoto() }}">
        <v-container fill-height fluid>
          <v-layout fill-height>
            <v-flex xs12 align-end flexbox>
              <span class="headline">{{ Auth::user()->name }}</span>
            </v-flex>
          </v-layout>
        </v-container>
      </v-card-media>
      <dropzone style="border: 0px" id="myVueDropzone" url="/home/photo" v-on:vdropzone-success="showSuccess" :max-file-size-in-m-b="100">
        {{ csrf_field() }}
      </dropzone>
      <v-card-title>
        {{ Auth::user()->name }}
      </v-card-title>
      <v-card-actions>
        <v-chip class="primary primary--text" outline>tantra</v-chip>
        <v-chip class="primary primary--text" outline>bdsm</v-chip>
        <v-chip class="primary primary--text" outline>polyamorous</v-chip>
        <v-spacer></v-spacer>
        <v-btn icon>
          <v-icon>favorite</v-icon>
        </v-btn>
        <v-btn icon>
          <v-icon>bookmark</v-icon>
        </v-btn>
        <v-btn icon>
          <v-icon>share</v-icon>
        </v-btn>
        <logout>{{ csrf_field() }}</logout>
      </v-card-actions>
    </v-card>
  </v-flex>
  <v-spacer></v-spacer>
</v-layout>
@endsection
