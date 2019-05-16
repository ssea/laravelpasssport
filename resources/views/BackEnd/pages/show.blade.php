@extends('BackEnd.layouts.default')
@section('content')
<div class="row">
    <div class="col-md-12 pt-1">
        <h2 class="admin_title">{{ $page->title }}</h2>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        <p class="text-right"> created at {{ $page->created_at }}</p>
        {!! $page->description !!}
    </div>
</div>
@include('includes.modal_delete')
@stop
