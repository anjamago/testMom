@extends('layouts.app', ['activePage' => 'dashboard', 'titlePage' => __('Dashboard')])

@section('content')
    <div class="content">
        <div class="container-fluid">

            <div class="row">

                <div class="col-lg-12 col-md-12">
                    <div class="card">
                        <div class="card-header card-header-warning">
                            <h4 class="card-title">Logs</h4>
                            <p class="card-category"></p>
                        </div>

                        <div class="card-body table-responsive">

                                <table class="table table-hover ">
                                    <thead class="text-warning">
                                    <th>Action</th>

                                    <th>Status</th>
                                        <th>Header</th>
                                        <th>Log</th>

                                    </thead>
                                    <tbody>
                                        @foreach ($datas as $data )
                                            <tr >
                                                <td>{{$data->action}}</td>
                                                <td>{{$data->status}}</td>
                                                <td >{{$data->header}}</td>
                                                <td class="td-auto">{{$data->log}}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
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

@push('css')
    <
    @endpush
