@extends('layouts.app')

@section('content')
    <x-container>
  @while(have_posts()) @php(the_post())
    @include('partials.page-header')
    @includeFirst(['partials.content-page', 'partials.content'])
  @endwhile
    </x-container>
@endsection
