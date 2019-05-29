<?php

namespace DevRocks\Models;

use Illuminate\Database\Eloquent\Model;

use DevRocks\Traits\UuidTrait as Uuids;

class Job extends Model
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
       'id', 'title', 'summary', 'context', 'location', 'is_open', 'is_featured', 'job_type_id',
       'company_id', 'image', 'due_date', 'url', 'slug'
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
       'email_verified_at' => 'datetime',
       'due_date' => 'datetime',
   ];

   public function type()
   {
     return $this->hasOne(JobType::class, 'id', 'job_type_id');
   }

   /**
   * Company relationship
   */
   public function company()
   {
       return $this->belongsTo(Company::class, 'company_id');
   }
}
