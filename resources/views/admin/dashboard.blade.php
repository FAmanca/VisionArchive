@extends('admin.layouts.admin')

@section('dashboard')
    <div class="container-fluid">
        <h1 class="my-4">Welcome, Admin!</h1>

        <div class="row">
            <!-- Statistik -->
            <div class="col-md-3 mb-3 text-center">
                <div class="card stat">
                    <div class="card-body">
                        <h4>Total Users</h4>
                        <h5>{{ $totalUsers }}</h5>
                    </div>
                </div>
            </div>

            <div class="col-md-3 mb-3 text-center">
                <div class="card stat stat-green">
                    <div class="card-body">
                        <h4>Total Images</h4>
                        <h5>{{ $totalImages }}</h5>
                    </div>
                </div>
            </div>

            <div class="col-md-3 mb-3 text-center">
                <div class="card stat stat-blue">
                    <div class="card-body">
                        <h4>Total Comments</h4>
                        <h5>{{ $totalComments }}</h5>
                    </div>
                </div>
            </div>

            <div class="col-md-3 mb-3 text-center">
                <div class="card stat stat-red">
                    <div class="card-body">
                        <h4>Total Reports</h4>
                        <h5>{{ $totalReports }}</h5>
                    </div>
                </div>
            </div>
        </div>

        <!-- Grafik Aktivitas Pengguna -->
        <div class="row mt-4">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h5>User Activity Graph</h5>
                        {!! $usersChart->renderHtml() !!}

                    </div>
                </div>
            </div>

            <!-- New User Today -->
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h5>New Users Today</h5>
                        <canvas id="newUsersGraph"></canvas>
                    </div>
                </div>
            </div>
        </div>

        <!-- Aktivitas Terbaru -->
        <div class="row mt-4">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <h5>Recent Activity</h5>
                        <ul>
                            <li>Created Image - 10/10/2020</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
