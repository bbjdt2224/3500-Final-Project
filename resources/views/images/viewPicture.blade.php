@extends('layouts.nav')

@section('body')
	<div class="row">
		<div class="col-md-9">
			<h1><a href="{{route("gallery", ["catagory"=>$art->Catagory])}}">{{$art->Title}}</a></h1>
			<img width="100%" src="{{asset("images/".$art->Photo)}}">
		</div>
		<div class="col-md-3">
			<br>
			<br>
			<br>
			<br>
			<table>
				<tr>
					<td>
						<h1>Likes:{{$likes->Likes}}</h1>
					</td>
					<td width="50px">
						<h1 style="float:right"><a href="{{route("like", ["id"=>$art->id])}}">+</a></h1>
					</td>
				</tr>
				<tr>
					<td>
						<h1>Dislikes:{{$likes->Dislikes}}</h1>
					</td>
					<td width="50px">
						<h1 style="float:right"><a href="{{route("dislike", ["id"=>$art->id])}}">+</a></h1>
					</td>
				</tr>
		</div>
	</div>
@endsection