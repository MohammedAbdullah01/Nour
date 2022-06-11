@extends('admins.layouts.app')
@section('title', 'Create | Room')

@section('content')

    @include('admins.layouts.inc.nav_sidebar')

    <main id="main" class="main">

        <div class="pagetitle">
            <h1>Create Room</h1>
        </div>


        <div class="container">
            <div class="row">

                <form class="mt-4" action="{{ route('admin.room.store') }}" method="post">
                    @csrf
                    @method('POST')
                    <div class="row">

                        <div class="col-md-4 mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Capacity</label>
                            <input type="number" class="form-control" name="capacity" value="{{ old('capacity') }}"
                                placeholder="Enter capacity">
                            @error('capacity')
                                <p class="text-danger text-center">
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Num</label>
                            <input type="text" class="form-control" name="num" value="{{ old('num') }}"
                                placeholder="Enter num">
                            @error('num')
                                <p class="text-danger text-center">
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>
                        <div class="col-md-4 mb-3 ">
                            <label for="exampleFormControlInput1" class="form-label">Floor</label>
                            <input type="text" class="form-control" name="floor" value="{{ old('floor') }}"
                                placeholder="Enter floor">
                            @error('floor')
                                <p class="text-danger text-center">
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>
                    </div>
                    <div class="row">

                        <div class="col-md-6 mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Room Type</label>
                            <select  class="form-select" name="roomtype_id" value="{{ old('roomtype_id') }}">
                                <option selected>Open this select menu</option>
                                @foreach ($roomtypes as $roomtype)
                                    <option value="{{ $roomtype->id }}">{{ $roomtype->type }}</option>
                                @endforeach
                            </select>
                            @error('roomtype_id')
                                <p class="text-danger text-center">
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>

                        <div class="col-md-6 mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Materials</label>
                            <select  class="form-select" name="material_id" value="{{ old('material_id') }}">
                                <option selected>Open this select menu</option>
                                @foreach ($materials as $material)
                                    <option value="{{ $material->id }}">{{ $material->type }}</option>
                                @endforeach
                            </select>
                            @error('material_id')
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
