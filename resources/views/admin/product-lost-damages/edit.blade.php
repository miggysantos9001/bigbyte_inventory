@extends('layouts.master')
@section('content')
<section role="main" class="content-body">
    <header class="page-header">
        <h2>Product Lost & Damage Module</h2>
    </header> 
    {!! Form::model($lost,['method'=>'PATCH','action'=>['ProductMissingDamageController@update',$lost->id]]) !!}
    <div class="row">
        <div class="col-12 mb-2">
            @include('alert')
            <a href="{{ route('product-missing-damages.index') }}" class="btn btn-primary btn-sm"><i class="fa fa-home"></i> Back to Main</a>
        </div>
        <div class="col-4">
            <section class="card">
                <header class="card-header">
                    <div class="card-actions">
                        <a href="#" class="card-action card-action-toggle" data-card-toggle></a>
                        <a href="#" class="card-action card-action-dismiss" data-card-dismiss></a>
                    </div>
                    <h4 class="card-title">Product Lost & Damage Form</h4>
                </header>
            </section>
            <div class="card-body">
                <div class="row">
                    <div class="col-12">
                        <div class="form-group">
                            {!! Form::label('','Date') !!}
                            {!! Form::date('date',\Carbon\Carbon::now()->toDateString(),['class'=>'form-control form-control-sm']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('','Select Branch') !!}
                            {!! Form::select('branch_id',$branches,null,['class'=>'select2 form-control form-control-sm','placeholder'=>'-- Select One --','style'=>'width:100%;']) !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-8">
            <section class="card">
                <header class="card-header">
                    <div class="card-actions">
                        <a href="#" class="card-action card-action-toggle" data-card-toggle></a>
                        <a href="#" class="card-action card-action-dismiss" data-card-dismiss></a>
                    </div>
                    <h4 class="card-title">Lost & Damaged Product Items</h4>
                </header>
            </section>
            <div class="card-body">
                <table class="table table-condensed" id="prodtable" style="text-transform: uppercase;font-size: 11px;">
                    <thead>
                        <tr>
                            <th class="text-center">#</th>
                            <th class="text-center">Catalog Num</th>
                            <th class="text-center">Product Description</th>
                            <th class="text-center" width="50">Missing</th>
                            <th class="text-center" width="50">Damage</th>
                            <th class="text-center" width="50">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($lost->lost_items as $row)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $row->product->catalog_no }}</td>
                            <td>{{ $row->product->description }}</td>
                            <td>
                                {!! Form::text('missing[]',$row->missing,['class'=>'form-control form-control-sm']) !!}
                            </td>
                            <td>
                                {!! Form::text('damage[]',$row->damage,['class'=>'form-control form-control-sm']) !!}
                            </td>
                            <td class="text-center">
                                <a href="{{ route('lost.delete',$row->id) }}" class="btn btn-xs btn-danger"><i class="fa fa-trash"></i></a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <button type="submit" class="btn btn-sm btn-success"><i class="fa fa-save"></i> Save Entry</button>
            </div>
        </div>
    </div>
    {!! Form::close() !!}
</section>
@endsection