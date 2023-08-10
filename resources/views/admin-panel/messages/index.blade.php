@extends('admin-panel.layouts.layout_main')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <h4 class="page-title">Messages</h4>
            </div>
        </div>
    </div>
    <div class="row">
        @if (session('success'))
            <div class="col-12">
                <div class="alert alert-success alert-dismissible text-bg-success border-0 fade show" role="alert">
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert"
                        aria-label="Close"></button>
                    {{ session('success') }}
                </div>
            </div>
        @endif
        <div class="col-12">
            <table class="table table-striped table-centered mb-0">
                <thead>
                    <tr>
                        <th style="width: 100px">#</th>
                        <th>title</th>
                        <th>name</th>
                        <th>email</th>
                        <th>status</th>
                        <th style="width: 150px">Action</th>
                    </tr>
                </thead>
                <tbody id="menu-links-tbody">
                    @foreach ($messages as $message)
                        <tr>
                            <td>{{ $loop->index + 1 }}</td>
                            <td>{{ $message->title }}</td>
                            <td>{{ $message->name }}</td>
                            <td>{{ $message->email }}</td>
                            <td>{!! $message->seen_date === null ? '<span class="badge badge-pill bg-success p-1">New</span>' : 'Seen: '.$message->seen_date !!}</td>
                            <td class="table-action d-flex" style="height: 70px">
                                <a href="{{route('admin.messages.show', $message->id)}}" class="action-icon me-1"> <i class="ri-eye-line"></i></a>
                                <form action="{{ route('admin.messages.destroy', $message->id) }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn action-icon"><i class="mdi mdi-delete"></i></button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
