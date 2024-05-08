<div class="content-header">
    <div class="d-flex align-items-center">
        <div class="mr-auto">
            <h3 class="page-title">Dashboard</h3>
            <div class="d-inline-block align-items-center">
                <nav>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#"><i class="mdi mdi-home-outline"></i></a></li>
                        <li class="breadcrumb-item active" aria-current="page">{{ $title }}</li>
                    </ol>
                </nav>
            </div>
        </div>
        <div class="right-title">
            <div class="d-flex mt-10 justify-content-end">
                <div class="d-lg-flex mr-20 ml-10 d-none">
                    <div class="chart-text mr-10">
                        <h6 class="mb-0"><small>THIS MONTH</small></h6>
                        <h4 class="mt-0 text-primary">$12,125</h4>
                    </div>
                    <div class="spark-chart">
                        <div id="thismonth"><canvas width="60" height="35"
                                style="display: inline-block; width: 60px; height: 35px; vertical-align: top;"></canvas>
                        </div>
                    </div>
                </div>
                <div class="d-lg-flex mr-20 ml-10 d-none">
                    <div class="chart-text mr-10">
                        <h6 class="mb-0"><small>LAST YEAR</small></h6>
                        <h4 class="mt-0 text-danger">$22,754</h4>
                    </div>
                    <div class="spark-chart">
                        <div id="lastyear"><canvas width="60" height="35"
                                style="display: inline-block; width: 60px; height: 35px; vertical-align: top;"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
