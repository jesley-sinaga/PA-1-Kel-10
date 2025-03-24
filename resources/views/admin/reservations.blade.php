@extends('admin.layouts.main')

@section('title', 'Reservations')

@section('content')
<div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800">Reservations</h1>

    <table class="table table-bordered">
        <thead class="thead-dark">
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Check-in</th>
                <th>Check-out</th>
                <th>Guests</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>John Doe</td>
                <td>john@example.com</td>
                <td>2025-04-01</td>
                <td>2025-04-05</td>
                <td>2 Adults</td>
                <td>
                    <button class="btn btn-success">Confirm</button>
                    <button class="btn btn-danger">Cancel</button>
                </td>
            </tr>
        </tbody>
    </table>
</div>
@endsection
