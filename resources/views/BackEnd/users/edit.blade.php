@extends('BackEnd.layouts.default')
@section('content')
<div class="row">
    <div class="col-md-12 pt-1">
        <h2 class="admin_title">Edit new user</h2>
    </div>    
</div>

<div class="row">
    <div class="col-md-12 pt-4 pb-4">
            {!! Form::model( $user, [
                'method' => 'PATCH',
                'action' => array('BackEnd\UserController@update', $user->id),
                'role' => 'form', 'class' => '',
                'files' => true
            ]) !!}  
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
                        @php $valid = $errors->has('email')?'is-invalid':''; @endphp
                        <label for="email">Email</label>
                        {!! Form::text('email', old('email'), ['class' => "form-control $valid", 'placeholder' => 'Email']) !!}
                        <div class="invalid-feedback"> {{ $errors->first('email') }} </div>
                    </div>                      
                </div>
                <div class="form-row">  
                    <div class="col-md-7 mb-3 text-right">    
                        <a class="btn btn-primary" href="/admin/category" role="button">Back</a>          
                        <button class="btn btn-success" type="submit">Update</button>
                    </div>
                </div>    
            {!! Form::close() !!}
    </div>    
</div>
@stop