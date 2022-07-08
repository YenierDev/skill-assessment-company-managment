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
                <form action="{{ route('employees.update', $employee->id) }}" method="POST">
                    @csrf
                        <div class="mb-3">
                            <label for="first_name" class="form-label">First Name</label>
                            <input class="form-control" id="first_name" name="first_name" value="{{old('first_name', $employee->first_name)}}">
                            @error('first_name')
                                <div id="first_nameHelp" class="form-text">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="last_name" class="form-label">Last Name</label>
                            <input class="form-control" id="last_name" name="last_name" value="{{old('last_name', $employee->last_name)}}">
                            @error('last_name')
                                <div id="last_nameHelp" class="form-text">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input class="form-control" id="email" name="email" value="{{old('email', $employee->email)}}">
                            @error('email')
                                <div id="emailHelp" class="form-text">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="phone" class="form-label">Phone</label>
                            <input class="form-control" id="phone" name="phone" value="{{old('phone', $employee->phone)}}">
                            @error('phone')
                                <div id="phoneHelp" class="form-text">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="company" class="form-label">Company</label>
                            <select class="form-select" aria-label="Default select" name="company">
                                @foreach($companies as $company)
                                    <option value="{{$company->id}}" {{$company->id==old('company', $employee->company_id)? 'selected':''}}>{{$company->name}}</option>    
                                @endforeach
                            </select>
                            @error('company')
                                <div id="companyHelp" class="form-text">{{ $message }}</div>
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
