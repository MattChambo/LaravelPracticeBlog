@extends('main')

@section('title', '| Edit Blog Post')

@section('content')

	<div class="row">
		{{-- Opens the form binds the model to the form. Adds post object from $post. Get form helpers from video 11, doesn't work without them. 'route' goes to post update plus the id of the post. Route contains an array within an array. You have to tell the form binder what method to use. --}}
		{!! Form::model($post, ['route' => ['posts.update', $post->id], 'method' => 'PUT']) !!}
		<div class="col-md-8">
			
			{{ Form::label('title', 'Title:') }}
			{{-- The bit in '' must match a column in the database. null stops the code from overiding laravel default behaviour --}}
			{{ Form::text('title', null, ["class" => 'form-control input-lg']) }}
			
			{{ Form::label('body', "Body:", ['class' => 'form-spacing-top']) }}
			{{ Form::textarea('body', null, ['class' => 'form-control']) }}
		</div>

		<div class="col-md-4">
			<div class="well">
				<dl class="dl-horizontal">
					<dt>Created At:</dt>
					<dd>{{ date('j M, Y h:ia', strtotime($post->created_at)) }}</dd>
				</dl>

				<dl class="dl-horizontal">
					<dt>Last Updated:</dt>
					<dd>{{ date('j M, Y h:ia', strtotime($post->updated_at)) }}</dd>
				</dl>
				<hr>
				<div class="row">
					<div class="col-sm-6">
						{!! Html::linkRoute('posts.show', 'Cancel', array($post->id), array('class' =>'btn btn-danger btn-block')) !!}
						{{-- <a href="#" class="btn btn-primary btn-block">Edit</a> --}}
					</div>
					<div class="col-sm-6">
						{{ Form::submit('Save Changes', ['class' => 'btn btn-success btn-block'])}}
					</div>
				</div>
			</div>
		</div>
		{{-- Closes the form --}}
		{!! Form::close()  !!}
	</div>{{-- End of .row (form) --}}

	
@stop