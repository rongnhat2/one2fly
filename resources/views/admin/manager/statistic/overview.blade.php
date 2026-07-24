@extends('admin.layout')
@section('title', 'Thống kê tổng quan')
@section('menu-data')
<input type="hidden" name="" class="menu-data" value="statistic-group | statistic-overview">
@endsection()


@section('css')

@endsection()


@section('body')
<div class="row">
    <div class="col-md-6 col-lg-3">
        <div class="card">
            <div class="card-body">
                <div class="media align-items-center">
                    <div class="avatar avatar-icon avatar-lg avatar-blue">
                        <i class="anticon anticon-dollar"></i>
                    </div>
                    <div class="m-l-15">
                        <h2 class="m-b-0 data-prices"> </h2>
                        <p class="m-b-0 text-muted">Tổng doanh thu</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-6 col-lg-3">
        <div class="card">
            <div class="card-body">
                <div class="media align-items-center">
                    <div class="avatar avatar-icon avatar-lg avatar-gold">
                        <i class="anticon anticon-profile"></i>
                    </div>
                    <div class="m-l-15">
                        <h2 class="m-b-0 data-orders"> </h2>
                        <p class="m-b-0 text-muted">Tổng đơn hàng</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-6 col-lg-3">
        <div class="card">
            <div class="card-body">
                <div class="media align-items-center">
                    <div class="avatar avatar-icon avatar-lg avatar-purple">
                        <i class="anticon anticon-user"></i>
                    </div>
                    <div class="m-l-15">
                        <h2 class="m-b-0 data-customers"> </h2>
                        <p class="m-b-0 text-muted">Tổng khách hàng</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-6 col-lg-3">
        <div class="card">
            <div class="card-body">
                <div class="media align-items-center">
                    <div class="avatar avatar-icon avatar-lg avatar-cyan">
                        <i class="anticon anticon-gold"></i>
                    </div>
                    <div class="m-l-15">
                        <h2 class="m-b-0 data-products"> </h2>
                        <p class="m-b-0 text-muted">Tổng sản phẩm</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="card">
    <div class="card-body">
        <div class="d-flex justify-content-between align-items-center">
            <h5>Doanh thu tháng này</h5>
        </div>
        <div class="m-t-50" style="height: 330px">
            <div class="chartjs-size-monitor">
                <div class="chartjs-size-monitor-expand">
                    <div class=""></div>
                </div>
                <div class="chartjs-size-monitor-shrink">
                    <div class=""></div>
                </div>
            </div>
            <canvas class="chart chartjs-render-monitor" id="revenue-chart" style="display: block; width: 989px; height: 330px;" width="989" height="330"></canvas>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12 col-lg-8">
        <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h5 class="m-b-0 ">Đơn hàng tháng này</h5>
                    </div>
                </div>
                <div class="m-t-50" style="height: 375px">
                    <div class="chartjs-size-monitor">
                        <div class="chartjs-size-monitor-expand">
                            <div class=""></div>
                        </div>
                        <div class="chartjs-size-monitor-shrink">
                            <div class=""></div>
                        </div>
                    </div>
                    <canvas class="chart chartjs-render-monitor" id="avg-profit-chart" style="display: block; width: 454px; height: 375px;" width="454" height="375"></canvas>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-12 col-lg-4">
        <div class="card">
            <div class="card-body">
                <h5 class="m-b-0">Trạng thái đơn hàng</h5>
                <div class="m-v-60 text-center" style="height: 200px">
                    <div class="chartjs-size-monitor">
                        <div class="chartjs-size-monitor-expand">
                            <div class=""></div>
                        </div>
                        <div class="chartjs-size-monitor-shrink">
                            <div class=""></div>
                        </div>
                    </div>
                    <canvas class="chart chartjs-render-monitor" id="customers-chart" style="display: block; width: 454px; height: 200px;" width="454" height="200"></canvas>
                </div>
                <div class="row border-top p-t-25">
                    <div class="col-4">
                        <div class="d-flex justify-content-center">
                            <div class="media align-items-center">
                                <span class="badge badge-success badge-dot m-r-10"></span>
                                <div class="m-l-5">
                                    <h4 class="m-b-0 data-finished"> </h4>
                                    <p class="m-b-0 muted">Đã hoàn thiện</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="d-flex justify-content-center">
                            <div class="media align-items-center">
                                <span class="badge badge-secondary badge-dot m-r-10"></span>
                                <div class="m-l-5">
                                    <h4 class="m-b-0 data-processing"> </h4>
                                    <p class="m-b-0 muted">Đang xử lí</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="d-flex justify-content-center">
                            <div class="media align-items-center">
                                <span class="badge badge-warning badge-dot m-r-10"></span>
                                <div class="m-l-5">
                                    <h4 class="m-b-0 data-waiting"> </h4>
                                    <p class="m-b-0 muted">Đang chờ</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection()


@section('js')

<script src="{{ asset('manager/assets/js/page/statistic.js') }}"></script>

@endsection()