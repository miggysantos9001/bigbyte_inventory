@extends('layouts.master')
@section('content')
<section role="main" class="content-body">
    <header class="page-header">
        <h2>Product Inventory Module</h2>
    </header> 
    <div class="row">
        <div class="col-12 mb-2">
            @include('alert')
            {{-- <a href="{{ route('products.create') }}" class="btn btn-primary btn-sm"><i class="fa fa-plus-circle"></i> Create Entry</a> --}}
        </div>
        <div class="col-12">
            {!! Form::open(['method'=>'POST','action'=>'InventoryController@printResult']) !!}
            <input type="hidden" value="{{ $df }}" name="df">
            <input type="hidden" value="{{ $dt }}" name="dt">
            <input type="hidden" value="{{ $subtwo }}" name="subtwo">
            <section class="card">
                <header class="card-header">
                    <div class="card-actions">
                        <a href="#" class="card-action card-action-toggle" data-card-toggle></a>
                        <a href="#" class="card-action card-action-dismiss" data-card-dismiss></a>
                    </div>
                    <h4 class="card-title">Search Result Products</h4>
                </header>
                <div class="card-body">
                    <div class="row">
                        <div class="col-12">
                            <table class="table table-sm table-condensed table-striped" style="text-transform: uppercase;">
                                <thead>
                                    <tr>
                                        <th class="text-center">#</th>
                                        <th class="text-center">Catalog #</th>
                                        <th class="text-center">Description</th>
                                        <th class="text-center">Beginning Balance</th>
                                        <th class="text-center">Purchased</th>
                                        <th class="text-center">Floating</th>
                                        <th class="text-center">Used</th>
                                        <th class="text-center">Lost</th>
                                        <th class="text-center">Damaged</th>
                                        <th class="text-center">Available</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($list as $l)
                                    <tr>
                                        <td>{{ $l['count'] }}</td>
                                        <td>{{ $l['catalog_no'] }}</td>
                                        <td>{{ $l['description'] }}</td>
                                        <td>{{ $l['p_onhand'] }}</td>
                                        <td>{{ $l['p_add'] }}</td>
                                        <td>{{ $l['p_delivered'] }}</td>
                                        <td>{{ $l['p_used'] }}</td>
                                        <td>{{ $l['p_missing'] }}</td>
                                        <td>{{ $l['p_damage'] }}</td>
                                        <td class="text-center">{{ $l['available'] }}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-sm btn-primary"><i class="fa fa-print"></i> Print Result</button>
                    <a href="{{ route('inventory.index') }}" class="btn btn-sm btn-success"><i class="fa fa-home"></i> Back to Index</a>
                </div>
            </section>
            {!! Form::close() !!}
        </div>
    </div>
</section>
@endsection