@extends('admins.layouts.app')
@section('title', 'Edite | Room')

@section('content')

    @include('admins.layouts.inc.nav_sidebar')

    <main id="main" class="main">

        <div class="pagetitle">
            <h1>Edite Room</h1>
        </div>


        <div class="container">
            <div class="row">

                <form class="mt-4" action="{{ route('admin.room.update' , $room->id) }}" method="post">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="col-md-4 mb-3">
                            <label for="exampleFormControlInput1" class="form-label">capacity</label>
                            <input type="number" class="form-control" name="capacity" value="{{ old('capacity',$room->capacity) }}"
                                placeholder="Enter Last Name">
                            @error('capacity')
                                <p class="text-danger text-center">
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Num</label>
                            <input type="text" class="form-control" name="num" value="{{ old('num',$room->num) }}"
                                placeholder="Enter num">
                            @error('num')
                                <p class="text-danger text-center">
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>
                        <div class="col-md-4 mb-3 ">
                            <label for="exampleFormControlInput1" class="form-label">Floor</label>
                            <input type="text" class="form-control" name="floor" value="{{ old('floor',$room->floor) }}"
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
                                    <option value="{{ $roomtype->id }}" {{ $roomtype->id == $room->roomtype_id  ? 'selected'  :old('roomtype_id') }}>
                                        {{ $roomtype->type }}
                                    </option>
                                @endforeach
                            </select>
                            @error('roomtype_id')
                                <p class="text-danger text-center">
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>

                        <div class="col-md-6 mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Material</label>
                            <select  class="form-select" name="material_id" value="{{ old('material_id') }}">
                                <option selected>Open this select menu</option>
                                @foreach ($materials as $material)
                                    <option value="{{ $material->id }}" {{ $material->id == $room->material_id  ? 'selected'  :old('material_id') }}>
                                        {{ $material->type }}
                                    </option>
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
                        <button type="submit" class="btn btn-outline-primary btn-sm mb-3">Update</button>
                    </div>
                </form>
            </div>
        </div>




    </main>
    @include('admins.layouts.inc.footer')

@endsection
