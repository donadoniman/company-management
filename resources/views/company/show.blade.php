@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col">
                            <h5 class="card-title">{{ __('View Company') }}</h5>
                        </div>
                        <div class="col-auto">
                            <a href="{{ route('companies.edit', ['company' => $id]) }}" class="btn btn-primary">{{ __('Edit') }}</a>
                        </div>
                        <div class="col-auto">
                            <a href="{{ route('companies.index') }}" class="btn btn-primary">{{ __('Back') }}</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <data-view 
                        :fields="{{ json_encode($fields) }}" 
                        :data="{{ json_encode($company) }}"
                        :items-per-page="10"
                        >
                    </data-view>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
