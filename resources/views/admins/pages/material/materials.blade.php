@extends('admins.layouts.app')
@section('title', 'Materials')

@section('content')

    @include('admins.layouts.inc.nav_sidebar')

    <main id="main" class="main">

        <div class="pagetitle">
            <h1>Materials All</h1>
            <a class="btn btn-outline-primary btn-sm mt-2" href="{{ route('admin.material.create') }}">Create Material</a>
        </div>





        <table class="table table-dark table-hover mt-3">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Type</th>
                    <th>State</th>
                    <th>Specs</th>
                    <th>Numser</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($materials as $material)
                    <tr>
                        <th>{{ $material->id }}</th>
                        <th>{{ $material->type }}</th>
                        <th>{{ $material->state }}</th>
                        <th>{{ $material->specs }}</th>
                        <th>{{ $material->numser }}</th>
                        <th>
                            <a class="btn btn-outline-success btn-sm"
                                href="{{ route('admin.material.edit', $material->id) }}">Edit</a>
                            <form class="d-inline-block" action="{{ route('admin.material.delete', $material ->id) }}"
                                method="post">
                                @csrf
                                @method('DELETE')

                                <button class="btn btn-outline-danger btn-sm" type="submit">Delete</button>
                            </form>
                        </th>
                    @empty
                        <th colspan="10">
                            <p class="text-center text-danger ">{{ 'There Is No Materials :(' }} </p>
                        </th>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </main>
    @include('admins.layouts.inc.footer')

@endsection
