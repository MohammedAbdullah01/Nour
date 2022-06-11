@extends('admins.layouts.app')
@section('title', 'Grades')

@section('content')

    @include('admins.layouts.inc.nav_sidebar')

    <main id="main" class="main">

        <div class="pagetitle">
            <h1>Edite Grade</h1>
        </div>


        <div class="card">
            <div class="card-body">
                <div class="container">

                    <form class="mt-4" action="{{ route('admin.grade.update', $grade->id) }}" method="post">
                        @csrf
                        @method('PUT')

                        <div class="col-md-6 mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Grade Title</label>
                            <input type="text" class="form-control" name="grade" value="{{ $grade->grade }}"
                                placeholder="Enter Grade">
                            @error('grade')
                                <p class="text-danger text-center">
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>




                        {{-- <div class="mb-3 row">
                            <label for="inputPassword" class="col-sm-2 col-form-label">Password</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="grade" value="{{$grade->geade}}">
                            </div>
                        </div> --}}

                        <div class="col-auto">
                            <button type="submit" class="btn btn-outline-success btn-sm mb-3">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>




    </main>
    @include('admins.layouts.inc.footer')

@endsection
