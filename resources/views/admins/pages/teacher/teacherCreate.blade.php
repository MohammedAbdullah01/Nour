@extends('admins.layouts.app')
@section('title', 'Create | Teacher')

@section('content')

    @include('admins.layouts.inc.nav_sidebar')

    <main id="main" class="main">

        <div class="pagetitle">
            <h1>Create Teacher</h1>
        </div>


        <div class="container">
            <div class="row">

                <form class="mt-4" action="{{ route('admin.teachers.store') }}" method="post">
                    @csrf
                    @method('POST')
                    <div class="row">
                        <div class="col-md-4 mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Last_Name</label>
                            <input type="text" class="form-control" name="last_name" value="{{ old('last_name') }}"
                                placeholder="Enter Last Name">
                            @error('last_name')
                                <p class="text-danger text-center">
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="exampleFormControlInput1" class="form-label">First_Name</label>
                            <input type="text" class="form-control" name="first_name" value="{{ old('first_name') }}"
                                placeholder="Enter First Name">
                            @error('first_name')
                                <p class="text-danger text-center">
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>
                        <div class="col-md-4 mb-3 ">
                            <label for="exampleFormControlInput1" class="form-label">E-mail</label>
                            <input type="email" class="form-control" name="email" value="{{ old('email') }}"
                                placeholder="Enter Email">
                            @error('email')
                                <p class="text-danger text-center">
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4 mb-3 ">
                            <label for="exampleFormControlInput1" class="form-label">Numtel</label>
                            <input type="numeric" class="form-control" name="numtel" value="{{ old('numtel') }}"
                                placeholder="Enter numtel">
                            @error('numtel')
                                <p class="text-danger text-center">
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>

                        <div class="col-md-4 mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Grades</label>
                            <select type="numeric" class="form-control" name="grade_id" value="{{ old('grade_id') }}">
                                <option selected>Open this select menu</option>
                                @foreach ($grades as $grade)
                                    <option value="{{ $grade->id }}">{{ $grade->grade }}</option>
                                @endforeach
                            </select>
                            @error('grade_id')
                                <p class="text-danger text-center">
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Department</label>
                            <input type="text" class="form-control" name="department" value="{{ old('department') }}"
                                placeholder="Enter Department">
                            @error('department')
                                <p class="text-danger text-center">
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4 mb-3">
                            <label for="exampleFormControlInput1" class="form-label">status</label>
                            <input type="text" class="form-control" name="status" value="{{ old('status') }}"
                                placeholder="Enter status">
                            @error('status')
                                <p class="text-danger text-center">
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="exampleFormControlInput1" class="form-label">state</label>
                            <input type="text" class="form-control" name="state" value="{{ old('state') }}"
                                placeholder="Enter state">
                            @error('state')
                                <p class="text-danger text-center">
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="exampleFormControlInput1" class="form-label">password</label>
                            <input type="password" class="form-control" name="password" value="{{ old('password') }}"
                                placeholder="Enter password">
                            @error('password')
                                <p class="text-danger text-center">
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>
                    </div>

                    <div class="col-auto">
                        <button type="submit" class="btn btn-outline-primary btn-sm mb-3">Submit</button>
                    </div>
                </form>
            </div>
        </div>




    </main>
    @include('admins.layouts.inc.footer')

@endsection
