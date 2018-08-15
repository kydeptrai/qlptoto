@extends('master')
@section('content')
<style type="text/css">
	.table td {
		vertical-align: middle;
	}
	.table a span {
		font-size: 12px;
	}
</style>
<!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Quản lý hóa đơn
                <!-- <small>Optional description</small> -->
            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Level</a></li>
                <li class="active">Here</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <!-- general form elements -->
                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <h3 class="box-title">Danh sách hóa đơn</h3>
                            <div class="pull-right">
                                <form>
                                    <input type="date" name="from_date" value="{{$from_date}}">
                                    <input type="date" name="to_date" value="{{$to_date}}">
                                    <button type="submit" class="btn btn-success">Xem dữ liệu</button>
                                </form>
                            </div>
                        </div>
                        <!-- /.box-header -->
                        <table id="pdf" class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>STT</th>
                                <th>Tên nhân viên</th>
                                <th>Tên khách hàng</th>
                                <th>Ngày tạo</th>
                                <th>Tổng tiền</th>
                                <th>Chi tiết</th>
                            </tr>
                            </thead>
                            <tbody>
                        	<?php $i=0;?>
                        	@foreach($bills as $bill)
                            <tr>
                                <td>{{++$i}}</td>
                                <td>{{$bill->employee_name}}</td>
                                <td>{{$bill->customer_name}}</td>
                                <td>{{date('d-m-Y',strtotime($bill->created_date))}}</td>
                                <td>{{number_format($bill->total_price)}} VNĐ</td>
                                <td class="hide-nhanvien">
                                    <a href="{{url(route('getListBillDetail',$bill->id )) }}"><span class="label label-warning">Chi tiết hóa đơn</span> </a>
                                    {{--<a href="{{url(route('deleteProduct',$p->id))}}" onclick="return confirm('Bạn chắc chắn muốn xóa bản ghi này?')"><span class="label label-danger"> Xóa</span></a>--}}
                                </td>
                            </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    <!-- /.box -->
                </div>
                <!--/.col (left) -->
            </div>
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection