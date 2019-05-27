@extends('Templates.home_layout')


@section('body')
<div id = "app">
	<news-feed></news-feed>
</div> 
<script src="{{asset('js/app.js')}}"></script>
@endsection 