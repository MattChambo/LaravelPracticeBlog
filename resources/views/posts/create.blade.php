@extends('main')

@section('title', '| Create New Post')

@section('stylesheets')

	{!! Html::style('css/parsley.css') !!}

@endsection

@section('content')

	<div class="row">
		{{-- This div is 8 coloums wide out of twelve offset by 2 empty coloums --}}
		<div class="col-md-8 col-md-offset-2">
			<h1>Create New Post</h1>
			<hr>
			{{-- This blade creates a form and sends data to posts.store --}}
			{!! Form::open(['route' => 'posts.store', 'data-parsley-validate' =>'']) !!}
				{{-- 'title' and title must be the same so database knows what belongs to what --}}
    			{{ Form::label('title', 'Title:') }}
    			{{-- Form control is a bootstrap class that makes forms look pretty. Second parameter null is the default value that appears in the field, doesn't have to be null but if the field is going to be blank you have to put null --}}
    			{{ Form::text('title', null, array('class' => 'form-control', 'required' => '', 'maxlength' => '255'))}}

    			{{-- The 'slug' must match the column name in the database and it must match the label--}}
    			{{ Form::label('slug', 'Slug:') }}
    			{{ Form::text('slug', null, array('class' => 'form-control', 'required' => '', 'minlength' => '5', 'maxlength' => '255')) }}

    			{{ Form::label('body', "Post Body:")}}
    			{{ Form::textarea('body', null, array('class' => 'form-control', 'required' => ''))}}

    			{{-- Form will go to posts.store when submited --}}
    			{{ Form::submit('Create Post', array('class' => 'btn btn-success btn-lg btn-block', 'style' => 'margin-top: 20px;')) }}
			{!! Form::close() !!}
		</div>
	</div>

@endsection

@section('scripts')

	{!! Html::script('js/parsley.min.js') !!}

@endsection