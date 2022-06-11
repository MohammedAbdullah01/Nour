@extends('admins.layouts.app')
@section('title', 'Create | RoomType')

@section('content')

    @include('admins.layouts.inc.nav_sidebar')

    <main id="main" class="main">

        <div class="pagetitle">
            <h1>Create Room Type</h1>
        </div>


        <div class="card">
            <div class="card-body">
                <div class="container">

                    <form class="mt-4" action="{{ route('admin.roomtypes.store') }}" method="post">
                        @csrf
                        @method('POST')

                        <div class="col-md-12 mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Room Type</label>
                            <input type="text" class="form-control" name="type" value="{{ old('type') }}"
                                placeholder="Enter Room Type">
                            @error('type')
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
