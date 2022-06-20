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
            {!! Form::open(['method'=>'POST','action'=>'InventoryController@getResult']) !!}
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
                                        <th class="text-center">Available</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($products as $product)
                                    @php
                                        $available = ($product->onhand->on_hand + $product->requisitions->sum('qty')) - ($product->delivered->where('isPulledout',0)->sum('qty_delivered') + $product->delivered->where('isPulledout',1)->sum('qty_used'));
                                    @endphp
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $product->catalog_no }}</td>
                                        <td>{{ $product->description }}</td>
                                        <td>{{ $product->onhand->on_hand }}</td>
                                        <td>{{ $product->requisitions->sum('qty') }}</td>
                                        <td>{{ $product->delivered->where('isPulledout',0)->sum('qty_delivered') }}</td>
                                        <td>{{ $product->delivered->where('isPulledout',1)->sum('qty_used') }}</td>
                                        <td class="text-center">{{ $available }}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-sm btn-primary"><i class="fa fa-print"></i> Generate Result</button>
                </div>
            </section>
            {!! Form::close() !!}
        </div>
    </div>
</section>
@endsection