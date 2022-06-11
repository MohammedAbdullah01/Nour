@extends('admins.layouts.app')
@section('title', 'Grades')

@section('content')

    @include('admins.layouts.inc.nav_sidebar')

    <main id="main" class="main">

        <div class="pagetitle">
            <h1>RoomTypes All</h1>
            <a class="btn btn-outline-primary btn-sm mt-2" href="{{ route('admin.roomtypes.create') }}">Create RoomTypes</a>
        </div>


        <table class="table table-dark table-hover mt-3">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Room Types</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($roomtypes as $roomtype)
                    <tr>
                        <th>{{ $roomtype->id }}</th>
                        <th>{{ $roomtype->type }}</th>
                        <th>
                            <a class="btn btn-outline-success btn-sm"
                                href="{{ route('admin.roomtypes.edit', $roomtype->id) }}">
                                Edit
                            </a>

                            <form class="d-inline-block" action="{{ route('admin.roomtypes.delete', $roomtype->id) }}"
                                method="post">
                                @csrf
                                @method('DELETE')

                                <button class="btn btn-outline-danger btn-sm" type="submit">Delete</button>
                            </form>
                        </th>
                    @empty
                        <th colspan="8">
                            <p class="text-center text-danger ">{{ 'There Is No Room Types :(' }} </p>
                        </th>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </main>
    @include('admins.layouts.inc.footer')

@endsection
