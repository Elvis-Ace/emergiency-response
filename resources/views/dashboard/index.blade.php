@extends('layouts.dashboard')
@section('content')
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xl-8 col-12">
                <div class="box">
                    <div class="box-header no-border">
                        <h4 class="box-title">
                            Overview
                        </h4>
                    </div>
                    <div class="box-body pt-0">
                        <div id="yearly-comparison"></div>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-12">
                <div class="box overflow-hidden bg-gradient-bluegrey">
                    <div class="box-header no-border">
                        <h6 class="box-title font-weight-600 text-uppercase text-white">Impressions</h6>
                        <ul class="box-controls pull-right">
                            <li>
                                <i class="fa fa-bullhorn text-white-50"></i>
                            </li>
                        </ul>
                    </div>
                    <div class="box-body p-0">
                        <div class="px-25">
                            <h3 class="text-white font-weight-700">140k</h3>
                            <p class="text-white-50">The total number of sessions date range.</p>
                        </div>
                        <div id="statisticschart3"></div>
                    </div>
                </div>
            </div>

            <div class="col-xl-6 col-12">
                <div class="box">
                    <div class="box-header no-border">
                        <h4 class="box-title">
                            Total Growth
                        </h4>
                    </div>
                    <div class="box-body pt-0">
                        <div id="growth"></div>
                    </div>
                </div>
            </div>

            <div class="col-xl-3 col-lg-6 col-12">
                <div class="box">
                    <div class="box-body">
                        <h4 class="font-weight-600 text-dark mb-30">Sessions Device </h4>
                        <div id="earning-chart"></div>
                        <div>
                            <hr>
                            <p class="d-flex justify-content-between font-weight-700"><span class="text-fade">Dasktops
                                    :</span>2154</p>
                            <p class="d-flex justify-content-between font-weight-700"><span
                                    class="text-fade">Tablets:</span>6458</p>
                            <p class="d-flex justify-content-between font-weight-700"><span
                                    class="text-fade">Mobiles:</span>9518</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-3 col-lg-6 col-12">
                <div class="box">
                    <div class="box-header">
                        <h5 class="text-uppercase box-title">Montly Sale</h5>
                    </div>
                    <div class="box-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <h1 class="my-0">20k </h1>
                                <p class="text-fade mb-0">Today Income</p>
                            </div>
                            <div class="bg-info px-30 py-10 text-center rounded"><i class="ti-arrow-down text-white"></i>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="box bg-warning">
                    <div class="box-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="text-center">
                                <h2 class="font-weight-600">21k</h2>
                                <p>Total visitors</p>
                            </div>
                            <div id="visitors-char"></div>
                        </div>
                    </div>
                </div>
                <div class="box">
                    <div class="box-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <h1 class="my-0">205k</h1>
                                <p class="text-fade mb-0">Today Income</p>
                            </div>
                            <div class="bg-success px-30 py-10 text-center rounded"><i class="ti-arrow-up text-white"></i>
                            </div>
                        </div>
                    </div>
                    <div class="progress progress-sm rounded-0 mt-0 mb-0">
                        <div class="progress-bar bg-success rounded-0" role="progressbar" style="width: 72%;"
                            aria-valuenow="72" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                </div>
            </div>
            <div class="col-xl-6 col-12">
                <div class="box">
                    <div class="box-header">
                        <h4 class="box-title">
                            Browser Used By Users
                        </h4>
                    </div>
                    <div class="box-body">
                        <div class="table-responsive">
                            <table class="table mb-0">
                                <thead class="thead-light">
                                    <tr>
                                        <th class="border-top-0">Browser</th>
                                        <th class="border-top-0">Sessions</th>
                                        <th class="border-top-0">Bounce Rate</th>
                                        <th class="border-top-0">Transactions</th>
                                    </tr><!--end tr-->
                                </thead>
                                <tbody>
                                    <tr>
                                        <td><i class="fa fa-chrome mr-2 text-danger font-16"></i>Chrome</td>
                                        <td>41225<small class="text-muted">(52%)</small></td>
                                        <td> 52.80%</td>
                                        <td>854<small class="text-muted">(92%)</small></td>
                                    </tr><!--end tr-->
                                    <tr>
                                        <td><i class="fa fa-safari mr-2 text-info font-16"></i>Safari</td>
                                        <td>4587<small class="text-muted">(47%)</small></td>
                                        <td> 47.54%</td>
                                        <td>458<small class="text-muted">(81%)</small></td>
                                    </tr><!--end tr-->
                                    <tr>
                                        <td><i
                                                class="fa fa-internet-explorer mr-2 text-warning font-16"></i>Internet-Explorer
                                        </td>
                                        <td>2154<small class="text-muted">(38%)</small></td>
                                        <td> 41.12%</td>
                                        <td>658<small class="text-muted">(74%)</small></td>
                                    </tr><!--end tr-->
                                    <tr>
                                        <td><i class="fa fa-opera mr-2 text-danger font-16"></i>Opera</td>
                                        <td>1254<small class="text-muted">(31%)</small></td>
                                        <td> 36.82%</td>
                                        <td>542<small class="text-muted">(61%)</small></td>
                                    </tr><!--end tr-->
                                    <tr>
                                        <td><i class="fa fa-firefox mr-2 text-blue font-16"></i>Firefox</td>
                                        <td>1235<small class="text-muted">(26%)</small></td>
                                        <td> 29.33%</td>
                                        <td>254<small class="text-muted">(49%)</small></td>
                                    </tr><!--end tr-->
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-6 col-12">
                <div class="box">
                    <div class="box-header">
                        <h4 class="box-title">
                            Visitors By Country
                        </h4>
                    </div>
                    <div class="box-body">
                        <div id="world-map-markers" class="h-300"></div>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-12">
                <div class="box box-body bg-danger">
                    <h6>
                        <span class="text-uppercase">Revenue</span>
                        <span class="float-right"><a class="btn btn-xs btn-primary" href="#">View</a></span>
                    </h6>
                    <br>
                    <p class="font-size-26">$845,1258</p>
                    <div class="font-size-18"><i class="ion-arrow-graph-down-right text-success mr-1"></i> %18 decrease
                        from last month</div>
                </div>
            </div>
            <!-- /.col -->

            <div class="col-xl-4 col-12">
                <div class="box box-body bg-primary">
                    <h6>
                        <span class="text-uppercase">ORDERS</span>
                        <span class="float-right"><a class="btn btn-xs btn-warning" href="#">View</a></span>
                    </h6>
                    <br>
                    <p class="font-size-26">159,1258</p>
                    <div class="font-size-18"><i class="ion-arrow-graph-down-right text-danger mr-1"></i> %95 down</div>
                </div>
            </div>
            <!-- /.col -->
            <div class="col-xl-4 col-12">
                <div class="box box-body bg-info">
                    <h6>
                        <span class="text-uppercase">VISITORS</span>
                        <span class="float-right"><a class="btn btn-xs btn-primary" href="#">View</a></span>
                    </h6>
                    <br>
                    <p class="font-size-26">84,9658</p>
                    <div class="flexbox font-size-18">
                        <span><i class="ion-arrow-graph-down-right text-success mr-1"></i> %54 up</span>
                    </div>
                </div>
            </div>
            <!-- /.col -->

        </div>
    </section>
@endsection
