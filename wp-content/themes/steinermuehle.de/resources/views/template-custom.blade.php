{{--
  Template Name: Custom Template
--}}

@extends('layouts.app')

@section('content')
    <x-container>
          @while(have_posts()) @php(the_post())
            @include('partials.page-header')
            @include('partials.content-page')
          @endwhile
    </x-container>
@endsection
