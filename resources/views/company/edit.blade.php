@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col">
                            <h5 class="card-title">{{ __('Edit Company') }}</h5>
                        </div>
                        <div class="col-auto">
                            <a href="{{ route('companies.index') }}" class="btn btn-primary">{{ __('Back') }}</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <form action="{{ route('companies.update', ['company' => $id]) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <!-- Form fields -->
                        <div class="form-group py-2">
                            <label for="name">Name</label>
                            <input type="text" class="form-control" id="name" name="name" value="{{ $company->name }}">
                        </div>
                        
                        <div class="form-group py-2">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" id="email" name="email" value="{{ $company->email }}">
                        </div>
                        
                        <div class="form-group py-2">
                            <label for="logo">Logo</label>
                            <input type="file" class="form-control-file" id="logo" name="logo">
                        </div>
                        
                        <div class="form-group py-2">
                            <label for="website">Website</label>
                            <input type="text" class="form-control" id="website" name="website" value="{{ $company->website }}">
                        </div>
                        <button type="submit" class="btn btn-primary">Update Company</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
