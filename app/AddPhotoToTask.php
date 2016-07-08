<?php 

namespace App;


use Symfony\Component\HttpFoundation\File\UploadedFile;


class AddPhotoToTask
{
	protected $task;
	protected $file;

	public function __construct(Task $task, UploadedFile $file, Thumbnail $thumbnail = null )
	{
		$this->task = $task;
		$this->file = $file;

		$this->thumbnail = $thumbnail ? : new Thumbnail;
	}



	public function save()
	{
		// Attach photo to task
		$photo = $this->task->addPhoto( $this->makePhoto() );

		// Move the photo image to the folder
        $this->file->move($photo->baseDir(), $photo->name);

        // genarate a thumbnail
        $this->thumbnail->make($photo->path, $photo->thumbnail_path);

	}

	protected function makePhoto()
	{
		return new Photo([ 'name'=> $this->makeFileName() ]);
	}



	protected function makeFileName()
	{
		$name = sha1(
            time().$this->file->getClientOriginalName()
        );

        $extension = $this->file->getClientOriginalExtension();

        return "{$name}.{$extension}";
	}




}