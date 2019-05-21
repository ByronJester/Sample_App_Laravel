@extends('Templates.home_layout')


@section('body')
<div id = "app">
	<profile-management></profile-management>
</div> 
<script src="{{asset('js/app.js')}}"></script>
@endsection