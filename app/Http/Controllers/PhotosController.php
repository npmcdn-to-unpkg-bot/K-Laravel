<?php

namespace App\Http\Controllers;


use App\Task;
use App\Photo;
use App\AddPhotoToTask;
use App\Http\Controllers\Controller;
use App\Http\Requests\AddPhotoRequest;



class PhotosController extends Controller
{
    /**
     * Adding photo
     */
    public function store($id, AddPhotoRequest $request)
    {
        $task = Task::findOrFail($id);

        $photo = $request->file('photo');

        (new AddPhotoToTask($task, $photo))->save();
    }

    public function destroy($id)
    {
    	$photo = Photo::findOrFail($id);

    	$photo->delete();

    	return back();
    }

}
