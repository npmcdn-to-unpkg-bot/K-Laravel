@extends('layouts.app')

@section('content')


<div class="container">
    <div class="row">
        <!-- Current Tasks -->
    @if (count($task) > 0)
           
    
        <div class="col-md-8 col-md-offset-2">
          <div class="panel panel-default">
            <div class="panel-heading">  
            <h4 id="task-title">{{ $task->title }}</h4>
                
            </div>
            
            <div class="panel-body">

                <p>{{ $task->description}}</p>

                 <p> 
                <form action="/tasks/{{ $task->id }}" method="POST">
                {{ csrf_field() }}
                {{ method_field('DELETE') }}
                <a href="{{ url('tasks', $task->id) }}/edit" class="btn btn-success">
                     Edit <span class="glyphicon glyphicon-edit"> </span>
                </a>
                <button type="submit" id="delete-task-{{ $task->id }}" class="btn btn-danger">
                    Delete <span class="glyphicon glyphicon-remove-circle"> </span>
                </button>

                
                <a href="" class="btn btn-primary">
                    Share <span class="glyphicon glyphicon-share-alt"> </span>
                </a>

                <a href="" class="btn btn-warning">
                    Comment <span class="glyphicon glyphicon-comment"> </span>
                </a>

                </form>
                </p> 

            </div>
           </div>
        </div>


        <div class="col-md-8 col-md-offset-2">

        <!-- displaying the photos -->
        @foreach($task->photos->chunk(4) as $set)
            <div class="row">

            @foreach($set as $photo)
            <div class="col-sm-3 col-xs-6 photos">
        @if($user && $user->owns($task))
            <form action="{{ url('photos/'.$photo->id) }}" method="POST">
                {!! csrf_field() !!}
                {!! method_field('DELETE') !!}
                
                <button type="submit" class="close" id="delete-photo-{{ $photo->id }}" data-toggle="tooltip" data-placement="bottom" title="Delete this Photo">&times;</button>
            </form>
        @endif
                <a href="{{ url($photo->path) }}" data-lity>
                <img class="img-responsive img-rounded" src="{{ url($photo->thumbnail_path) }}" alt="">
                </a>
            </div>
            @endforeach

            </div><br>
        @endforeach

        <!-- adding photos -->
            @if($user && $user->owns($task))
            <div>
            <hr>
            <h4>Add Photos</h4>
                
                <form 
                 action="{{ route('store_photo_path', [$task->id]) }}"
                    method="POST" 
                    class="dropzone" 
                    id="myAwesomeDropzone">
                {{ csrf_field() }}
                </form>

            </div>
            @endif
        </div>

        <div class="col-md-8 col-md-offset-2">
        <?php

        $params = [
            'q'             => $task->title ,
            'type'          => 'video',
            'part'          => 'id, snippet',
            'maxResults'    => 1
        ];

        // Make intial call. with second argument to reveal page info such as page tokens
        $search = Youtube::searchAdvanced($params, true);

        // Check if we have a pageToken
        if (isset($search['info']['nextPageToken'])) {
            $params['pageToken'] = $search['info']['nextPageToken'];
        }

        // Make another call and repeat
        $search = Youtube::searchAdvanced($params, true);

        // Add results key with info parameter set
        $results = $search['results'];
        
        print_r($results);
        ?>

        </div>

        
       
           
    @endif
    </div>
</div>

    
@endsection

@section('script')

    
@endsection