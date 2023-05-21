@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    <div class="dashboard-apps">
                        @if (Route::has('companies.index'))
                            <a href="{{ route('companies.index') }}" class="dashboard-app">
                                <img src="{{ asset('storage/public/images/companies.png') }}" alt="Companies"/>
                                <span>{{ __('Companies') }}</span>
                            </a>
                        @endif
                        @if (Route::has('employees.index'))
                            <a href="{{ route('employees.index') }}" class="dashboard-app">
                                <img src="{{ asset('storage/public/images/employees.png') }}" alt="Employees"/>
                                <span>{{ __('Employees') }}</span>
                            </a>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
