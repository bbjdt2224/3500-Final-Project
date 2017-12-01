@extends('layouts.nav')

@section('body')
	<?php
		$i = 0;
	?>
	<div class="row">
		@foreach($art as $a)
			@if($i % 3 == 0)
				</div><div clas="row">
			@endif
			<div class="col-md-4">
				<a href="{{route("picture", ["id"=> $a->id])}}">
					<div class="thumbnail">
						<img src="{{asset("images/square/".$a->Square)}}">
						<div class="caption">
							{{$a->Title}}
							<div style="float: right;">
								@Auth
									<a href="{{route('like', ["id"=>$a->id])}}">
										<span class="glyphicon glyphicon-thumbs-up"></span>
										@if(isset($likes[$i]->Likes))
											{{$likes[$i]->Likes}}
										@endif
									</a>
									<a href="{{route('dislike', ["id"=>$a->id])}}">
										<span class="glyphicon glyphicon-thumbs-down"></span>
										@if(isset($likes[$i]->Dislikes))
											{{$likes[$i]->Dislikes}}
										@endif
									</a>
								@endAuth
							</div>
							<br/>
						</div>
					</div>
				</a>
				<?php $i++; ?>
			</div>
		@endforeach
	</div>
	
@endsection