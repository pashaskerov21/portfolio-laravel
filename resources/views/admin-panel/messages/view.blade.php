@extends('admin-panel.layouts.layout_main')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <h4 class="page-title">Message</h4>
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
        <div class="col-12 col-lg-12">
            <div class="card">
                <div class="card-body">
                    <table class="table">
                        <tr>
                            <td>Name</td>
                            <td>{{$message->name}}</td>
                        </tr>
                        <tr>
                            <td>Email</td>
                            <td>{{$message->email}}</td>
                        </tr>
                        <tr>
                            <td>Title</td>
                            <td>{{$message->title}}</td>
                        </tr>
                        <tr>
                            <td>Text</td>
                            <td>{{$message->text}}</td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-12 col-lg-6">
            <form action="{{route('admin.messages.send')}}" method="post">
                @csrf
                <div class="mb-3">
                    <label class="form-label">email</label>
                    <input type="text" class="form-control" name="email" value="{{$message->email ?? ''}}">
                </div>
                <div class="mb-3">
                    <label class="form-label">title</label>
                    <input type="text" class="form-control" name="title">
                </div>
                <div class="mb-3">
                    <label class="form-label">text</label>
                    <textarea class="form-control" name="text" rows="5"></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Send</button>
            </form>
        </div>
    </div>

@endsection