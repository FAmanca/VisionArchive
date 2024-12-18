@extends('admin.layouts.admin')
@section('dashboard')
    <div class="container mt-3">
        <h2>Reports</h2>
        <table class="neoadmin-users-table table table-hover">
            <thead>
                <th class="bg-green">Judul Foto</th>
                <th class="bg-yellow">Category</th>
                <th class="bg-violet">Reason</th>
                <th class="bg-violet">Created At</th>
                <th class="bg-yellow">Report From</th>
                <th class="bg-red">Action</th>
            </thead>
            <tbody>
                @foreach ($reports as $report)
                    <tr>
                        <td><b>{{ $report->image->judul_foto }}</b></td>
                        <td><b>{{ $report->category }}</b></td>
                        <td><b>{{ $report->reason }}</b></td>
                        <td><b>{{ $report->created_at}}</b></td>
                        <td><b>{{ $report->user->username}}</b></td>
                        <td><button class="btn btn-primary"><a href="{{ route('image.show', $report->FotoId) }}" style="color: white; text-decoration: none">View Image</a></button></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <p>
            {{ $reports->links('pagination::bootstrap-5') }}
        </p>
    </div>
@endsection
