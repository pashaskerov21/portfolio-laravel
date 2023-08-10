@extends('admin-panel.layouts.layout_main')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <h4 class="page-title">Dashboard</h4>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12 col-md-6 col-xl-4">
            <a href="{{route('admin.skills.index')}}" class="card">
                <div class="card-body d-flex justify-content-between align-items-center">
                    <h3>Skills</h3>
                    <h3>{{$skills->count()}}</h3>
                </div>
            </a>
        </div>
        <div class="col-12 col-md-6 col-xl-4">
            <a href="{{route('admin.projects.index')}}" class="card">
                <div class="card-body d-flex justify-content-between align-items-center">
                    <h3>Projects</h3>
                    <h3>{{$projects->count()}}</h3>
                </div>
            </a>
        </div>
        <div class="col-12 col-md-6 col-xl-4">
            <a href="{{route('admin.experience.index')}}" class="card">
                <div class="card-body d-flex justify-content-between align-items-center">
                    <h3>Experience</h3>
                    <h3>{{$experiences->count()}}</h3>
                </div>
            </a>
        </div>
        <div class="col-12 col-md-6 col-xl-4">
            <a href="{{route('admin.education.index')}}" class="card">
                <div class="card-body d-flex justify-content-between align-items-center">
                    <h3>Education</h3>
                    <h3>{{$educations->count()}}</h3>
                </div>
            </a>
        </div>
    </div>
@endsection
