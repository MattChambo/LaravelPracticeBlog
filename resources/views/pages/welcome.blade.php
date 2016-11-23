
@extends('main')

@section('title', '| Homepage')

@section('content')
    
      <div class="row">
        <div class="col-md-12">
          <div class="jumbotron">
            <h1>Welcome to my blog!</h1>
            <p class="lead">Thank you so much for visiting. This is my test website built with Laravel. Please read my popular post!</p>
            <p><a class="btn btn-primary btn-lg" href="#" role="button">Popular Post</a></p>
          </div>
        </div>  
      </div> <!-- End of header .row -->
      <div class="row">
        <div class="col-md-8">

          @foreach($posts as $post)

            <div class="post">
              {{-- Gets title from database --}}
              <h3>{{ $post->title }}</h3>
              {{-- Gets body of post from database, substr truncates post starting at first character of post 0 and ending at the 300th character. Second strlen is checking if the body of the post is more than 300 characters and adding an elipsis if it is longer than 300 or nothing if it is less than 300 --}}
              <p>{{ substr($post->body, 0, 300) }}{{ strlen($post->body) > 300 ? "..." : "" }}</p>
              <a href="#" class="btn btn-primary">Read More</a>
            </div>

          @endforeach

          <hr> 
        </div>
        <div class="col-md-3 col-md-offset-1">
          <h2>Sidebar</h2>
        </div>
      </div>

@endsection