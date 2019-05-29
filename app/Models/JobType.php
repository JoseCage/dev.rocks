<?php

namespace DevRocks\Models;

use Illuminate\Database\Eloquent\Model;

use DevRocks\Traits\UuidTrait as Uuids;

class JobType extends Model
{
  use Uuids;

  /**
  * Indicates if the IDs are auto-incrementing.
  *
  * @var bool
  */
 public $incrementing = false;

 /**
  * The attributes that are mass assignable.
  *
  * @var array
  */
 protected $fillable = [
     'type', 'slug', 'description'
 ];

 /**
  * The attributes that should be hidden for arrays.
  *
  * @var array
  */
 protected $hidden = [
 ];

 /**
  * The attributes that should be cast to native types.
  *
  * @var array
  */
 protected $casts = [
     'created_at' => 'datetime',
     'updated_at' => 'datetime',
 ];

}
