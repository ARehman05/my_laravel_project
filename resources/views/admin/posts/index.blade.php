<x-admin-master>
    @section('content')
        <h1>All Posts</h1>
        @if (Session::has('message'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
              <strong>{{Session::get('message')}}</strong> 
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
           @elseif(Session::has('post_create_message'))
           <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>{{Session::get('post_create_message')}}</strong> 
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          @elseif(Session::has('post_update_message'))
          <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>{{Session::get('post_update_message')}}</strong> 
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
        @endif
        
        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Id</th>
                      <th>Owner</th>
                      <th>Title</th>
                      <th>Image</th>
                      <th>Created at</th>
                      <th>Updated at</th>
                      <th>Delete</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th>Id</th>
                      <th>Owner</th>
                      <th>Title</th>
                      <th>Image</th>
                      <th>Created at</th>
                      <th>Updated at</th>
                      <th>Delete</th>
                    </tr>
                  </tfoot>
                  @foreach ($posts as $post)
                    <tbody>
                      <tr>
                        <td>{{$post->id}}</td>
                        <td>{{$post->user->name}}</td>
                        <td><a href="{{route('post.edit', $post->id)}}">{{$post->title}}</a></td>
                        <td><img src="{{$post->post_image}}" alt="Post Image" height="40px" width="120px"></td>
                        <td>{{$post->created_at->diffForHumans()}}</td>
                        <td>{{$post->updated_at->diffForHumans()}}</td>
                        @can('view', $post)
                        <form action="{{route('post.destroy',$post->id)}}" method="POST">
                          @csrf
                          @method('DELETE')
                          <td><button type="submit" class="btn btn-danger">Delete</button></td>
                        </form>
                        @endcan
                      </tr>
                    </tbody> 
                  @endforeach
                  
                </table>
              </div>
            </div>
          </div>
          <div class="d-flex">
            <div class="mx-auto">
              {{$posts->links()}}
            </div>
          </div>
    @endsection

    @section('scripts')
    <!-- Page level plugins -->
    <script src="{{asset('vendor/datatables/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('vendor/datatables/dataTables.bootstrap4.min.js')}}"></script>

    <!-- Page level custom scripts -->
    {{-- <script src="{{asset('js/demo/datatables-demo.js')}}"></script> --}}
    @endsection
</x-admin-master>