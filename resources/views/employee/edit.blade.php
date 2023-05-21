@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col">
                            <h5 class="card-title">{{ __('Edit Employee') }}</h5>
                        </div>
                        <div class="col-auto">
                            <a href="{{ route('companies.index') }}" class="btn btn-secondary">{{ __('Back') }}</a>
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
                    <form action="{{ route('employees.update', ['employee' => $id]) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <!-- Form fields -->
                        <div class="form-group py-2">
                            <label for="name">First Name</label>
                            <input type="text" class="form-control" id="first_name" name="first_name" value="{{ $employee->first_name }}">
                        </div>
                        
                        <div class="form-group py-2">
                            <label for="name">Last Name</label>
                            <input type="text" class="form-control" id="last_name" name="last_name" value="{{ $employee->last_name }}">
                        </div>
                        
                        <div class="form-group py-2">
                            <label for="logo">Company</label>
                            <select id="company_id" name="company_id" class="form-control">
                                <option value="">Select a company</option>
                                @foreach ($companies as $company)
                                    <option value="{{ $company->id }}" {{ $company->id == $employee->company_id ? 'selected' : '' }}>
                                        {{ $company->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group py-2">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" id="email" name="email" value="{{ $employee->email }}">
                        </div>
                        
                        <div class="form-group py-2">
                            <label for="website">Phone</label>
                            <input type="text" class="form-control" id="phone" name="phone" value="{{ $employee->phone }}">
                        </div>
                        <button type="submit" class="btn btn-primary">Update Employee</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
