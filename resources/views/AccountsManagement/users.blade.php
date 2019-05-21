@extends('Templates.layout')


@section('body')
<div id = "app">
	<account-management></account-management>
</div> 
<script src="{{asset('js/app.js')}}"></script>
@endsection