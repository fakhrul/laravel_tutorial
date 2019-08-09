@extends('blog_posts.layout')
 
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>List of Blogs</h2>
            </div>
            {{-- <div class="pull-right">
                <a class="btn btn-success" href="{{ route('blog_posts.create') }}"> Create New Post</a>
            </div> --}}
        </div>
    </div>
   
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
   
    <table id="table_posts" class="table table-bordered">
            <thead>
        <tr>
            <th>No</th>
            <th>Title</th>
            <th>Content</th>
            <th width="280px">Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($blog_posts as $blog_post)
        <tr>
            <td>{{ ++$i }}</td>
            <td>{{ $blog_post->title }}</td>
            <td>{{ $blog_post->content }}</td>
            <td>
                <form action="{{ route('blog_posts.destroy',$blog_post->id) }}" method="POST">
   
                    <a class="btn btn-info" href="{{ route('blog_posts.show',$blog_post->id) }}">Show</a>
    
                    <a class="btn btn-primary" href="{{ route('blog_posts.edit',$blog_post->id) }}">Edit</a>
   
                    @csrf
                    @method('DELETE')
      
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
    </table>
  
    {!! $blog_posts->links() !!}
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('blog_posts.create') }}"> Create New Post</a>
            </div>
        </div>
    </div>
@endsection

@section('javascript')
     <script type="text/javascript">
$(document).ready(function () {
  $('#table_posts').DataTable();
});
     </script>
@endsection