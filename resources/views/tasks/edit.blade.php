@extends('layouts.app')

@section('content')


<div class="container">
    <div class="row">
        <!-- Current Tasks -->


@if (count($task) > 0)
       

    <div class="col-md-8 col-md-offset-2">
      <div class="panel panel-default">
        <div class="panel-heading"> 
            <h3>Edit :{{ $task->title }}</h3>
        </div>
        
        <div class="panel-body">

                
{!! Form::open(['method' => 'PUT', 'action' => ['TasksContorller@update', $task->id ]]) !!}

<div class="form-group @if($errors->first('title')) has-error @endif">
    {!! Form::label('title', 'Input label') !!}
    {!! Form::text('title', $task->title, ['class' => 'form-control', 'required' => 'required']) !!}

    
    <small class="text-danger">{{ $errors->first('title') }}</small>
</div>

<div class="form-group @if($errors->first('description')) has-error @endif">
    {!! Form::label('description', 'Input label') !!}
    {!! Form::textarea('description', $task->description, ['class' => 'form-control', 'required' => 'required']) !!}
    <small class="text-danger">{{ $errors->first('description') }}</small>
</div>

<button type="submit" class="btn btn-success">
    Edit <span class="glyphicon glyphicon-edit"> </span>
</button>
{!! Form::close() !!}
                   
    


        </div>
       </div>
    </div>
       
           
    @endif
    </div>
</div>

    
@endsection