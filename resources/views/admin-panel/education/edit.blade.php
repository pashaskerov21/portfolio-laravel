@extends('admin-panel.layouts.layout_main')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <h4 class="page-title">Education Düzəliş et</h4>
            </div>
        </div>
    </div>
    <div class="card">
        <div class="card-body">
            <form action="{{ route('admin.education.update',$education->id) }}" method="POST">
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
                            <label class="form-label">univercity</label>
                            <input type="text" class="form-control" name="univercity" value="{{$education->univercity ?? ''}}">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">faculty</label>
                            <input type="text" class="form-control" name="faculty" value="{{$education->faculty ?? ''}}">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">field</label>
                            <input type="text" class="form-control" name="field" value="{{$education->field ?? ''}}">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">degree</label>
                            <input type="text" class="form-control" name="degree" value="{{$education->degree ?? ''}}">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">start date</label>
                            <input type="text" class="form-control" name="start_date" value="{{$education->start_date ?? ''}}">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">end date</label>
                            <input type="text" class="form-control" name="end_date" value="{{$education->end_date ?? ''}}">
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
