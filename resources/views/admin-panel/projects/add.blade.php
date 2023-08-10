@extends('admin-panel.layouts.layout_main')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <h4 class="page-title">Menyu əlavə et</h4>
            </div>
        </div>
    </div>
    <div class="card">
        <div class="card-body">
            <form action="{{ route('admin.projects.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    @if ($errors->any())
                        <div class="col-12">
                            @foreach ($errors->all() as $error)
                                <div class="alert alert-danger alert-dismissible text-bg-danger border-0 fade show"
                                    role="alert">
                                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert"
                                        aria-label="Close"></button>
                                    {{ $error }}
                                </div>
                            @endforeach
                        </div>
                    @endif
                    <div class="col-12 col-lg-6">
                        <div class="mb-3">
                            <label class="form-label">category</label>
                            <select name="category_id" class="form-select">
                                <option selected disabled>Seçin</option>
                                @foreach ($categories as $category)
                                    <option value="{{$category->id}}">{{$category->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">name</label>
                            <input type="text" class="form-control" name="name" value="">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">image</label>
                            <input type="file" class="form-control" name="image" value="">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">preview link</label>
                            <input type="text" class="form-control" name="preview_link" value="">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">github link</label>
                            <input type="text" class="form-control" name="github_link" value="">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">github status</label>
                            <select name="github_status" class="form-select">
                                <option value="0">Passiv</option>
                                <option value="1">Aktiv</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">text</label>
                            <textarea class="form-control" name="text" rows="5"></textarea>
                        </div>
                    </div>
                    <div class="col-12">
                        <button type="submit" class="btn btn-lg btn-primary">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
