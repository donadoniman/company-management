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
                            <form action="{{ route('companies.destroy', ['company' => $id]) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this company?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </div>
                        <div class="col-auto">
                            <a href="{{ route('companies.edit', ['company' => $id]) }}" class="btn btn-info">{{ __('Edit') }}</a>
                        </div>
                        <div class="col-auto">
                            <a href="{{ route('companies.index') }}" class="btn btn-secondary">{{ __('Back') }}</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <data-view 
                        :fields="{{ json_encode($fields) }}" 
                        :data="{{ json_encode($company) }}"
                        >
                    </data-view>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
