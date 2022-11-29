<x-admin-master>
    @section('content')
        <h1>Edit a Post</h1>
        <form action="{{route('post.update', $post->id)}}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PATCH')
            <div class="form-group">
              <label for="Title">Title</label>
              <input type="text" name="title" class="form-control" placeholder="Enter Title" id="title" value="{{$post->title}}">
            </div>
            <div class="form-group">
                <div><img src="{{$post->post_image}}" height="100px" alt="Post Image"></div>
              <label for="image_file">File</label>
              <input type="file" name="post_image" class="form-control-file" id="post_image">
            </div>
            <div class="form-group ">
              <label for="content">Content</label>
              <textarea name="body" class="form-control" id="body" cols="30" rows="10">{{$post->body}}</textarea>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
          </form>
    @endsection
</x-admin-master>