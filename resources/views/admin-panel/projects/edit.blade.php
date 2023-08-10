@extends('admin-panel.layouts.layout_main')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <h4 class="page-title">Project Düzəliş et</h4>
            </div>
        </div>
    </div>
    <div class="card">
        <div class="card-body">
            <form action="{{ route('admin.projects.update',$project->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
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
                                @foreach ($categories as $category)
                                    <option {{$project->category_id == $category->id ? 'selected' : ''}} value="{{$category->id}}">{{$category->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">name</label>
                            <input type="text" class="form-control" name="name" value="{{$project->name ?? ''}}">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">image</label>
                            <input type="file" class="form-control" name="image" value="">
                            <input type="hidden" value="{{$project->image_old}}" name="image_old">
                            @if ($project->image)
                                <div class="image-review">
                                    <img src="{{asset('uploads/projects/'.$project->image_old)}}" alt="">
                                </div>
                            @endif
                        </div>
                        <div class="mb-3">
                            <label class="form-label">preview link</label>
                            <input type="text" class="form-control" name="preview_link" value="{{$project->preview_link ?? ''}}">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">github link</label>
                            <input type="text" class="form-control" name="github_link" value="{{$project->github_link ?? ''}}">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">github status</label>
                            <select name="github_status" class="form-select">
                                <option {{$project->github_status == '0' ? 'selected' : ''}} value="0">Passiv</option>
                                <option {{$project->github_status == '1' ? 'selected' : ''}} value="1">Aktiv</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">text</label>
                            <textarea class="form-control" name="text" rows="5">{{$project->text}}</textarea>
                        </div>
                    </div>
                    <div class="col-12">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
