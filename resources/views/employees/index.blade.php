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
            <div class="row">
                <a href="{{route('employees.create')}}" class="btn btn-primary m-5" style="width:100px; float:right">Create</a>
            </div>
            <div class="card">
                <div class="card-header">{{ __('Employees') }}</div>
                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                            <th scope="col">#</th>
                            <th scope="col">First Name</th>
                            <th scope="col">Last Name</th>
                            <th scope="col">Email</th>
                            <th scope="col">Company</th>
                            <th scope="col">Phone Number</th>
                            <th scope="col">Edit</th>
                            <th scope="col">Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($employees as $employee)
                                <tr>
                                    <td style="text-align:center;">{{$loop->index +1}}</td>
                                    <td>{{$employee->first_name}}</td>
                                    <td>{{$employee->last_name}}</td>
                                    <td>{{$employee->email}}</td>
                                    <td>{{$employee->company->name}}</td>
                                    <td>{{$employee->phone}}</td>
                                    <td><a href="{{route('employees.edit', $employee->id)}}" class="btn btn-primary btn-block">edit</a></td>
                                    <td><form action="{{ route('employees.destroy', $employee->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-block">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="row">
                        <div class="col-md-12 d-flex flex-center">
                            {{ $employees->links('layouts.pagination') }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
