@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
    <div class="col-md-12">

<h3>Today</h3>
<!-- Current Tasks -->
    @if (count($tasks) > 0)
         <div class="grid">  
        @foreach ($tasks as $task)
        
        <div class="grid-item">
          <div class="panel panel-default">
            <div class="panel-heading"> 
              
              
              <a href="{{ url('tasks/'.$task->id) }}">{{ $task->title }}</a>
             
               
            </div>
            
            
            <div class="panel-body">
            <p class="small">{{ $task->updated_at->diffForHumans() }} by {{$task->user->name}}</p>
            <p>{{ $task->description }}</p>

                <a href="{{ url('tasks/'.$task->id) }}" class="btn btn-primary">
                    Details <span class="glyphicon glyphicon-info-sign"></span>
                </a>
                <a href="" class="btn btn-info">
                    share <span class="glyphicon glyphicon-share-alt"></span>
                </a>
          


            </div>
           
            </div>
            </div>
        @endforeach
         </div>  
    @endif

    </div>
    </div>
</div>
@endsection
