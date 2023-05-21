@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col">
                            <h5 class="card-title">{{ __('Companies') }}</h5>
                        </div>
                        <div class="col-auto">
                            <a href="{{ route('companies.create') }}" class="btn btn-primary">{{ __('Create New Company') }}</a>
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
                        :data="{{ json_encode($companies) }}"
                        :items-per-page="10"
                        >
                    </data-table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
