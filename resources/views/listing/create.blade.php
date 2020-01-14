@extends('layouts\app')


@section('content')

<div class="container">

    <div class="card">
        <div class="card-header">
            <h1>Create listing form</h1>
        </div>
        <div class="card-body">

        <form action="{{ route('listings.store')  }}" method="POST">
            {{csrf_field()}}
                <div class="form-group">
                  <label>Name</label>
                  <input type="text" class="form-control" placeholder="Company name" name="name" required>
                </div>
                <div class="form-group">
                  <label>Email</label>
                  <input type="email" class="form-control" placeholder="Email Address" name="email" required>
                </div>
                <div class="form-group">
                  <label>Address</label>
                  <input type="text" class="form-control" placeholder="Company Address" name="address" required>
                </div>
                <div class="form-group">
                  <label>Phone</label>
                  <input type="text" class="form-control" placeholder="Company Phone" name="phone" required>
                </div>
                <div class="form-group">
                  <label>Bio</label>
                  <textarea type="textarea" class="form-control" placeholder="Something about your company" name="bio" required></textarea>
                </div>
                {{-- <div class="form-group">
                    <input type="hidden" name="_method" value="PUT"/>
                </div> --}}
                <button type="submit" class="btn btn-primary">Submit</button>
              </form>

        </div>
    </div>

</div>



@endsection
