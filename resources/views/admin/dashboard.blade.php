@extends('layouts.app')

@section('title','Dashboard')

@section('admin-content')

<!-- Main content -->
<section class="content">
    <div class="row">								
        <div class="col-xl-4 col-12">
            <div class="box">
                <div class="box-header no-border">
                    <h3 class="box-title">Total Booking</h3>
                </div>
                <div class="box-body py-0 px-0">
                    <div class="chart" id="totalcases"></div>
                </div>
            </div>
        </div>
        <div class="col-xl-4 col-12">
            <div class="box">
                <div class="box-header no-border">
                    <h3 class="box-title">In status</h3>
                </div>
                <div class="box-body py-0 px-0">
                    <div class="chart" id="settledcases"></div>
                </div>
            </div>
        </div>
    </div>			
</section>
<!-- /.content -->
@endsection
