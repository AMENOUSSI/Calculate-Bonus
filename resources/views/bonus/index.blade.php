@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Bonuses</h1>
        <form action="{{ route('bonuses.calculate') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="period">Period:</label>
                <input type="text" name="period" id="period" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary">Calculate Bonuses</button>
        </form>
        <table class="table mt-4">
            <thead>
            <tr>
                <th>User</th>
                <th>Period</th>
                <th>Bonus Amount</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($users as $user)
                @foreach ($user->bonuses as $bonus)
                    <tr>
                        <td>{{ $user->first_name }} {{ $user->last_name }}</td>
                        <td>{{ $bonus->period }}</td>
                        <td>{{ $bonus->bonus_amount }}</td>
                    </tr>
                @endforeach
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
