@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div class="card-body">
                {!! Form::open(array('url' => 'updateuser/'.$users[0]->id,'method' => 'PUT')) !!}

                {{ Form::label('name', 'User Name')}}
                {{ Form::text('name', $users[0]->name,['class' => 'form-control','placeholder'=>'First Name'])}}
                <br>
                {{ Form::label('email', 'User Email')}}
                {{ Form::email('email', $users[0]->email,['class' => 'form-control','placeholder'=>'Email'])}}
                <br>
                {{Form::submit('Update',['class' => 'btn btn-success'])}}
                {!! Form::close() !!}



                </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
