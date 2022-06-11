@extends('admins.layouts.app')
@section('title', 'Rooms')

@section('content')

    @include('admins.layouts.inc.nav_sidebar')

    <main id="main" class="main">

        <div class="pagetitle">
            <h1>Rooms All</h1>
            <a class="btn btn-outline-primary btn-sm mt-2" href="{{ route('admin.room.create') }}">Create Room</a>
        </div>


        <table class="table table-dark table-hover mt-3">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Capacity</th>
                    <th>Num</th>
                    <th>Floor</th>
                    <th>Roomtype</th>
                    <th>Material</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($rooms as $room)
                    <tr>
                        <th>{{ $room->id }}</th>
                        <th>{{ $room->capacity }}</th>
                        <th>{{ $room->num }}</th>
                        <th>{{ $room->floor }}</th>
                        <th>{{ $room->roomtype->type }}</th>
                        <th>{{ $room->material->type }}</th>
                        <th>
                            <a class="btn btn-outline-success btn-sm"
                                href="{{ route('admin.room.edit', $room->id) }}">Edit</a>
                            <form class="d-inline-block" action="{{ route('admin.room.delete', $room ->id) }}"
                                method="post">
                                @csrf
                                @method('DELETE')

                                <button class="btn btn-outline-danger btn-sm" type="submit">Delete</button>
                            </form>
                        </th>
                    @empty
                        <th colspan="10">
                            <p class="text-center text-danger ">{{ 'There Is No Rooms :(' }} </p>
                        </th>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </main>
    @include('admins.layouts.inc.footer')

@endsection
