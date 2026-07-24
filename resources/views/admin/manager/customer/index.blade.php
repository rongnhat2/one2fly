@extends('admin.layout')
@section('title', 'khách hàng')
@section('menu-data')
<input type="hidden" name="" class="menu-data" value="customer-group | customer">
@endsection()


@section('css')

@endsection()


@section('body')


<div class="page-header no-gutters has-tab">
    <div class="d-md-flex m-b-15 align-items-center justify-content-between notification relative" id="notification">
        <div class="media align-center justify-content-between m-b-15 w-100">
            <div class="m-l-15">
                <h4 class="m-b-0">Danh sách khách hàng</h4>
            </div>
            @include('admin.alert')
        </div>
    </div>
</div>
<div class="card data-custom-tab on-show" data-tab-name="Table">
    <div class="card-body">
        <div class="row">
            <div class="col-sm-12 col-md-6">

            </div>
            <div class="col-sm-12 col-md-6">

            </div>
        </div>
        <div class="m-t-25">
            <table id="data-table" class="table"> </table>
        </div>
    </div>
</div>

@include('admin.manager.customer.create')
@include('admin.manager.customer.delete')
<div class="data-custom-tab" data-tab-name="Update" id="popup-update"> </div>
<div class="data-custom-tab" data-tab-name="Delete" id="popup-delete"> </div>
<div class="data-custom-tab" data-tab-name="Create" id="popup-create"> </div>

@endsection()


@section('js')

<script src="{{ asset('manager/assets/js/page/customer.js') }}"></script>

@endsection()