@extends('layouts.master')
@section('content')
<section role="main" class="content-body">
    <header class="page-header">
        <h2>Products Module</h2>
    </header> 
    <div class="row">
        <div class="col-12">
            @include('alert')
        </div>
        <div class="col-4">
            <section class="card">
                {!! Form::model($product,['method'=>'PATCH','action'=>['ProductController@update',$product->id]]) !!}
                <header class="card-header">
                    <div class="card-actions">
                        <a href="#" class="card-action card-action-toggle" data-card-toggle></a>
                        <a href="#" class="card-action card-action-dismiss" data-card-dismiss></a>
                    </div>
                    <h4 class="card-title">Update Product Beginning On-hand</h4>
                </header>
                <div class="card-body">
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group">
                                {!! Form::label('','Request Date') !!}
                                {!! Form::date('date',\Carbon\Carbon::now()->toDateString(),['class'=>'form-control form-control-sm']) !!}
                            </div>
                            <div class="form-group">
                                {!! Form::label('','On-hand') !!}
                                {!! Form::text('on_hand',($product->onhand == NULL) ? '0' : $product->onhand->on_hand,['class'=>'form-control form-control-sm']) !!}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary btn-sm"><i class="fa fa-save"></i> Save Entry</button>
                    <a href="{{ route('products.index') }}" class="btn btn-success btn-sm"><i class="fa fa-home"></i> Back to Main</a>
                </div>
                {!! Form::close() !!}
            </section>
        </div>
    </div>
</section>
@endsection
@push('js')
@endpush