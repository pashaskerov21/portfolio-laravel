<section class="projects-section" data-aos="fade-up" id="projects">
    <div class="container">
        <h1 class="section-title">Portfolio</h1>
        <div class="project-filter-buttons">
            <button data-id="all">All</button>
            @foreach ($categories as $category)
                <button data-id="{{$category->id}}">{{ $category->name }}</button>
            @endforeach
        </div>
        <div class="row project-row">
            @foreach ($projects as $project)
                <div class="col-12 col-md-6 col-xl-4 project-col" data-category-id='{{$project->category_id}}'>
                    <div class="project-card">
                        <div class="image">
                            <img src={{asset('uploads/projects/'.$project->image)}} alt="review" />
                            <div class="hover-div">
                                <a target="_blank" rel="noreferrer" href={{$project->preview_link}}><i class="fa-solid fa-eye"></i></a>
                                @if ($project->github_status == '1')
                                    <a target="_blank" class="ms-3" rel="noreferrer" href={{$project->github_link}}><i class="fa-brands fa-github"></i></a>
                                @endif
                            </div>
                        </div>
                        <div class="label">
                            <span class="name">{{$project->name}}</span>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
