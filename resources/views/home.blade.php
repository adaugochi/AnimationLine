@extends('layouts.main')

@section('content')
    <div class="mt-60 ht-100v">
        <div class="container">
            @include('elements.flash-messages')
            <table class="table table-striped table-bordered">
                <thead>
                <tr>
                    <th scope="col">S/N</th>
                    <th scope="col">Full Name</th>
                    <th scope="col">Package</th>
                    <th scope="col">Total Amount</th>
                    <th scope="col">Status</th>
                    <th>Payment ID</th>
                </tr>
                </thead>
                <tbody>

                </tbody>
            </table>
        </div>
    </div>
@endsection
