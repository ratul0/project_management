@extends('layouts.default')

@section('content')
    <div class="row">
        <div class="col-md-4 col-md-offset-4">
            <div class="login-panel panel panel-default">

                <div class="panel-heading">
                    <h3 class="panel-title">Edit Your Profile</h3>
                </div>
                @include('includes.alert')

                <div class="panel-body">
                    {{Form::open(['route'=>'user.doProfile', 'method'=> 'put','role'=>'form'])}}
                    <fieldset>

                        <div class="form-group">
                            {{ Form::text('first_name', $user->first_name, array('class' => 'form-control', 'placeholder' => 'First Name', 'autofocus')) }}
                        </div>

                        <div class="form-group">
                            {{ Form::text('last_name', $user->last_name, array('class' => 'form-control', 'placeholder' => 'Last Name')) }}
                        </div>

                        <div class="form-group">
                            {{ Form::text('mobile', $user->mobile, array('class' => 'form-control', 'placeholder' => 'Mobile No')) }}
                        </div>


                        <!-- Change this to a button or input when using this as a form -->
                        {{Form::submit('Edit Profile',['class'=> 'btn btn-lg btn-success btn-block'])}}
                    </fieldset>

                    {{Form::close()}}
                </div>



            </div>
        </div>
    </div>
@stop