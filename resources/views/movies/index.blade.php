@extends('layouts.main')
@section('content')

<div class="container mx-auto px-4 pt-16">
    <div class="popular-movies">
        <h2 class="uppercase tracking-winder text-orange-500 text-lg font-semibold">
        Popular Movies
        </h2>
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-16">
      @foreach($popularMovies as $movie)
            <x-movie-card :movie="$movie"/>
      @endforeach
        </div><!-- end grid-->
    </div><!--end of popular movies-->


<div class="now-playing-movies px-4 pt-16">
    <h2 class="uppercase tracking-wider text-orange-500 text-lg font-semibold">Now Playing</h2>
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-5 gap-8">
        
        @foreach($nowPlayingMovies as $movie)
        <x-movie-card :movie="$movie"/>
        @endforeach
    </div><!--grid gab for palying now-->
</div>

</div>
@endsection
