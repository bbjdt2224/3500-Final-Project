@extends('layout.nav')

@section('body')
	<?php
		$i = 0;
	?>
	<div class="row">
	@foreach($art as $a)
		@if($i % 3 = 0)
			</div><div clas="row">
		@endif
		<div class="thumbnail">
			<a href="{{route("picture")}}">
				<div class="col-md-4">
					<img src="{{$a->Square}}">
				</div>
				<div class="caption" style="float: right;">
					<span class="glyphicon glyphicon-thumbs-up"></span>{{likes}}
					<span class="glyphicon glyphicon-thumbs-down"></span>{{likes}}
				</div>
			</a>
		</div>
	@endforeach
	
@endsection