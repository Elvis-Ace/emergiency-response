@extends('layouts.dashboard')
@section('content')
    <div class="content">
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">Individual column searching</h3>
                <form action="{{ route('heatmap') }}" method="get">
                    <div class="row">
                        <div class="col-sm-6">
                            <select name="type" id="type" class="form-control">
                                <option value="">Select Disaster Type</option>
                                @foreach ($types as $type)
                                    <option value="{{ $type->id }}">{{ $type->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-sm-6 text-center">
                            <button class="btn btn-success">Submit Data</button>
                        </div>
                    </div>
                </form>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <div class="table-responsive">
                    <table id="example5" class="table table-bordered table-striped" style="width:100%">
                        <thead>
                            <tr>
                                <th>Disaster</th>
                                <th>Description</th>
                                <th>Individual</th>
                                <th>Coordinates</th>
                                <th>Image</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($reports as $report)
                                <tr>
                                    <td>{{ $report->disaster->name }}</td>
                                    <td>{{ $report->description }}</td>
                                    <td>{{ $report->user->name . ' - ' . $report->user->phone }}</td>
                                    <td>{{ $report->coordinates }}</td>
                                    <td><img src="/assets/data/{{ $report->files }}"
                                            style="width: 100%;height:200px;object-fit:contain" alt="">
                                    </td>
                                    <td><button class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>Disaster</th>
                                <th>Description</th>
                                <th>Individual</th>
                                <th>Coordinates</th>
                                <th>Image</th>
                                <th>Action</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
            <!-- /.box-body -->
        </div>
    </div>
@endsection
