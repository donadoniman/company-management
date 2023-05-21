@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col">
                            <h5 class="card-title">{{ __('Create New Company') }}</h5>
                        </div>
                        <div class="col-auto">
                            <a href="{{ route('companies.index') }}" class="btn btn-primary">{{ __('Back') }}</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <form action="{{ route('companies.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group py-2">
                            <label for="name">Name</label>
                            <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}" required>
                        </div>
                        <div class="form-group py-2">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}">
                        </div>
                        <div class="form-group py-2">
                            <label for="logo">Logo</label>
                            <input type="file" class="form-control-file" id="logo" name="logo">
                        </div>
                        <div class="form-group py-2">
                            <label for="website">Website</label>
                            <input type="text" class="form-control" id="website" name="website" value="{{ old('website') }}">
                        </div>
                        <button type="submit" class="btn btn-primary">Create Company</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
