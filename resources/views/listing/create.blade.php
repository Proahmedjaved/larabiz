@extends('layouts\app')


@section('content')

<div class="container">

    <div class="card">
        <div class="card-header">
            <h1>Create listing form</h1>
        </div>
        <div class="card-body">
            {!! Form::open(['url' => 'listings/store', 'method' => 'post']) !!}
                {!! Form::label($name ?? '', $text ?? '', ['class'=>'label label-danger']) !!}
                {!! Form::Text($name ?? '', "Name", [$options ?? '' ?? '']) !!}

            {!! Form::close() !!}


        </div>
    </div>

</div>



@endsection
