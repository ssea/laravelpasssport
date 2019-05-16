@extends('layouts.app_vodworks')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8 text-center pt-5">
            <h1>Welcome to Vodworks</h1>

            <p class="pt-5">
                <h3>
                    @if (Auth::guest())
                        <a href="/login">Login</a>
                    @else
                        <a href="/admin/page">Go to List news</a></li>
                    @endif
                </h3>
            </p>
        </div>
    </div>
</div>
@endsection
