<?php

namespace App;
use App\User;
use App\Photo;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['title', 'description'];
    
    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'user_id' => 'int',
    ];

    /**
     * Get the user that owns the task.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }


    public function addPhoto(Photo $photo)
    {
        return $this->photos()->save($photo);
    }
    public function photos()
    {
        return $this->hasMany(Photo::class);
    }
    public function owner()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    public function ownedBy(User $user)
    {
        return $this->user_id == $user->id;
    }
}
