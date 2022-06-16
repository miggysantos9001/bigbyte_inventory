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
        <div class="col-12">
            <section class="card">
                <header class="card-header">
                    <div class="card-actions">
                        <a href="#" class="card-action card-action-toggle" data-card-toggle></a>
                        <a href="#" class="card-action card-action-dismiss" data-card-dismiss></a>
                    </div>
                    <h4 class="card-title">Create Product</h4>
                </header>
                {!! Form::open(['method' => 'POST','action'=>'ProductController@store']) !!}
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
                    <div class="row mt-3">
                        <div class="col-6">
                            <div class="form-group">
                                {!! Form::label('','Catalog #') !!}
                                {!! Form::text('catalog_no',null,['class'=>'form-control form-control-sm']) !!}
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                {!! Form::label('','Select Unit of Measure') !!}
                                {!! Form::select('uom_id',['PC'=>'PC'],1,['class'=>'select2 form-control form-select-sm']) !!}
                            </div>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-12">
                            <div class="form-group">
                                {!! Form::label('','Description') !!}
                                {!! Form::text('description',null,['class'=>'form-control form-control-sm']) !!}
                            </div>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-4">
                            <div class="form-group">
                                {!! Form::label('','Capital USD') !!}
                                {!! Form::text('capital_usd','0.00',['class'=>'form-control form-control-sm cap_usd']) !!}
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                {!! Form::label('','Exchange Rate') !!}
                                {!! Form::text('exchange_rate','0.00',['class'=>'form-control form-control-sm rate']) !!}
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                {!! Form::label('','Capital PHP') !!}
                                {!! Form::text('capital_php','0.00',['class'=>'form-control form-control-sm cap_php']) !!}
                            </div>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-6">
                            <div class="form-group">
                                {!! Form::label('','Agent Price') !!}
                                {!! Form::text('agent_price','0.00',['class'=>'form-control form-control-sm']) !!}
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                {!! Form::label('','Outsource Price') !!}
                                {!! Form::text('outsource_price','0.00',['class'=>'form-control form-control-sm']) !!}
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

    $(document).ready(function() {
        $('.cap_usd,.rate').keyup(function(){
            var cap_usd =$(`.cap_usd`).val();
            var rate = $(`.rate`).val();
            var cap_php = parseFloat(cap_usd) * parseFloat(rate);

            $(`.cap_php`).val(cap_php.toFixed(2)); 
            
        });
    });
</script>
@endpush