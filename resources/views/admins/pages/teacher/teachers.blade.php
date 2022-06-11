@extends('admins.layouts.app')
@section('title', 'Teachers')

@section('content')

    @include('admins.layouts.inc.nav_sidebar')

    <main id="main" class="main">

        <div class="pagetitle">
            <h1>Teachers All</h1>
            <a class="btn btn-outline-primary btn-sm mt-2" href="{{ route('admin.teachers.create') }}">Create Teacher</a>
        </div>


        <table class="table table-dark table-hover mt-3">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Grade Name</th>
                    <th>Numtel</th>
                    <th>Department</th>
                    <th>Status</th>
                    <th>State</th>
                    <th>Created_at</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($teachers as $teacher)
                    <tr>
                        <th>{{ $teacher->id }}</th>
                        <th>{{ $teacher->last_name . $teacher->first_name  }}</th>
                        <th>{{ $teacher->email }}</th>
                        <th>{{ $teacher->grade->grade }}</th>
                        <th>{{ $teacher->numtel }}</th>
                        <th>{{ $teacher->department }}</th>
                        <th>{{ $teacher->status }}</th>
                        <th>{{ $teacher->state }}</th>
                        <th>{{ $teacher->created_at->diffForhumans() }}</th>
                        <th>
                            <a class="btn btn-outline-success btn-sm"
                                href="{{ route('admin.teachers.delete', $teacher->id) }}">Edit</a>
                            <form class="d-inline-block" action="{{ route('admin.teachers.delete', $teacher->id) }}"
                                method="post">
                                @csrf
                                @method('DELETE')

                                <button class="btn btn-outline-danger btn-sm" type="submit">Delete</button>
                            </form>
                        </th>
                    @empty
                        <th colspan="10">
                            <p class="text-center text-danger ">{{ 'There Is No Teachers :(' }} </p>
                        </th>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </main>
    @include('admins.layouts.inc.footer')

@endsection
