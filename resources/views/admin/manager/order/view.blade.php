<div class="layout-tab-view">
    <input type="hidden" class="form-control data-id">
    <div class="row">
        <div class="col-md-12">

            <div class="row">
                <!-- Left Column: Customer & Delivery Info -->
                <div class="col-md-4">
                    <!-- Customer Information -->
                    <div class="card m-b-20">
                        <div class="card-body">
                            <h5><i class="anticon anticon-user"></i> Thông tin khách hàng</h5>
                            <div class="customer-info-box p-3 border rounded bg-light mb-4">
                                <div class="row align-items-center">
                                    <div class="col-auto">
                                        <div class="avatar avatar-lg rounded-circle overflow-hidden border">
                                            <img src="{{ asset('assets/images/avatars/thumb-1.jpg') }}" alt="Avatar" class="img-fluid">
                                        </div>
                                    </div>
                                    <div class="col">
                                        <h6 class="mb-1 font-weight-semibold customer-username"></h6>
                                        <div class="d-flex align-items-center mb-1">
                                            <i class="anticon anticon-mail text-primary mr-2"></i>
                                            <span class="customer-email small"></span>
                                        </div>
                                        <div class="d-flex align-items-center mb-1">
                                            <i class="anticon anticon-phone text-primary mr-2"></i>
                                            <span class="customer-phone small"></span>
                                        </div>
                                        <div class=" d-flex align-items-center">
                                            <i class="anticon anticon-environment text-primary mr-2 "></i>
                                            <span class="customer-address small"></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <h5><i class="anticon anticon-credit-card"></i> Thông tin thanh toán</h5>
                            <div class="m-b-15">
                                <div class="d-flex justify-content-between align-items-center m-b-10">
                                    <span class="">Phương thức thanh toán:</span>
                                    <span class="payment-method-badge badge badge-pill"></span>
                                </div>
                                <div class="d-flex justify-content-between align-items-center m-b-10">
                                    <span class="">Trạng thái thanh toán:</span>
                                    <span class="payment-status-badge badge badge-pill"></span>
                                </div>
                                <div class="d-flex justify-content-between align-items-center">
                                    <span class="">Ngày thanh toán:</span>
                                    <span class="payment-date font-weight-semibold"></span>
                                </div>
                            </div>
                            <h5><i class="anticon anticon-shopping-cart"></i> Tóm tắt đơn hàng</h5>
                            <div class="m-b-15">
                                <div class="d-flex justify-content-between align-items-center m-b-10">
                                    <span class="">Tạm tính:</span>
                                    <span class="total-price font-weight-semibold text-secondary"></span>
                                </div>
                                <div class="d-flex justify-content-between align-items-center m-b-10">
                                    <span class="">Giảm giá:</span>
                                    <span class="voucher-value font-weight-semibold text-warning"></span>
                                </div>
                                <hr>
                                <div class="d-flex justify-content-between align-items-center">
                                    <span class="font-weight-semibold">Tổng tiền:</span>
                                    <span class="real-price font-weight-bold text-success" style="font-size: 18px;"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Right Column: Order Summary -->
                <div class="col-md-8">
                    <!-- Order Status Timeline -->
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="form-group col-md-4">
                                    <!-- Trạng thái đơn hàng: <div class="badge badge-pill badge-cyan badge-status-order"></div> -->
                                </div>
                                <div class="form-group col-md-4">
                                    <select id="branch-select" class="form-control">

                                    </select>
                                </div>
                            </div>
                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th>STT</th>
                                            <th>Sản phẩm</th>
                                            <th class="text-center">Size</th>
                                            <th class="text-center">Số lượng</th>
                                            <th class="text-center">Kho</th>
                                            <th class="text-right">Đơn giá</th>
                                            <th class="text-right">Giảm giá</th>
                                            <th class="text-right">Thành tiền</th>
                                        </tr>
                                    </thead>
                                    <tbody class="order-items-list">
                                        <!-- Order items will be populated here -->
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-center">
                                <button class="btn btn-default mr-2 tab-action" atr="Table">
                                    <i class="anticon anticon-arrow-left"></i> Quay lại
                                </button>
                                <div class="status-action">

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


        </div>
    </div>
</div>