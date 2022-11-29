<x-admin-master>
    @section('content')
        <h1>User Profile {{$user->name}}</h1>
        <form action="{{route('user.profile.update', $user->id) }}" method="post" enctype="multipart/form-data" style="width:50%">
            @csrf
            @method('PUT')
            <div class="mb-4">
            <img class="img-profile rounded-circle" width="95px" src="{{$user->avatar}}">
            </div>
            <div class="form-group">
                <input type="file" name="avatar" class="form-control-file" id="post_image">
            </div>
            <div class="form-group">
              <label for="UserName">Username</label>
              <input type="text" name="username" class="form-control" placeholder="Enter Username" id="username" value="{{$user->username}}">
              @error('username')
              <div class="alert alert-danger">{{$message}} </div>   
              @enderror
            </div>
            <div class="form-group">
              <label for="Name">Name</label>
              <input type="text" name="name" class="form-control" placeholder="Enter Name" id="name" value="{{$user->name}}">
              @error('name')
              <div class="alert alert-danger">{{$message}} </div>   
              @enderror
            </div>
            <div class="form-group">
              <label for="Email">Email</label>
              <input type="Email" name="email" class="form-control" id="User_email" value="{{$user->email}}">
              @error('email')
              <div class="alert alert-danger">{{$message}} </div>   
              @enderror
            </div>
            <div class="form-group">
              <label for="password">Password</label>
              <input type="password" name="password" class="form-control" id="password">
              @error('password')
              <div class="alert alert-danger">{{$message}} </div>   
              @enderror
            </div>
            <div class="form-group">
              <label for="Cpassword">Confirm Password</label>
              <input type="password" name="password_confirmation" class="form-control" id="Cpassword">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
          </form>
    @endsection
</x-admin-master>