@extends('layout.nav')

@section('body')
	<img src="{{$art->photo}}">
	<h1>{{$art->title}}</h1>
	<h1>{{$art->likes}}</h1>
	<h1>{{$art->dislikes}}
	
@endsection