@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    <ul class="navbar-nav me-auto">
                        @if (Route::has('companies.index'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('companies.index') }}">{{ __('Companies') }}</a>
                            </li>
                        @endif
                        @if (Route::has('employees.index'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('employees.index') }}">{{ __('Employees') }}</a>
                            </li>
                        @endif
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
