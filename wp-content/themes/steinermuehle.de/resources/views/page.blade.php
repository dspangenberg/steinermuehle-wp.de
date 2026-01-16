@php use function App\render_content_without_galleries; @endphp
@php use function App\get_gallery_images; @endphp
@extends('layouts.app')

@section('content')
  @if(get_the_post_thumbnail_url(get_the_ID()))
  <img src="{{get_the_post_thumbnail_url(get_the_ID(), 'full')}}"
       class="aspect-video object-cover w-full h-auto lg:h-screen"
  />
  @endif
  <x-container class="my-24 space-y-12">
    @while(have_posts())
      @php the_post() @endphp

      @include('partials.page-header')

      {!! render_content_without_galleries(get_the_ID()) !!}

      @php
        $images = get_gallery_images(get_the_ID());
      @endphp

      <div>
        @if(count($images) > 0)
          <x-gallery :images="$images" :columns="8" />
        @endif
        @endwhile
      </div>
  </x-container>
@endsection
