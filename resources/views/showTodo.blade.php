@extends('layouts.app', ['activePage' => 'dashboard', 'titlePage' => __('Dashboard')])

@section('content')
    <div class="content">
        <div class="container-fluid">

            <div class="row">

                <div class="col-lg-12 col-md-12">
                    <div class="card">
                        <div class="card-header card-header-warning">
                            <h4 class="card-title">Edit Todo</h4>
                            <p class="card-category"></p>
                        </div>
                        <div class="card-body" >
                            <a href="{{route("home")}}" class="btn btn-sm  btn-primary" >
                                go back
                            </a>
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            <form class="form" method="POST" action="{{ route('update',["id"=>$data["id"]])}}" >
                                @csrf
                                <div class="form-group">

                                    <input type="hidden" class="form-control" value="{{$data["id"]}}" name="id" id="title-form"  placeholder="Enter a user code" max="10" min="1">
                                </div>
                                <div class="form-group">
                                    <label for="exampleFormControlSelect1">User</label>
                                    <input type="number" class="form-control" value="{{$data["userId"]}}" name="userid" id="title-form"  placeholder="Enter a user code" max="10" min="1">
                                </div>

                                <div class="form-group">
                                    <label for="title-form">Title</label>
                                    <input type="text" class="form-control" value="{{$data["title"]}}" id="title-form" name="title"  placeholder="Enter a title">
                                </div>


                                <div class="form-group">
                                    <div class="form-check">
                                        <label class="form-check-label">
                                            <input class="form-check-input" @if($data["completed"]) checked @endif name="compled" type="checkbox" >
                                            Completed
                                            <span class="form-check-sign">
                                              <span class="check"></span>
                                            </span>
                                        </label>
                                    </div>
                                </div>



                                <button type="submit" class="btn btn-primary">Update</button>
                            </form>
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
