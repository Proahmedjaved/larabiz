@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif

                    <h1>Listings <span><a class="btn btn-primary float-right" href="/listings/create"
                                role="button">Create Listing</a></span> </h1>
                    <h3>Companies</h3>



                    @if (count($listings))

                    @foreach ($listings as $listing)

                    <div class="card">
                        <div class="card-header">
                            <h3 class="d-inline">{{ $listing->name }}</h3>
                            <span>
                                <form action="{{ route('listings.destroy', $listing->id)}}" class="d-inline" method="POST">
                                    {{csrf_field()}}
                                    <button type="submit"
                                        class="btn btn-outline-danger float-right ml-2">Delete</button>
                                    <input type="hidden" name="_method" value="DELETE">
                                </form>

                            </span>
                            <span><a href="/listings/{{ $listing->id }}/edit"
                                    class="btn btn-outline-secondary float-right" role="button">Edit</a></span>
                        </div>

                        <div class="card-body">
                            <ul>
                                <li>{{ $listing->address }}</li>
                                <li>{{ $listing->phone }}</li>
                                <li>{{ $listing->email }}</li>
                            </ul>
                            <p>{{ $listing->bio }}</p>
                        </div>

                    </div>

                    <br>

                    @endforeach

                    @endif


                </div>
            </div>
        </div>
    </div>
</div>
@endsection
