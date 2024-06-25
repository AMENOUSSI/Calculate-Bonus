@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Sales</h1>
        <a href="{{ route('sales.create') }}" class="btn btn-primary">Create Sale</a>
        <table class="table mt-4">
            <thead>
            <tr>
                <th>User</th>
                <th>Product</th>
                <th>Quantity</th>
                <th>Total Price</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($sales as $sale)
                <tr>
                    <td>{{ $sale->user->first_name }} {{ $sale->user->last_name }}</td>
                    <td>{{ $sale->product->name }}</td>
                    <td>{{ $sale->quantity }}</td>
                    <td>{{ $sale->total_price }}</td>
                    <td>
                        <a href="{{ route('sales.show', $sale->id) }}" class="btn btn-info">Show</a>
                        <a href="{{ route('sales.edit', $sale->id) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('sales.destroy', $sale->id) }}" method="POST" style="display: inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
