@extends('layout')
{{ print_r($mountain) }}
{{ print_r($trail) }}

@section('title')
<h1>{{ $trail->name }}</h1>
<div class="weather">
	{{ $weather['temperature'] }}&deg; 
	{!! $weather['clouds'] !!}
</div>
<div class="hashtag">{{ $trail->hashtag }}</div>
@stop


@section('tagline')
<div class="tagline">
	<h1>Length: {{ number_format($trail->length) }} ft. | Elevation Gain: {{ number_format($trail->elevation_gain) }} ft.</h1>
	<div>
		<span class="selected">Top 10</span>
		<span>See All</span>
	</div>
</div>
@stop



@section('main_content')
	<div class="trail-description">
		<h3>Trail Description</h3>
		<p>{{ $trail->description }}</p>
	</div>
	<div class="trail-comment">
		<h3>Comments</h3>
		<div class="comment-block">
			<div class="image">this is an image</div>
			<div class="comment">
				<div class="user-name">Jordyn</div>
				<div class="comment-content">I love to hike here. What a beautiful place to be. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquid voluptate mollitia explicabo dicta quae, ipsam tempore cupiditate accusantium consequatur, delectus totam quis quo minus voluptas! Exercitationem soluta, illum officia voluptatibus.</div>
			</div>
		</div>

		<div class="comment-block">
			<div class="image">this is an image</div>
			<div class="comment">
				<div class="user-name">Jordyn</div>
				<div class="comment-content">I love to hike here. What a beautiful place to be. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquid voluptate mollitia explicabo dicta quae, ipsam tempore cupiditate accusantium consequatur, delectus totam quis quo minus voluptas! Exercitationem soluta, illum officia voluptatibus.</div>
			</div>
		</div>


		<div class="more-comments">
			<span>more v</span>
			
		</div>

	</div>

	
	<div class="instagram-feed">
		<h3>{{ $trail->hashtag }}</h3>
		<div id="instafeed"></div>
	</div>
@stop