<?php

namespace DevRocks\Models;

use Illuminate\Database\Eloquent\Model;

use DevRocks\Traits\UuidTrait as Uuids;

class Category extends Model
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
      'id','category', 'description'
  ];

  /**
   * The attributes that should be hidden for arrays.
   *
   * @var array
   */
  protected $hidden = [
      'password', 'deleted_at', 'remember_token',
  ];

  /**
   * The attributes that should be cast to native types.
   *
   * @var array
   */
  protected $casts = [
      'created_at' => 'datetime',
      'deleted_at' => 'datetime',
  ];

}
