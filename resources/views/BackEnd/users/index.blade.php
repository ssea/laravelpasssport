@extends('BackEnd.layouts.default')
@section('content')
<div class="row">
    <div class="col-md-12 pt-1">
        <h2 class="admin_title">Users</h2>
    </div>
</div>

<div class="row">
    <div class="col-md-12 text-right pb-2">
        <a href="/admin/user/create" class="btn btn-success">Add new</a>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="table-responsive-md">
                <table class="table table-sm table-hover">
                    <thead class="thead-light">
                        <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Created At</th>
                        <th scope="col" class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($users as $row)
                        <tr>
                            <th scope="row">{{ $row->id }}</th>
                            <td>{{ $row->name }}</td>
                            <td>{{ $row->email }}</td>
                            <td>{{ $row->created_at }}</td>
                            <td class="text-right">
                                <a href="/admin/user/{{ $row->id }}/edit" role="button"><i class="fa fa-pencil-square" aria-hidden="true"></i></a>
                                {!! Html::decode(link_to( "/admin/user/$row->id",'<i class="fa fa-trash" aria-hidden="true"></i>', $attributes = array('class' => 'delete-btn', 'onClick'=>'return false;'))) !!}     
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
        </div>
    </div>
</div>
@include('includes.modal_delete')
@stop