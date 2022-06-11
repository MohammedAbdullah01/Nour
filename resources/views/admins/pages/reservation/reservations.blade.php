@extends('admins.layouts.app')
@section('title', 'Reservations')

@section('content')

    @include('admins.layouts.inc.nav_sidebar')

    <main id="main" class="main">

        <div class="pagetitle">
            <h1>Reservations All</h1>
            <a class="btn btn-outline-primary btn-sm mt-2" href="{{ route('admin.reservation.create') }}">Create Reservation</a>
        </div>


        <table class="table table-dark table-hover mt-3">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Teacher</th>
                    <th>Room Type</th>
                    <th>Slot Start Time</th>
                    <th>Slot End Time</th>
                    <th>Dateres</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($reservations as $reservation)
                    <tr>
                        <th>{{ $reservation->id }}</th>
                        <th>{{ $reservation->teacher->last_name . $reservation->teacher->first_name  }}</th>
                        <th>{{ $reservation->room->roomtype->type }}</th>
                        <th>{{ $reservation->slot->start_time }}</th>
                        <th>{{ $reservation->slot->end_time }}</th>
                        <th>{{ $reservation->dateres }}</th>
                        <th>
                            <a class="btn btn-outline-success btn-sm"
                                href="{{ route('admin.reservation.edit', $reservation->id) }}">Edit</a>
                            <form class="d-inline-block" action="{{ route('admin.reservation.delete', $reservation ->id) }}"
                                method="post">
                                @csrf
                                @method('DELETE')

                                <button class="btn btn-outline-danger btn-sm" type="submit">Delete</button>
                            </form>
                        </th>
                    @empty
                        <th colspan="10">
                            <p class="text-center text-danger ">{{ 'There Is No Reservations :(' }} </p>
                        </th>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </main>
    @include('admins.layouts.inc.footer')

@endsection
