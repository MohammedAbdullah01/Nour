@extends('admins.layouts.app')
@section('title', 'Create | Reservation')

@section('content')

    @include('admins.layouts.inc.nav_sidebar')

    <main id="main" class="main">

        <div class="pagetitle">
            <h1>Create Reservation</h1>
        </div>


        <div class="container">
            <div class="row">

                <form class="mt-4" action="{{ route('admin.reservation.store') }}" method="post">
                    @csrf
                    @method('POST')
                    <div class="row">

                        <div class="col-md-6 mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Room Type</label>
                            <select  class="form-select" name="room_id" value="{{ old('room_id') }}">
                                <option selected>Open this select menu</option>
                                @foreach ($roomtypes as $roomtype)
                                    <option value="{{ $roomtype->id }}">{{ $roomtype->type }}</option>
                                @endforeach
                            </select>
                            @error('room_id')
                                <p class="text-danger text-center">
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>

                        <div class="col-md-6 mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Slots</label>
                            <select  class="form-select" name="slot_id" value="{{ old('slot_id') }}">
                                <option selected>Open this select menu</option>
                                @foreach ($slots as $slot)
                                    <option value="{{ $slot->id }}">{{ $slot->start_time . '( To )' . $slot->end_time }}</option>
                                @endforeach
                            </select>
                            @error('slot_id')
                                <p class="text-danger text-center">
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>

                    </div>

                    <div class="row">

                        <div class="col-md-6 mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Teachers</label>
                            <select  class="form-select" name="teacher_id"  >
                                <option  selected>Open this select menu</option>
                                @foreach ($teachers as $teacher)
                                    <option value="{{$teacher->id}}">{{ $teacher->last_name . ' ' .$teacher->first_name  }}</option>
                                @endforeach
                            </select>
                            @error('teacher_id')
                                <p class="text-danger text-center">
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>

                        <div class="col-md-6 mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Datere</label>
                            <input type="date" class="form-control" name="dateres" value="{{ old('dateres') }}"
                                placeholder="Enter Dateres">
                            @error('dateres')
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
