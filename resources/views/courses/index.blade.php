<x-app-layout>
    <!--begin::App Content Header-->
    <div class="app-content-header">
        <!--begin::Container-->
        <div class="container-fluid">
            <!--begin::Row-->
            <div class="row">
                <div class="col-sm-6">
                    <h3 class="mb-0"> My Created Courses </h3>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-end">
                        <li class="breadcrumb-item"><a href="#">Create & Launch</a></li>
                        <li class="breadcrumb-item active" aria-current="page">
                            My Created Courses
                        </li>
                    </ol>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12 mt-1 mb-0 text-muted">
                    This is where all of your created courses are shown as well as you can create a new course from
                    here.
                </div>
            </div>
            <!--end::Row-->
        </div>
        <!--end::Container-->
    </div>
    <!--end::App Content Header-->
    <!--begin::App Content-->
    <div class="app-content">
        <!--begin::Container-->
        <div class="container-fluid">
            <!--begin::Row-->
            <div class="row">
                <div class="col-12">
                    <!-- Default box -->
                    <div class="card card-primary card-outline mb-4">
                        <div class="card-header">
                            <div class="d-flex align-items-center justify-content-between">
                                <h3 class="card-title">
                                    <strong>My Courses</strong>
                                </h3>
                                <div class="">
                                    <a href="{{ route('courses.create') }}" class="btn btn-primary btn-sm">
                                        <i class="bi bi-plus"></i>
                                        Create A New Course
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            @forelse ($courses as $course)
                                <div class="card mb-4 shadow-none">
                                    <div class="row g-0">
                                        <div 
                                            class="col-md-2" 
                                            style=" background: url('{{ asset($course->thumbnail ?: 'images/placeholder-img.jpeg')}}') no-repeat center / cover"
                                        > 
                                        </div>
                                        <div class="col-md-10">
                                            <div class="card-body py-2">
                                                <div class="mb-2">
                                                    <a 
                                                        href="#" 
                                                        data-bs-toggle="tooltip"
                                                        title="Click to Update"
                                                        class="btn btn-{{ $course->status == 'live' ? 'success' : 'secondary' }} btn-sm me-2">
                                                        <i class="bi bi-{{ $course->status == 'live' ? 'broadcast' : 'file-earmark' }}"></i>
                                                        {{ ucfirst($course->status) }}
                                                    </a>
                                                    <a href="#" class="btn btn-outline-secondary btn-sm me-2">
                                                        Modules <span class="badge bg-secondary">4</span>
                                                    </a>
                                                    <a href="#" class="btn btn-outline-secondary btn-sm me-2">
                                                        Sessions <span class="badge bg-secondary">5</span>
                                                    </a>
                                                    <a href="#" class="btn btn-outline-secondary btn-sm me-2">
                                                        <i class="bi bi-people-fill"></i>
                                                        Active Members <span class="badge bg-secondary">100</span>
                                                    </a>
                                                    <hr class="my-2 mx--1"/>
                                                </div>
                                                <p>
                                                    <b>{{ $course->title }}</b>
                                                </p>
                                                <p class="card-text">
                                                    {{ $course->short_desc }}
                                                </p>
                                                <hr class="my-2 mx--1"/>
                                                <div>
                                                    <a href="{{ route('courses.edit', $course->id) }}" class="btn btn-outline-primary btn-sm me-2">
                                                        <i class="bi bi-pencil-fill"></i> Edit
                                                    </a>
                                                    <a href="#" class="btn btn-outline-danger btn-sm me-2">
                                                        <i class="bi bi-trash-fill"></i> Delete
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @empty
                                <p>No Courses found!</p>
                            @endforelse
                        </div>
                    </div>
                </div>
            </div>
            <!--end::Row-->
        </div>
        <!--end::Container-->
    </div>
    <!--end::App Content-->
</x-app-layout>