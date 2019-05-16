@extends('BackEnd.layouts.default')
@section('content')
<div class="row">
    <div class="col-md-12 pt-1">
        <h2 class="admin_title">Create new page</h2>
    </div>
</div>

<div class="row">
    <div class="col-md-12 pt-4 pb-4">
            {!! Form::open(array('url' => '/admin/page', 'class' => '', 'files' => true)) !!}
                <div class="form-row">
                    <div class="col-md-7 mb-3">
                        @php $valid = $errors->has('title')?'is-invalid':''; @endphp
                        <label for="title">Titile</label>
                        {!! Form::text('title', old('title'), ['class' => "form-control $valid", 'placeholder' => 'Title']) !!}
                        <div class="invalid-feedback"> {{ $errors->first('title') }} </div>
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-md-7 mb-3">
                        @php $valid = $errors->has('page_id')?'is-invalid':''; @endphp
                        <label for="page_id">Parent</label>
                        {!! Form::select('page_id', (['0' => 'Choose one'] + $pages->toArray()), null, ['class' => "custom-select $valid"]) !!}
                        <div class="invalid-feedback"> {{ $errors->first('page_id') }} </div>
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
                        <a class="btn btn-primary" href="/admin/page" role="button">Back</a>
                        <button class="btn btn-success" type="submit">Create</button>
                    </div>
                </div>
            {!! Form::close() !!}
    </div>
</div>
@stop
