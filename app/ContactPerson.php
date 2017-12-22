<?php

namespace App;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class ContactPerson extends Model
{
  use SoftDeletes;

  protected $fillable = ['vorname','nachname','telephone','position', 'email','suppliers_id'];

  public static function boot()
  {
      parent::boot();

      ContactPerson::observe(new \App\Observers\UserActionsObserver);
  }

  /**
   * Set to null if empty
   * @param $input
   */
  public function setOwnerIdAttribute($input)
  {
      $this->attributes['suppliers_id'] = $input ? $input : null;
  }

  public function owner()
  {
      return $this->belongsTo(Supplier::class, 'suppliers_id')->withTrashed();
  }
    //
}
