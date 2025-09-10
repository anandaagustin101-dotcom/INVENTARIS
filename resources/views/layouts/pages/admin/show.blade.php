@extends('layouts.app')

@section('title', 'Detail Admin')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <h3 class="page-title">Detail Karyawan</h3>
            
            <div class="card card-body">
                <table class="table table-striped">
                    <tr>
                        <th width="25%">ID</th>
                        <th width="10px">:</th>
                        <td>{{ $admin->id }}</td>
                    </tr>

                    <tr>
                        <th width="25%">Nama</th>
                        <th width="10px">:</th>
                        <td>{{ $admin->name }}</td>
                    </tr>

                    <tr>
                        <th width="25%">Email</th>
                        <th width="10px">:</th>
                        <td>{{ $admin->email }}</td>
                    </tr>

                    <tr>
                        <th width="25%">Terdaftar Pada</th>
                        <th width="10px">:</th>
                        <td>{{ $admin->created_at->isoFormat('DD MMM Y HH:mm') }}</td>
                    </tr>

                    <tr>
                        <th width="25%">Diperbaharui Pada</th>
                        <th width="10px">:</th>
                        <td>{{ $admin->updated_at->isoFormat('DD MMM Y HH:mm') }}</td>
                    </tr>
                </table>
            </div>

            <div class="d-flex gap-2 mt-3">
                <a href="{{ route('admin.index') }}" class="btn btn-secondary">
                    <span class="ti ti-arrow-left me-1"></span>
                    Kembali
                </a>

                <a href="{{ route('admin.edit', $admin->id) }}" class="btn btn-primary">
                    <span class="ti ti-pencil me-1"></span>
                    Edit
                </a>
            </div>
        </div>
    </div>
@endsection