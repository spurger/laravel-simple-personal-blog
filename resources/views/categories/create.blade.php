@extends('layouts.app')

@section('title', 'Create category')

@section('content')
    <div class="row">
        <div class="col-lg-6 offset-lg-3">
            <h1>Create category</h1>
            <form method="POST" action="{{ route('categories.store') }}">
                @csrf

                <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input id="name" type="text" name="name" class="form-control" value="{{ old('name') }}"
                        autocomplete="off">
                </div>
                <x-errors class="mb-3" />
                <div>
                    <button type="submit" class="btn btn-success">Save</button>
                </div>
            </form>

        </div>
    </div>
@endsection
