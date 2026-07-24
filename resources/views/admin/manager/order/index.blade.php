@extends('admin.layout')
@section('title', 'Đơn hàng')
@section('menu-data')
<input type="hidden" name="" class="menu-data" value="order-group | order">
@endsection()


@section('css')

@endsection()


@section('body')


<div class="page-header no-gutters has-tab">
    <div class="d-md-flex m-b-15 align-items-center justify-content-between notification relative" id="notification">
        <div class="media align-center justify-content-between m-b-15 w-100">
            <div class="m-l-15">
                <h4 class="m-b-0">Danh sách đơn hàng</h4>
            </div>
            @include('admin.alert')
        </div>
    </div>
</div>
<div class="card data-custom-tab on-show" data-tab-name="Table">
    <div class="card-body">
        <div class="form-row">
            <div class="form-group col-md-2">
                <label class="font-weight-semibold" for="language">Trạng thái đơn hàng</label>
                <select id="order-status" class="form-control">
                    <option value="-1">Tất cả trạng thái</option>
                    <option value="0">Chờ xác nhận</option>
                    <option value="1">Đã xác nhận</option>
                    <option value="2">Chưa hoàn thiện</option>
                    <option value="3">Đã hoàn thiện</option>
                    <option value="4">Đang lấy hàng</option>
                    <option value="5">Đang giao hàng</option>
                    <option value="6">Đã giao hàng</option>
                    <option value="7">Đã nhận hàng</option>
                    <option value="8">Đã hủy</option>
                </select>
            </div>
        </div>
        <div class="m-t-25">
            <table id="data-table" class="table"> </table>
        </div>
    </div>
</div>

@include('admin.manager.order.view')
<div class="data-custom-tab" data-tab-name="View" id="popup-view"> </div>

@endsection()


@section('js')

<script src="{{ asset('manager/assets/js/page/order.js') }}"></script>

@endsection()