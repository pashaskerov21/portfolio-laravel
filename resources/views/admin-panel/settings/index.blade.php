@extends('admin-panel.layouts.layout_main')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <h4 class="page-title">Settings</h4>
            </div>
        </div>
    </div>
    <div class="card">
        <div class="card-body">
            <form action="{{route('admin.settings.update')}}" method="POST" enctype="multipart/form-data">
                @csrf
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
                    <div class="col-12 col-lg-6">
                        <div class="mb-3">
                            <label class="form-label">title</label>
                            <input type="text" class="form-control" name="title" value="{{ $settings->title ?? '' }}">
                        </div>
                    </div>
                    <div class="col-12 col-lg-6">
                        <div class="mb-3">
                            <label class="form-label">logo</label>
                            <input type="file" class="form-control" name="logo">
                        </div>
                    </div>
                    <div class="col-12 col-lg-6">
                        <div class="mb-3">
                            <label class="form-label">logo text</label>
                            <input type="text" class="form-control" name="logo_text" value="{{ $settings->logo_text ?? '' }}">
                        </div>
                    </div>
                    <div class="col-12 col-lg-6">
                        <div class="mb-3">
                            <label class="form-label">favicon</label>
                            <input type="file" class="form-control" name="favicon">
                        </div>
                    </div>
                    <div class="col-12 col-lg-6">
                        <div class="mb-3">
                            <label class="form-label">mail</label>
                            <input type="text" class="form-control" name="mail" value="{{ $settings->mail ?? '' }}">
                        </div>
                    </div>
                    <div class="col-12 col-lg-6">
                        <div class="mb-3">
                            <label class="form-label">phone</label>
                            <input type="text" class="form-control" name="phone" value="{{ $settings->phone ?? '' }}">
                        </div>
                    </div>
                    <div class="col-12 col-lg-6">
                        <div class="mb-3">
                            <label class="form-label">github</label>
                            <input type="text" class="form-control" name="github" value="{{ $settings->github ?? '' }}">
                        </div>
                    </div>
                    <div class="col-12 col-lg-6">
                        <div class="mb-3">
                            <label class="form-label">linkedin</label>
                            <input type="text" class="form-control" name="linkedin" value="{{ $settings->linkedin ?? '' }}">
                        </div>
                    </div>
                    <div class="col-12 col-lg-6">
                        <div class="mb-3">
                            <label class="form-label">description</label>
                            <textarea class="form-control" name="description" rows="5">{{$settings->description ?? ''}}</textarea>
                        </div>
                    </div>
                    <div class="col-12 col-lg-6">
                        <div class="mb-3">
                            <label class="form-label">keywords</label>
                            <textarea class="form-control" name="keywords" rows="5">{{$settings->keywords ?? ''}}</textarea>
                        </div>
                    </div>
                    <div class="col-12 col-lg-6">
                        <div class="mb-3">
                            <label class="form-label">author</label>
                            <input type="text" class="form-control" name="author" value="{{ $settings->author ?? '' }}">
                        </div>
                    </div>
                    <div class="col-12 col-lg-6">
                        <div class="mb-3">
                            <label class="form-label">copyright</label>
                            <input type="text" class="form-control" name="copyright" value="{{ $settings->copyright ?? '' }}">
                        </div>
                    </div>
                    <div class="col-12">
                        <button type="submit" class="btn btn-primary btn-lg w-100">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
