@extends('layouts.nav')

@section('body')
	<form method="post" action="{{route('add')}}" id="form">
		{{ csrf_field() }}
		Picture
		<input type="file" name="photo" class="form-control">
		Square Picture
		<input type="file" name="square" class="form-control">
		Title
		<input type="text" name="title" class="form-control">
		Catagory
		<input type="text" name="catagory" class="form-control">
		<button type="submit" class="btn btn-info">Add</button>
	</form>
@endsection