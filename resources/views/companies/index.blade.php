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
                <a href="{{route('companies.create')}}" class="btn btn-primary m-5" style="width:100px; float:right">Create</a>
            </div>
            <div class="card">
                <div class="card-header">{{ __('Companies') }}</div>
                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                            <th scope="col">#</th>
                            <th scope="col">Name</th>
                            <th scope="col">Email</th>
                            <th scope="col">Logo</th>
                            <th scope="col">Edit</th>
                            <th scope="col">Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($companies as $company)
                                <tr>
                                    <td style="text-align:center;">{{$loop->index +1}}</td>
                                    <td>{{$company->name}}</td>
                                    <td>{{$company->email}}</td>
                                    <td class="w-25">
                                        <img src="{{asset('storage/'.$company->logo)}}" class="img-fluid img-thumbnail" alt="Sheep">
                                    </td>
                                    <td><a href="{{route('companies.edit', $company->id)}}" class="btn btn-primary btn-block">edit</a></td>
                                    <td><form action="{{ route('companies.destroy', $company->id) }}" method="POST">
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
                            {{ $companies->links('layouts.pagination') }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
