@extends('admins.layouts.app')
@section('title', 'Grades')

@section('content')

    @include('admins.layouts.inc.nav_sidebar')

    <main id="main" class="main">

        <div class="pagetitle">
            <h1>Edite Room Types</h1>
        </div>


        <div class="card">
            <div class="card-body">
                <div class="container">

                    <form class="mt-4" action="{{ route('admin.roomtypes.update', $roomtype->id) }}" method="post">
                        @csrf
                        @method('PUT')

                        <div class="col-md-6 mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Room Types</label>
                            <input type="text" class="form-control" name="type" value="{{ $roomtype->type }}"
                                placeholder="Enter Grade">
                            @error('type')
                                <p class="text-danger text-center">
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>

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
