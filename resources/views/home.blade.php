@extends('layouts.app')

@section('content')
<v-layout column>
  <v-flex xs12 sm6 offset-sm3>
    <v-card hover>
      <v-card-media class="black--text" height="300px" src="http://lorempixel.com/400/300/abstract/">
        <v-container fill-height fluid>
          <v-layout fill-height>
            <v-flex xs12 align-end flexbox>
              <span class="headline">Name</span>
            </v-flex>
          </v-layout>
        </v-container>
      </v-card-media>
      <v-card-title>
        nickname
      </v-card-title>
      <v-card-actions>
        <v-chip outline>tantra</v-chip>
        <v-chip outline>bdsm</v-chip>
        <v-chip outline>polyamorous</v-chip>
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
      <dropzone id="myVueDropzone" url="https://httpbin.org/post" v-on:vdropzone-success="showSuccess">
        {{ csrf_field() }}
      </dropzone>
    </v-card>
  </v-flex>
  <v-spacer></v-spacer>
</v-layout>
@endsection
