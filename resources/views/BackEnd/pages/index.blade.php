@extends('BackEnd.layouts.default')
@section('content')
<div class="row">
    <div class="col-md-12 pt-1">
        <h2 class="admin_title">List News</h2>
    </div>
</div>


<div class="row">
    <div class="col-md-12 text-right pb-2">
        <a href="/admin/page/create" class="btn btn-success">Add new</a>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        <div class="table-responsive-md">
                <table class="table table-sm table-hover">
                    <thead class="thead-light">
                        <tr>
                        <th scope="col">#</th>
                        <th scope="col">Title</th>
                        <th scope="col">Parrent</th>
                        <th scope="col">Order</th>
                        <th scope="col">Status</th>
                        <th scope="col">Created At</th>
                        <th scope="col" class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($pages as $row)
                            <tr>
                                <th scope="row">{{ $row->id }}</th>
                                <td>{{ $row->title }}</td>
                                <td></td>
                                <td class="text-right">{{ $row->order }}</td>
                                <td>{{ $row->status }}</td>
                                <td>{{ $row->created_at }}</td>
                                <td class="text-right">
                                    <a href="/admin/page/{{ $row->id }}" role="button"><i class="fa fa-eye" aria-hidden="true"></i></a>
                                    <a href="/admin/page/{{ $row->id }}/edit" role="button"><i class="fa fa-pencil-square" aria-hidden="true"></i></a>
                                    {!! Html::decode(link_to( "/admin/page/$row->id",'<i class="fa fa-trash" aria-hidden="true"></i>', $attributes = array('class' => 'delete-btn', 'onClick'=>'return false;'))) !!}
                                </td>
                            </tr>
                            @if(count($row->subpage) > 0)
                                @php $parent_title = $row->title @endphp
                                @foreach($row->subpage as $row)
                                <tr>
                                    <th scope="row">{{ $row->id }}</th>
                                    <td>{{ $row->title }}</td>
                                    <td>{{ $parent_title }}</td>
                                    <td class="text-right">{{ $row->order }}</td>
                                    <td>{{ $row->status }}</td>
                                    <td>{{ $row->created_at }}</td>
                                    <td class="text-right">
                                        <a href="/admin/page/{{ $row->id }}" role="button"><i class="fa fa-eye" aria-hidden="true"></i></a>
                                        <a href="/admin/page/{{ $row->id }}/edit" role="button"><i class="fa fa-pencil-square" aria-hidden="true"></i></a>
                                        {!! Html::decode(link_to( "/admin/page/$row->id",'<i class="fa fa-trash" aria-hidden="true"></i>', $attributes = array('class' => 'delete-btn', 'onClick'=>'return false;'))) !!}
                                    </td>
                                </tr>
                                @endforeach
                            @endif
                        @endforeach
                    </tbody>
                </table>
        </div>
    </div>
</div>
@include('includes.modal_delete')
@stop
