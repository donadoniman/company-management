@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col">
                            <h5 class="card-title">{{ __('Create New Employee') }}</h5>
                        </div>
                        <div class="col-auto">
                            <a href="{{ route('employees.index') }}" class="btn btn-primary">{{ __('Back') }}</a>
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
                    <form action="{{ route('employees.store') }}" method="POST">
                        @csrf
                        <div class="form-group py-2">
                            <label for="name">First Name</label>
                            <input type="text" class="form-control" id="first_name" name="first_name" value="{{ old('first_name') }}" required>
                        </div>
                        <div class="form-group py-2">
                            <label for="name">Last Name</label>
                            <input type="text" class="form-control" id="last_name" name="last_name" value="{{ old('last_name') }}" required>
                        </div>
                        <div class="form-group py-2">
                            <label for="logo">Company</label>
                            <select id="company_id" name="company_id" class="form-control">
                                <option value="">Select a company</option>
                                @foreach ($companies as $company)
                                    <option value="{{ $company->id }}" {{ old('company_id') == $company->id ? 'selected' : '' }}>{{ $company->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group py-2">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}">
                        </div>
                        <div class="form-group py-2">
                            <label for="website">Phone</label>
                            <input type="text" class="form-control" id="phone" name="phone" value="{{ old('phone') }}">
                        </div>
                        <button type="submit" class="btn btn-primary">Create Employee</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
