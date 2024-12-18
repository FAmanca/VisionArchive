@extends('admin.layouts.admin')
@section('dashboard')
    <div class="container mt-3">
        <table class="neoadmin-users-table table table-hover">
            <thead>
                <th class="bg-green">Username</th>
                <th class="bg-yellow">Email</th>
                <th class="bg-violet">Created at</th>
                <th class="bg-red">Action</th>
            </thead>
            <tbody>
                @foreach ($users as $user)
                    <tr>
                        <td><b>{{ $user->username }}</b></td>
                        <td><b>{{ $user->email }}</b></td>
                        <td><b>{{ $user->created_at}}</b></td>
                        <td>Ban</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <p>
            {{ $users->links('pagination::bootstrap-5') }}
        </p>
    </div>
@endsection
