@extends('layouts.master')
@section('content')
<section role="main" class="content-body">
    <header class="page-header">
        <h2>Product Requisition Module</h2>
    </header> 
    {!! Form::open(['method'=>'POST','action'=>'ProductRequestController@storeRequest']) !!}
    <div class="row">
        <div class="col-12 mb-2">
            @include('alert')
            <a href="{{ route('product-requests.create') }}" class="btn btn-primary btn-sm"><i class="fa fa-home"></i> Back to Main</a>
            <a data-bs-target="#add" data-bs-toggle="modal" class="btn btn-sm btn-success"><i class="fa fa-shopping-cart"></i> View Cart</a>
        </div>
        <div class="col-4">
            <section class="card">
                <header class="card-header">
                    <div class="card-actions">
                        <a href="#" class="card-action card-action-toggle" data-card-toggle></a>
                        <a href="#" class="card-action card-action-dismiss" data-card-dismiss></a>
                    </div>
                    <h4 class="card-title">Step 2: Complete Requistion</h4>
                </header>
            </section>
            <div class="card-body">
                <div class="row">
                    <div class="col-12">
                        <div class="form-group">
                            {!! Form::label('','Request Date') !!}
                            {!! Form::date('date',\Carbon\Carbon::now()->toDateString(),['class'=>'form-control form-control-sm']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('','Select Branch') !!}
                            {!! Form::select('branch_id',$branches,null,['class'=>'select2 form-control form-control-sm','placeholder'=>'-- Select One --']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('','Select Supplier') !!}
                            {!! Form::select('supplier_id',$suppliers,null,['class'=>'select2 form-control form-control-sm','placeholder'=>'-- Select One --']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('','Requested By') !!}
                            {!! Form::text('user_name',Auth::user()->name,['class'=>'form-control form-control-sm','readonly']) !!}
                            {!! Form::hidden('user_id',Auth::user()->id,['class'=>'form-control form-control-sm','readonly']) !!}
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-sm btn-primary"><i class="fa fa-save"></i> Save Entry</button>
            </div>
        </div>
        <div class="col-8">
            <section class="card">
                <header class="card-header">
                    <div class="card-actions">
                        <a href="#" class="card-action card-action-toggle" data-card-toggle></a>
                        <a href="#" class="card-action card-action-dismiss" data-card-dismiss></a>
                    </div>
                    <h4 class="card-title">Cart Items</h4>
                </header>
            </section>
            <div class="card-body">
                <table class="table table-condensed" id="prodtable" style="text-transform: uppercase;font-size: 11px;">
                    <thead>
                        <tr>
                            <th class="text-center" width="50">#</th>
                            <th class="text-center">Catalog Num</th>
                            <th class="text-center">Product Description</th>
                            <th class="text-center" width="50">Quantity</th>
                            <th class="text-center" width="150">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach (session('cart') as $products)
                        <tr class="text-center">
                            <td class="text-center">{{ $loop->iteration }}</td>
                            <td class="text-center">{{ $products['catalog_num'] }}</td>
                            <td class="text-center">{{ $products['description'] }}</td>
                            <td class="text-center">
                                <input type="hidden" name="product_id[]" class="form-control form-control-sm" value="{{ $products['product_id'] }}" style="width:50px;text-align:center;" >
                                <input type="text" name="qty[]" class="form-control form-control-sm" value="{{ $products['qty'] }}" style="width:50px;text-align:center;" >
                            </td>
                            <td class="text-center">
                                <a href="{{ route('product-request.remove-to-cart',$products['product_id']) }}" class="btn btn-xs btn-danger"><i class="fa fa-trash"></i></a>
                            </td>
                        </tr>    
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    {!! Form::close() !!}
</section>
@endsection
@push('modals')
<div id="add" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title style1" id="exampleLargeModalLabel">View Cart Items</h5>
            </div>
            <div class="modal-body">
                <div class="row mb-3">
                    <div class="col-md-12">
                        @if(session('cart'))
                        <table class="table table-condensed table-striped table-sm" style="text-transform: uppercase;">
                            <thead> 
                                <tr>
                                    <th class="text-center">#</th>
                                    <th class="text-center">Catalog #</th>
                                    <th class="text-center">Product Description</th>
                                    <th class="text-center">Quantity</th>
                                    <th class="text-center" width="50px;">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach (session('cart') as $products)
                                <tr>
                                    <td class="text-center">{{ $loop->iteration }}</td>
                                    <td class="text-center">{{ $products['catalog_num'] }}</td>
                                    <td class="text-center">{{ $products['description'] }}</td>
                                    <td class="text-center">{{ $products['qty'] }}</td>
                                    <td class="text-center">
                                        <a href="{{ route('product-request.remove-to-cart',$products['product_id']) }}" class="btn btn-xs btn-danger"><i class="fa fa-trash"></i></a>
                                    </td>
                                </tr>    
                                @endforeach
                            </tbody>
                        </table>
                        @else
                        <h3 class="text-center">EMPTY CART</h3>
                        @endif
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary btn-sm" data-bs-dismiss="modal"><i class="fa fa-window-close"></i> Close</button>
            </div>
        </div>
    </div>
</div>
@endpush