@extends('admins.layouts.app')
@section('title', 'Edite | Material')

@section('content')

    @include('admins.layouts.inc.nav_sidebar')

    <main id="main" class="main">

        <div class="pagetitle">
            <h1>Edite Material</h1>
        </div>





        <div class="container">
            <div class="row">

                <form class="mt-4" action="{{ route('admin.material.update' , $material->id) }}" method="post">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="exampleFormControlInput1" class="form-label">type</label>
                            <input type="text" class="form-control" name="type" value="{{ old('type',$material->type) }}"
                                placeholder="Enter type">
                            @error('type')
                                <p class="text-danger text-center">
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="exampleFormControlInput1" class="form-label">state</label>
                            <input type="text" class="form-control" name="state" value="{{ old('state',$material->state) }}"
                                placeholder="Enter state">
                            @error('state')
                                <p class="text-danger text-center">
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>
                        <div class="col-md-6 mb-3 ">
                            <label for="exampleFormControlInput1" class="form-label">specs</label>
                            <input type="text" class="form-control" name="specs" value="{{ old('specs',$material->specs) }}"
                                placeholder="Enter specs">
                            @error('specs')
                                <p class="text-danger text-center">
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>

                        <div class="col-md-6 mb-3 ">
                            <label for="exampleFormControlInput1" class="form-label">numser</label>
                            <input type="number" class="form-control" name="numser" value="{{ old('numser',$material->numser) }}"
                                placeholder="Enter numser">
                            @error('numser')
                                <p class="text-danger text-center">
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>
                    </div>
                    {{-- <div class="row">
                    </div> --}}

                    <div class="col-auto">
                        <button type="submit" class="btn btn-outline-primary btn-sm mb-3">Update</button>
                    </div>
                </form>
            </div>
        </div>




    </main>
    @include('admins.layouts.inc.footer')

@endsection
