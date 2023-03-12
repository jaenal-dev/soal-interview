@extends('layouts.app')

@section('content')
<div class="content-wrapper">

    @if (session()->has('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif

    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Dashboard</h1>
                </div>
            </div>
        </div>
    </div>

    <section class="content">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h3>Welcome, {{ Auth::user()->name }} 🙂</h3>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection
