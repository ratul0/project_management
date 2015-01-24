@extends('layouts.default')
@section('content')
    @include('includes.alert')

    @foreach($batches as $batch)
        <div class="row">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">
                        Batch Name : {{$batch->name}}
                    </h3>
                </div>
                <div class="panel-body">
                    Description : {{$batch->description}}
                </div>
            </div>
        </div>
    @endforeach
@stop


