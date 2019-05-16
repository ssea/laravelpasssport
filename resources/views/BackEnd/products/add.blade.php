@extends('BackEnd.layouts.default')
@section('content')
<div class="row">
    <div class="col-md-12 pt-1">
        <h2 class="admin_title">Create new product</h2>
    </div>    
</div>

<div class="row">
    <div class="col-md-12 pt-4 pb-4">
            {!! Form::open(array('url' => '/admin/product', 'class' => '', 'files' => true)) !!}            
                <div class="form-row">
                    <div class="col-md-7 mb-3">
                        @php $valid = $errors->has('picture')?'is-invalid':''; @endphp
                        <label for="picture">Picture</label>
                        <input type="file" class="form-control-file {{ $valid }}" name="picture" id="picture" aria-describedby="fileHelp">
                        <small id="fileHelp" class="form-text text-muted">Please upload a valid image file. Size of image should not be more than 2MB.</small>
                        <div class="invalid-feedback"> {{ $errors->first('picture') }} </div>
                    </div>                      
                </div>   
                <div class="form-row">
                    <div class="col-md-7 mb-3">
                        @php $valid = $errors->has('category_id')?'is-invalid':''; @endphp
                        <label for="category_id">Category</label>
                        {!! Form::select('category_id', (['' => 'Choose one'] + $categories->toArray()), null, ['class' => "custom-select $valid"]) !!}
                        <div class="invalid-feedback"> {{ $errors->first('category_id') }} </div>
                    </div>                      
                </div>   
                <div class="form-row">
                    <div class="col-md-7 mb-3">
                        @php $valid = $errors->has('name')?'is-invalid':''; @endphp
                        <label for="name">Name</label>
                        {!! Form::text('name', old('name'), ['class' => "form-control $valid", 'placeholder' => 'Name']) !!}
                        <div class="invalid-feedback"> {{ $errors->first('name') }} </div>
                    </div>                      
                </div>
                <div class="form-row">
                    <div class="col-md-3 mb-3">
                        @php $valid = $errors->has('amount')?'is-invalid':''; @endphp
                        <label for="amount">Amount</label>
                        {!! Form::text('amount', old('amount', 1), ['class' => "form-control $valid", 'placeholder' => 'Amount']) !!}
                        <div class="invalid-feedback"> {{ $errors->first('amount') }} </div>
                    </div>       
                    <div class="col-md-4 mb-3">
                        @php $valid = $errors->has('unit_price')?'is-invalid':''; @endphp
                        <label for="unit_price">Unit Price</label>
                        {!! Form::text('unit_price', old('unit_price', 0), ['class' => "form-control $valid", 'placeholder' => 'Unit Price']) !!}
                        <div class="invalid-feedback"> {{ $errors->first('unit_price') }} </div>
                    </div>                   
                </div>
                <div class="form-row">
                    <div class="col-md-7 mb-3">
                        @php $valid = $errors->has('order')?'is-invalid':''; @endphp
                        <label for="order">Order</label>
                        {!! Form::text('order', old('order', 0), ['class' => "form-control $valid", 'placeholder' => 'Order']) !!}
                        <div class="invalid-feedback"> {{ $errors->first('order') }} </div>
                    </div>                      
                </div>
                <div class="form-row">
                    <div class="col-md-7 mb-3">
                        <label for="status">Status</label>
                        {!! Form::select('status', array(1 => 'Active', 0 => 'Inactive'), null, ['class' => 'custom-select']) !!}
                    </div>                      
                </div>    
                <div class="form-row">
                    <div class="col-md-12 mb-3">
                        <label for="description">Description</label>
                        {{ Form::textarea('description', old('description'),['data-compose-editor' => true, 'class' => "form-control", 'placeholder' => 'Description']) }}
                    </div>                      
                </div>  
                <div class="form-row">  
                    <div class="col-md-12 mb-3 text-right">    
                        <a class="btn btn-primary" href="/admin/product" role="button">Back</a>          
                        <button class="btn btn-success" type="submit">Create</button>
                    </div>
                </div>    
            {!! Form::close() !!}
    </div>    
</div>
@stop