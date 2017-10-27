<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Hash;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'firstname', 'lastname', 'email', 'role', 'language',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
    ];

    public function group()
    {
    	return $this->belongsTo(Group::class);
    }

    public function projects()
    {
    	$this->belongsToMany(Project::class);
    }


//	/**
//	 * @param $pass
//	 *
//	 * @return string
//	 */
//	public function getPasswordAttribute($pass)
//	{
//		return ucfirst($pass);
//	}

	/**
	 *
	 */
    public function setPasswordAttribute()
    {
    	$this->attributes['password'] = bcrypt(str_random(8));
//	    $this->attributes['password'] = Hash::make($pass);
    }







}
