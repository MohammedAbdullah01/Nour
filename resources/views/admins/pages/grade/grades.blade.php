@extends('admins.layouts.app')
@section('title', 'Grades')

@section('content')

    @include('admins.layouts.inc.nav_sidebar')

    <main id="main" class="main">

        <div class="pagetitle">
            <h1>Grades All</h1>
            <a class="btn btn-outline-primary btn-sm mt-2" href="{{ route('admin.grade.create') }}">Create Grade</a>
        </div>


        <table class="table table-dark table-hover mt-3">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Grade Name</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($grades as $grade)
                    <tr>
                        <th>{{ $grade->id }}</th>
                        <th>{{ $grade->grade }}</th>
                        <th>
                            <a class="btn btn-outline-success btn-sm"
                                href="{{ route('admin.grade.edit', $grade->id) }}">Edit</a>
                            <form class="d-inline-block" action="{{ route('admin.grade.delete', $grade->id) }}"
                                method="post">
                                @csrf
                                @method('DELETE')

                                <button class="btn btn-outline-danger btn-sm" type="submit">Delete</button>
                            </form>
                        </th>
                    @empty
                        <th colspan="8">
                            <p class="text-center text-danger ">{{ 'There Is No Grades :(' }} </p>
                        </th>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </main>
    @include('admins.layouts.inc.footer')

@endsection
