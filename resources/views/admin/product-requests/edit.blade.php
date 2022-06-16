@extends('layouts.master')
@section('content')
<section role="main" class="content-body">
    <header class="page-header">
        <h2>Product Requisition Module</h2>
    </header> 
    {!! Form::model($request,['method'=>'PATCH','action'=>['ProductRequestController@update',$request->id]]) !!}
    <div class="row">
        <div class="col-12 mb-2">
            @include('alert')
            <a href="{{ route('product-requests.index') }}" class="btn btn-primary btn-sm"><i class="fa fa-home"></i> Back to Main</a>
        </div>
        <div class="col-4">
            <section class="card">
                <header class="card-header">
                    <div class="card-actions">
                        <a href="#" class="card-action card-action-toggle" data-card-toggle></a>
                        <a href="#" class="card-action card-action-dismiss" data-card-dismiss></a>
                    </div>
                    <h4 class="card-title">Update Requistion</h4>
                </header>
            </section>
            <div class="card-body">
                <div class="row">
                    <div class="col-12">
                        <div class="form-group">
                            {!! Form::label('','Request Date') !!}
                            {!! Form::date('date',null,['class'=>'form-control form-control-sm']) !!}
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
                <button type="submit" class="btn btn-sm btn-primary"><i class="fa fa-save"></i> Update Entry</button>
            </div>
        </div>
        <div class="col-8">
            <section class="card">
                <header class="card-header">
                    <div class="card-actions">
                        <a href="#" class="card-action card-action-toggle" data-card-toggle></a>
                        <a href="#" class="card-action card-action-dismiss" data-card-dismiss></a>
                    </div>
                    <h4 class="card-title">Product Requisition Items</h4>
                </header>
            </section>
            <div class="card-body">
                <table class="table table-condensed" id="prodtable" style="text-transform: uppercase;font-size: 11px;">
                    <thead>
                        <tr>
                            <th class="text-center">#</th>
                            <th class="text-center">Catalog Num</th>
                            <th class="text-center">Product Description</th>
                            <th class="text-center" width="50">Quantity</th>
                            <th class="text-center" width="50">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($request->request_items as $row)
                        <tr>
                            <td class="text-center">{{ $loop->iteration }}</td>
                            <td class="text-center">{{ $row->product->catalog_no }}</td>
                            <td class="text-center">{{ $row->product->description }}</td>
                            <td class="text-center">
                                <input type="hidden" name="product_id[]" class="form-control form-control-sm" value="{{ $row->product_id }}" style="width:50px;text-align:center;" >
                                <input type="text" name="qty[]" class="form-control form-control-sm" value="{{ $row->qty }}" style="width:50px;text-align:center;" >
                            </td>
                            <td class="text-center">
                                <a href="#delete{{ $row->id }}" data-bs-toggle="modal" class="btn btn-xs btn-danger"><i class="fa fa-trash"></i></a>
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
@foreach ($request->request_items as $row)
<div id="delete{{ $row->id }}" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title style1" id="exampleLargeModalLabel">Delete Entry</h5>
            </div>
            <div class="modal-body">
                <div class="row mb-3">
                    <div class="col-md-12">
                        <h3 class="text-center">Are you sure you want to delete this entry?</h3>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <a href="{{ route('product-request.delete-request-item',$row->id) }}" class="btn btn-sm btn-primary"><i class="fa fa-trash"></i> Delete Entry</a>
            </div>
        </div>
    </div>
</div>
@endforeach
@endpush