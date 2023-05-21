@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col">
                            <h5 class="card-title">{{ __('Employees') }}</h5>
                        </div>
                        <div class="col-auto">
                            <a href="{{ route('employees.create') }}" class="btn btn-primary">{{ __('Create New Employee') }}</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif
                    <data-table 
                        :headers="{{ json_encode($columns) }}" 
                        :data="{{ json_encode($employees) }}"
                        >
                    </data-table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
