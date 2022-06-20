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
                    <h4 class="card-title">Search Products</h4>
                </header>
                <div class="card-body">
                    <div class="row">
                        <div class="col-4">
                            <div class="form-group">
                                {!! Form::label('','Select Category') !!}
                                {!! Form::select('category_id',$categories,null,['class'=>'select2 form-control form-control-sm','placeholder'=>'-- Select One --','id'=>'combo1']) !!}
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="form-group">
                                {!! Form::label('subone_id','Select Category Level One:') !!}
                                <select class="select2 form-control form-control-sm" name="subone_id" id="combo2">                     
                                </select>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="form-group">
                                {!! Form::label('subtwo_id','Select Category Level Two:') !!}
                                <select class="select2 form-control form-control-sm" name="subtwo_id" id="combo3"></select>
                            </div>
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
                    data += '<td>'+value.description+'</td>';
                    data += '<td class="text-center"><a href="products/'+value.id+'/edit" class="btn btn-primary btn-xs"><i class="fa fa-edit"></i></a></td>';
                    data += '</tr>';
                    $("#prodtable tbody").append(data);
                
                });
            }
        });
    });
</script>
@endpush