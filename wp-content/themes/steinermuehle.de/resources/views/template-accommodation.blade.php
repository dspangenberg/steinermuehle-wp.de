@php use function App\render_content_without_galleries; @endphp
@php use function App\get_gallery_images; @endphp
{{--
  Template Name: Unterkünfte
--}}

@extends('layouts.app')

@section('content')
    <img src="{{get_the_post_thumbnail_url(get_the_ID(), 'full')}}" class="aspect-video object-cover w-full h-auto video-docker mt-20" />
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
        @hasfield('schedule_id')
            <h2 class="text-center">Belegungsplan</h2>
            <div id="belegungsplan"></div>
            <script>
              eobp_config = {};
              eobp_config.name = 'belegungsplan';
              eobp_config.lid = {{ get_field('schedule_id') }};
              if (typeof _eobp_configs  === 'undefined') var _eobp_configs = [];
              _eobp_configs.push(eobp_config);
              if (!document.head.querySelector('script[data-id=eobp]')){
                var script = document.createElement('script');
                script.src = 'https://belegungskalender.api.eberl-online.net/v1/bundle.js';
                script.async = true;
                script.setAttribute('data-id', 'eobp');
                document.head.appendChild(script);
              }
            </script>
        @endfield
    </x-container>
@endsection
