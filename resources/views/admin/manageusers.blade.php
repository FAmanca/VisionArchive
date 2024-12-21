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
                        <td><b>{{ $user->created_at }}</b></td>
                        <td>
                            @if ($user->banned)
                                <p>User Dibanned Hingga {{ $user->banned->BannedUntil }}</p>
                            @else
                                <a data-bs-toggle="modal" data-bs-target="#banneduser-{{ $user->id }}"
                                    style="cursor: pointer; color: red">Banned User</a>
                            @endif
                        </td>

                        {{-- MODAL Banned CUY --}}
                        <div class="modal fade" id="banneduser-{{ $user->id }}" data-bs-backdrop="static"
                            data-bs-keyboard="false" tabindex="-1" aria-labelledby="banneduserLabel-{{ $user->id }}"
                            aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-header bg-danger text-white">
                                        <h5 class="modal-title" id="banneduserLabel-{{ $user->id }}">Banned User:
                                            {{ $user->username }}</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <p class="mb-3">Masukkan durasi banned dan alasan untuk user ini (dalam menit).
                                        </p>
                                        <form action="{{ route('admin.banuser', $user->id) }}" method="POST">
                                            @csrf
                                            <div class="mb-3">
                                                <label for="durasiban" class="form-label">Durasi Banned (Dalam
                                                    Menit)</label>
                                                <input type="number" name="durasiban" class="form-control"
                                                    placeholder="Contoh: 1440 (24 jam)" required>
                                            </div>
                                            <div class="mb-3">
                                                <label for="reason" class="form-label">Alasan Banned</label>
                                                <textarea name="reason" class="form-control" rows="3" placeholder="Tulis alasan banned di sini..." required></textarea>
                                            </div>
                                            <button type="submit" class="btn btn-danger w-100">Banned User</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <p>
            {{ $users->links('pagination::bootstrap-5') }}
        </p>
    </div>
@endsection
