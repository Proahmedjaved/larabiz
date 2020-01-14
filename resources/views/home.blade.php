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

                <h1>Listings <span><a class="btn btn-primary float-right" href="/listings/create" role="button" >Create Listing</a></span> </h1>
                    <h3>Companies</h3>



                    @if (count($listings))

                    @foreach ($listings as $listing)

                    <div class="card">
                        <div class="card-header">{{ $listing->name }}</div>
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
