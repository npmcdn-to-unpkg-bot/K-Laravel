<?php

namespace App;

use Image;

use Illuminate\Database\Eloquent\Model;

use Symfony\Component\HttpFoundation\File\UploadedFile;

class Photo extends Model
{
	protected $table = 'task_photos';

	protected $fillable = ['path', 'name','thumbnail_path'];



    public function task()
    {
    	return $this->belongsTo('App\Task');
    }

   
    public function baseDir()
    {
        return 'images/photos';
    }

    public function setNameAttribute($name)
    {
        $this->attributes['name'] = $name;

        $this->path = $this->baseDir().'/'.$name;
        $this->thumbnail_path = $this->baseDir().'/thumbnail-'.$name;
    }

    public function delete()
    {
        \File::delete([
            $this->path,
            $this->thumbnail_path,
        ]);
        
        parent::delete();
    }
    

   
    
}
