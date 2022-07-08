@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @include('layouts.menu')
        </div>
    </div>
    <div class="row justify-content-center mt-5">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Create Company') }}</div>
                <div class="card-body">
                    <form action="{{ route('companies.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                        <div class="mb-3">
                            <label for="company_name" class="form-label">Company Name</label>
                            <input class="form-control" id="company_name" name="company_name" value="{{old('company_name')}}">
                            @error('company_name')
                                <div id="emailHelp" class="form-text">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input class="form-control" id="email" name="email" value="{{old('email')}}">
                            @error('email')
                                <div id="emailHelp" class="form-text">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="logo" class="form-label">Logo</label>
                            <input class="form-control" type="file" id="logo" name="logo">
                            @error('logo')
                                <div id="emailHelp" class="form-text">{{ $message }}</div>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
