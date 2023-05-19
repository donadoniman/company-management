@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Companies') }}</div>

                <div class="card-body">
                    <data-table
                        fetch-url="{{ route('companies.table') }}"
                        :columns="['name', 'email', 'phone']"
                        >
                    </data-table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
