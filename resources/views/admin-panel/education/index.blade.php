@extends('admin-panel.layouts.layout_main')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <h4 class="page-title">Education</h4>
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
            <div class="card">
                <div class="card-body">
                    <div class="row mb-2">
                        <div class="col-sm-5">
                            <a href="{{ route('admin.education.create') }}" class="btn btn-danger mb-2"><i
                                    class="mdi mdi-plus-circle me-2"></i> Add Education</a>
                        </div>
                    </div>

                </div> <!-- end card-body-->
            </div> <!-- end card-->
        </div> <!-- end col -->
        <div class="col-12">
            <table class="table table-striped table-centered mb-0">
                <thead>
                    <tr>
                        <th style="width: 100px">#</th>
                        <th>Univercity</th>
                        <th>Field</th>
                        <th>Degree</th>
                        <th style="width: 150px">Action</th>
                        <th style="width: 100px"></th>
                    </tr>
                </thead>
                <tbody id="education-tbody">
                    @foreach ($educations as $education)
                        <tr id="sort_{{ $education->id }}">
                            <td>{{ $loop->index + 1 }}</td>
                            <td>{{ $education->univercity }}</td>
                            <td>{{ $education->field }}</td>
                            <td>{{ $education->degree }}</td>
                            <td class="table-action d-flex" style="height: 70px">
                                <a href="{{route('admin.education.edit', $education->id)}}" class="action-icon me-1"> <i class="mdi mdi-square-edit-outline"></i></a>
                                <form action="{{ route('admin.education.destroy', $education->id) }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn action-icon"><i class="mdi mdi-delete"></i></button>
                                </form>
                            </td>
                            <td>
                                <button class="btn action-icon handle"><i class="ri-drag-move-2-line"></i></button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>


    @push('js')
        <script src="https://cdn.jsdelivr.net/npm/sortablejs@latest/Sortable.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js"></script>
        <script>
            $('#education-tbody').sortable({
                handle: 'button.handle',
                cancel: '',
                update: function() {
                    let siralama = $('#education-tbody').sortable('serialize');
                    $.get("{{ route('admin.education.sort') }}?"+siralama, function(response) {});
                }
            });
        </script>
    @endpush
@endsection
