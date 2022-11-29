<x-admin-master>
    @section('content')
        <h1>User Profile {{$user->name}}</h1>
        <form action="{{route('post.store')}}" method="post" enctype="multipart/form-data" style="width:50%">
            @csrf
            <div class="mb-4">
            <img class="img-profile rounded-circle" width="95px" src="https://source.unsplash.com/QAB-WJcbgJk/60x60">
            </div>
            <div class="form-group">
                <input type="file" name="post_image" class="form-control-file" id="post_image">
            </div>
            <div class="form-group">
              <label for="UserName">Username</label>
              <input type="text" name="username" class="form-control" placeholder="Enter Username" id="username" value="{{$user->username}}">
            </div>
            <div class="form-group">
              <label for="Name">Name</label>
              <input type="text" name="name" class="form-control" placeholder="Enter Name" id="name" value="{{$user->name}}">
            </div>
            <div class="form-group">
              <label for="Email">Email</label>
              <input type="Email" name="email" class="form-control" id="User_email" value="{{$user->email}}">
            </div>
            <div class="form-group">
              <label for="password">Password</label>
              <input type="password" name="password" class="form-control" id="password">
            </div>
            <div class="form-group">
              <label for="Cpassword">Confirm Password</label>
              <input type="password" name="password_confirmation" class="form-control" id="Cpassword">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
          </form>
    @endsection
</x-admin-master>