@extends('BackEnd.layouts.default')
@section('content')
<div class="row">
    <div class="col-md-12 pt-1">
        <h2 class="admin_title">Create new category</h2>
    </div>    
</div>

<div class="row">
    <div class="col-md-12 pt-4 pb-4">
            {!! Form::open(array('url' => '/admin/category', 'class' => '', 'files' => true)) !!}
                <div class="form-row">
                    <div class="col-md-7 mb-3">
                        @php $valid = $errors->has('name')?'is-invalid':''; @endphp
                        <label for="name">Name</label>
                        {!! Form::text('name', old('name'), ['class' => "form-control $valid", 'placeholder' => 'Name']) !!}
                        <div class="invalid-feedback"> {{ $errors->first('name') }} </div>
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
                    <div class="col-md-7 mb-3 text-right">    
                        <a class="btn btn-primary" href="/admin/category" role="button">Back</a>          
                        <button class="btn btn-success" type="submit">Create</button>
                    </div>
                </div>    
            {!! Form::close() !!}
    </div>    
</div>
@stop