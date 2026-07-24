@extends('admin.layout')
@section('title', 'Quản lí kho')
@section('menu-data')
    <input type="hidden" name="" class="menu-data" value="warehouse-group | warehouse">
@endsection()


@section('css')

@endsection()


@section('body')

    <div class="container-fluid py-3">
        <div class="row">
            <!-- Sidebar: Quản lý chức năng -->
            <div class="col-lg-2 col-md-3 mb-4">
                <div class="list-group">
                    <a href="#" class="list-group-item list-group-item-action active" data-tab="import-stock"
                        data-bs-toggle="tab">
                        <i class="fa fa-arrow-down mr-2"></i> Nhập kho
                    </a>
                    <a href="#" class="list-group-item list-group-item-action" data-tab="export-stock" data-bs-toggle="tab">
                        <i class="fa fa-arrow-up mr-2"></i> Xuất kho
                    </a>
                    <!-- <a href="#" class="list-group-item list-group-item-action" data-tab="transfer-stock" data-bs-toggle="tab">
                        <i class="fa fa-exchange-alt mr-2"></i> Điều chuyển kho
                    </a> -->
                    <!-- <a href="#" class="list-group-item list-group-item-action" data-tab="stock-history" data-bs-toggle="tab">
                        <i class="fa fa-history mr-2"></i> Lịch sử kho
                    </a> -->
                </div>
            </div>
            <!-- Content: Tab panes -->
            <div class="col-lg-10 col-md-9">
                <div class=" ">

                    <!-- Nhập kho -->
                    <div class="group-item" id="import-stock">
                        @include('admin.manager.warehouse.stockInTable')
                        @include('admin.manager.warehouse.stockInCreate')
                        @include('admin.manager.warehouse.stockInView')
                        <div class="" data-tab-name="StockInTable" id="popup-stock-in-table"> </div>
                        <div class="" data-tab-name="StockInCreate" id="popup-stock-in-create"> </div>
                        <div class="" data-tab-name="StockInView" id="popup-stock-in-view"> </div>
                    </div>

                    <!-- Xuất kho -->
                    <div class="group-item d-none" id="export-stock">
                        @include('admin.manager.warehouse.stockOutTable')
                        @include('admin.manager.warehouse.stockOutView')
                        <div class="" data-tab-name="StockOutTable" id="popup-stock-out-table"> </div>
                        <div class="" data-tab-name="StockOutView" id="popup-stock-out-view"> </div>

                    </div>

                    <!-- Điều chuyển kho -->
                    <div class="group-item d-none" id="transfer-stock">
                        @include('admin.manager.warehouse.stockTranferTable')
                        @include('admin.manager.warehouse.stockTranferCreate')
                    </div>

                    <!-- Lịch sử kho -->
                    <div class="group-item d-none" id="stock-history">
                        @include('admin.manager.warehouse.stockHistoryTable')
                        @include('admin.manager.warehouse.stockHistoryDetail')
                        <h5 class="mb-3"><i class="fi-rs-clock-history mr-2"></i> Lịch sử hoạt động kho</h5>
                        <div class="mb-2">
                            <label>Lọc theo loại/thời gian</label>
                            <div class="row">
                                <div class="col-md-3">
                                    <select class="form-select">
                                        <option>Tất cả</option>
                                        <option>Nhập kho</option>
                                        <option>Xuất kho</option>
                                        <option>Điều chuyển</option>
                                        <option>Kiểm kho</option>
                                        <option>Điều chỉnh</option>
                                    </select>
                                </div>
                                <div class="col-md-3">
                                    <input type="date" class="form-control" />
                                </div>
                                <div class="col-md-3">
                                    <input type="date" class="form-control" />
                                </div>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-sm table-striped">
                                <thead>
                                    <tr>
                                        <th>Thời gian</th>
                                        <th>Hoạt động</th>
                                        <th>Người thực hiện</th>
                                        <th>Chi tiết</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>10/06/2024 10:15</td>
                                        <td>Nhập kho</td>
                                        <td>Nguyễn Văn A</td>
                                        <td>Nhập 20 áo thun nam cho kho Chi nhánh 1</td>
                                    </tr>
                                    <tr>
                                        <td>11/06/2024 08:31</td>
                                        <td>Xuất kho</td>
                                        <td>Nguyễn Văn B</td>
                                        <td>Xuất bán 5 bánh quy</td>
                                    </tr>
                                    <!-- ... -->
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>





@endsection()


@section('js')

    <script src="{{ asset('manager/assets/js/page/warehouse.js') }}"></script>
    <script src="{{ asset('manager/assets/js/page/warehouseStockIn.js') }}"></script>
    <script src="{{ asset('manager/assets/js/page/warehouseStockOut.js') }}"></script>

@endsection()