@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Library Borrowing System</div>
                <div class="card-body">
                <h2>All books</h2>
                <all-books></all-books>
                </div>
            </div>
            <br>
            <example-component></example-component>
        </div>
    </div>
</div>
@endsection
