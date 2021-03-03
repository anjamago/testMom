@extends('layouts.app', ['activePage' => 'dashboard', 'titlePage' => __('Dashboard')])

@section('content')
  <div class="content">
    <div class="container-fluid">

      <div class="row">

        <div class="col-lg-12 col-md-12">
          <div class="card">
            <div class="card-header card-header-warning">
              <h4 class="card-title">Todos</h4>
              <p class="card-category"></p>
            </div>
              <div class="col-12 text-right">
                  <a href="{{route("create")}}" class="btn btn-sm  btn-primary" >
                     Add Todo
                  </a>
              </div>
            <div class="card-body table-responsive">

             @if($count > 0)
                    <table class="table table-hover">
                        <thead class="text-warning">
                            <th>ID User</th>
                            <th>Id</th>
                            <th>Title</th>
                            <th>Completed</th>
                            <th>Actions</th>
                        </thead>
                        <tbody>
                        @for ($i = 0; $i < $count -1; $i++)
                            <tr >
                                <td>{{$data[$i]["userId"]}}</td>
                                <td>{{$data[$i]["id"]}}</td>
                                <td>{{$data[$i]["title"]}}</td>
                                <td>
                                    @if($data[$i]["completed"])
                                        <span>Y</span>
                                    @else
                                        <span>N</span>
                                    @endif
                                </td>
                                <td>
                                    <a href="{{route("edit",["id"=>$data[$i]["id"]])}}" class="btn btn-warning" >
                                        Edit
                                    </a>
                                    <a href="{{route("delete",["id"=>$data[$i]["id"]])}}" class="btn btn-danger" >
                                        Delete
                                    </a>
                                </td>
                            </tr>
                        @endfor


                        </tbody>
                    </table>
                    @endif
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>



@endsection

@push('js')
  <script>
    $(document).ready(function() {
      // Javascript method's body can be found in assets/js/demos.js
      md.initDashboardPageCharts();
    });
  </script>
@endpush
