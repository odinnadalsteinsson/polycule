@extends('layouts.content')

@push('head')
{{-- Facebook callback appends #_=_ hash underscore to the Return URL. This gets rid of it --}}
<script type="text/javascript">
    if (window.location.hash == '#_=_') {
        history.replaceState
            ? history.replaceState(null, null, window.location.href.split('#')[0])
            : window.location.hash = '';
    }
</script>
@endpush

@section('content')
<v-layout column>
  <v-flex xs12 sm6 offset-sm3>
    <v-card hover>
      <v-card-media class="black--text" height="300px" src="{{ !empty($user->avatar) ? $user->avatar : $user->getPhoto() }}">
        <v-container fill-height fluid>
          <v-layout fill-height>
            <v-flex xs12 align-end flexbox>
              <span class="headline">{{ Auth::user()->name }}</span>
            </v-flex>
          </v-layout>
        </v-container>
      </v-card-media>
      {{-- <image-uploader>
          <dropzone id="ImageUploader" url="/home/photo" :use-custom-dropzone-options=true :dropzone-options="dzOptions" v-on:vdropzone-success="showSuccess">
          </dropzone>
      </image-uploader> --}}
      <dropzone style="border: 0px" id="myVueDropzone" url="/home/photo" v-on:vdropzone-success="showSuccess" :max-file-size-in-m-b="100">
        {{ csrf_field() }}
      </dropzone>
      {{-- <v-container fluid v-bind="{ [`grid-list-xs`]: true }">
        <v-layout row wrap>
          <v-flex
            xs4
            v-for="n in 3"
            :key="n"
          >
            <v-card flat tile>
              <v-card-media
                :src="`https://unsplash.it/150/300?image=${Math.floor(Math.random() * 100) + 1}`"
                height="150px"
              >
              </v-card-media>
            </v-card>
          </v-flex>
        </v-layout>
      </v-container> --}}
      <v-card-title>
        {{ Auth::user()->name }}
      </v-card-title>
      <v-card-actions>
        @foreach (Auth::user()->tagsWithType('gender') as $tag)
          <v-chip class="primary primary--text" outline>{{ $tag->name }}</v-chip>
        @endforeach
        @foreach (Auth::user()->tagsWithType('relationship-status') as $tag)
          <v-chip>{{ $tag->name }}</v-chip>
        @endforeach
        <v-spacer></v-spacer>
        <logout>{{ csrf_field() }}</logout>
      </v-card-actions>
    </v-card>
  </v-flex>
  <v-spacer></v-spacer>
</v-layout>
@endsection
