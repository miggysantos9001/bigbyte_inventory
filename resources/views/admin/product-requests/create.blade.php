@extends('layouts.master')
@section('content')
<section role="main" class="content-body">
    <header class="page-header">
        <h2>Product Requisition Module</h2>
    </header> 
    {!! Form::open(['method'=>'POST','action'=>'ProductRequestController@addtoCart']) !!}
    <div class="row">
        <div class="col-12 mb-2">
            @include('alert')
            <a href="{{ route('product-requests.index') }}" class="btn btn-primary btn-sm"><i class="fa fa-home"></i> Back to Main</a>
            <a data-bs-target="#add" data-bs-toggle="modal" class="btn btn-sm btn-success"><i class="fa fa-shopping-cart"></i> View Cart</a>
        </div>
        <div class="col-4">
            <section class="card">
                <header class="card-header">
                    <div class="card-actions">
                        <a href="#" class="card-action card-action-toggle" data-card-toggle></a>
                        <a href="#" class="card-action card-action-dismiss" data-card-dismiss></a>
                    </div>
                    <h4 class="card-title">Step 1: Create Requistion</h4>
                </header>
            </section>
            <div class="card-body">
                <div class="row">
                    <div class="col-12">
                        <div class="form-group">
                            {!! Form::label('','Select Category') !!}
                            {!! Form::select('category_id',$categories,null,['class'=>'select2 form-control form-control-sm','placeholder'=>'-- Select One --','id'=>'combo1','style'=>'width:100%;']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('subone_id','Select Category Level One:') !!}
                            <select class="select2 form-control form-control-sm" name="subone_id" id="combo2" style="width:100%;">                     
                            </select>
                        </div>
                        <div class="form-group">
                            {!! Form::label('subtwo_id','Select Category Level Two:') !!}
                            <select class="select2 form-control form-control-sm" name="subtwo_id" id="combo3" style="width:100%;"></select>
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
                    <h4 class="card-title">Select Product Items</h4>
                </header>
            </section>
            <div class="card-body">
                <table class="table table-condensed" id="prodtable" style="text-transform: uppercase;font-size: 11px;">
                    <thead>
                        <tr>
                            <th class="text-center" width="50"><i class="fa fa-check"></i></th>
                            <th class="text-center">Catalog Num</th>
                            <th class="text-center">Product Description</th>
                            <th class="text-center" width="50">Quantity</th>
                        </tr>
                    </thead>
                    <tbody>
                        
                    </tbody>
                </table>
                <button type="submit" class="btn btn-sm btn-success"><i class="fa fa-cart-plus"></i> Add to Cart</button>
                @if(session('cart'))
                <a href="{{ route('product-request.create-request') }}" class="btn btn-primary btn-sm"><i class="fa fa-forward"></i> Proceed to Next Step</a>
                @endif
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
@push('js')
<script>
    $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
    });

    var category_id = $('#combo1').val();
    var subone_id = $('#combo2').val(); 

    $.ajax({    //create an ajax request to load_page.php
        type: 'GET',
        url: "{{ action('ProductController@loadsubone') }}",//php file url diri     
        dataType: "json",    
        data: { combobox1 : category_id },
        success: function(response){
            $("#combo2").append('<option value="">-- Select One --</option>');
            $.each(response,function(index,value){
                $("#combo2").append('<option value="'+value.id+'">'+value.name+'</option>');
          
           });            
        }
    });

    $('#combo1').change(function() {
        var combobox1 = $(this).val(); 
       $("#combo2").html("");
        $.ajax({    //create an ajax request to load_page.php
            type: 'GET',
            url: "{{ action('ProductController@loadsubone') }}",//php file url diri     
            dataType: "json",    
            data: { combobox1 : combobox1 },
            success: function(response){
                $("#combo2").append('<option value="">-- Select One --</option>')
                $.each(response,function(index,value){
                    $("#combo2").append('<option value="'+value.id+'">'+value.name+'</option>');
              
               });
            }
        });
    });

    $.ajax({    //create an ajax request to load_page.php
        type: 'GET',
        url: "{{ action('ProductController@loadsubtwo_lf') }}",//php file url diri     
        dataType: "json",    
        data: { combobox2 : subone_id },
        success: function(response){
            $("#combo3").append('<option value="">-- Select One --</option>');
            $.each(response,function(index,value){
                $("#combo3").append('<option value="'+value.id+'">'+value.name+'</option>');
          
           });            
        }
    });

    $('#combo2').change(function() {
        var combobox2 = $(this).val(); 
       $("#combo3").html("");
        $.ajax({    //create an ajax request to load_page.php
            type: 'GET',
            url: "{{ action('ProductController@loadsubtwo_lf') }}",//php file url diri     
            dataType: "json",    
            data: { combobox2 : combobox2 },
            success: function(response){
                $("#combo3").append('<option value="">-- Select One --</option>');
                $.each(response,function(index,value){
                    $("#combo3").append('<option value="'+value.id+'">'+value.name+'</option>');
              
               });
            }
        });
    });

    $('#combo3').change(function() {
        var combobox3 = $(this).val(); 
        $.ajax({    //create an ajax request to load_page.php
            type: 'GET',
            url: "{{ action('ProductController@loadproducts') }}",//php file url diri     
            dataType: "json",    
            data: { combobox3 : combobox3 },
            success: function(response){
                $("#prodtable tbody").html("");
                $.each(response,function(index,value){
                    data = '<tr>';
                    data += '<td align="center"><input type="checkbox" name="products['+index+'][product_id]" value="'+value.id+'" "class"="form-control" style="margin-top:5px;"></td>';
                    data += '<td>'+value.catalog_no+'</td>';
                    data += '<td>'+value.description+'</td>';
                    data += '<td><input type="text" name="products['+index+'][qty]" class="form-control form-control-sm" value="0" style="width:50px;text-align:center;" ></td>';
                    data += '</tr>';
                    $("#prodtable tbody").append(data);
                
                });
            }
        });
    });
</script>
@endpush