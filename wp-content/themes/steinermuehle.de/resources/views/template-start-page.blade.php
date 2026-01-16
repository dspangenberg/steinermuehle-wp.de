{{--
  Template Name: Startseite
--}}

@extends('layouts.app')


@section('hero')
<div class="hero w-full">
    <div class="video-docker">
        <video
            class="video"
            autoplay
            playsinline
            muted
            loop>
            <source src="{{ get_theme_file_uri('resources/images/steinermuehle.mp4') }}" type="video/mp4" />
        </video>

        <div class="video-content leading-1">
            <div class="hero-content">
                <h2>@field('video_subheader')</h2>
                <h1>@field('video_header')</h1>
            </div>
        </div>
    </div>
</div>
@endsection

@section('content')
    <x-container class="my-24 space-y-12">

        @while(have_posts())
            @php the_post() @endphp
            @include('partials.page-header')
        @endwhile

            @query([
                  'post_type' => 'page',
                  'post_parent' => 10,
                  'posts_per_page' => -1,
                  'orderby' => 'menu_order',
                  'order' => 'ASC'
                ])

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-5 gap-4">
            @posts
                <x-accommodation-card
                    :image="get_the_post_thumbnail_url(get_the_ID(), 'full')"
                    :url="get_permalink()"
                    :title="get_the_title()"
                    :beds="get_field('number_of_beds')"
                    :size="get_field('size')"
                    :stars="get_field('number_of_statrs')"
                />
            @endposts
            </div>

            @while(have_posts())
                @php the_post() @endphp
                @include('partials.content-page')
            @endwhile

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-4 mt-24">
            <div>
                <img src="{{ get_theme_file_uri('resources/images/DTV_150_rgb.jpg')}}" class="w-50 mx-auto">
            </div>
            <div>
                <img src="{{ get_theme_file_uri('resources/images/Vogtland_150_rgb.jpg') }}" class="w-50 mx-auto">
            </div>
            <div>
                <img src="{{ get_theme_file_uri('resources/images/Landsichten_150_rgb.jpg') }}" class="w-50 mx-auto">
            </div>
        </div>
    </x-container>
@endsection
