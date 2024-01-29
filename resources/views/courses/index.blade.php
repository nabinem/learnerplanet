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
                            <p>No Courses found!</p>
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