@extends('admins.layouts.app')
@section('title', 'Create | Grades')

@section('content')

    @include('admins.layouts.inc.nav_sidebar')

    <main id="main" class="main">

        <div class="pagetitle">
            <h1>Create Grade</h1>
        </div>


        <div class="card">
            <div class="card-body">
                <div class="container">

                    <form class="mt-4" action="{{ route('admin.grade.store') }}" method="post">
                        @csrf
                        @method('POST')

                        <div class="col-md-8 mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Grade Title</label>
                            <input type="text" class="form-control" name="grade" value="{{ old('grade') }}"
                                placeholder="Enter Grade">
                            @error('grade')
                                <p class="text-danger text-center">
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>

                        <div class="col-auto">
                            <button type="submit" class="btn btn-outline-primary btn-sm mb-3">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>




    </main>
    @include('admins.layouts.inc.footer')

@endsection
