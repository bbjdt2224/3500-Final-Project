@extends('layouts.nav')

@section('body')
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Lauren</div>

                <div class="panel-body">
                    <a href="{{route('addPicture')}}" class="btn btn-default">Add</a>
                </div>
            </div>
        </div>
    </div>
@endsection
