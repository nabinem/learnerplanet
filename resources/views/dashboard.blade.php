<x-app-layout>
    <x-card />
    <div class="app-content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6">
                    <h3 class="mb-0"> Dashboard</h3>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-end">
                        <li class="breadcrumb-item active" aria-current="page">
                            Dashboard
                        </li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <div class="app-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
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
                            <p>Dashboard Content</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>