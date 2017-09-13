<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Group
 *
 * @package App
 * @property string $grp_name
 * @property string $admin
*/
class Group extends Model
{
    use SoftDeletes;

    protected $fillable = ['grp_name', 'admin_id'];
    
    public static function boot()
    {
        parent::boot();

        Group::observe(new \App\Observers\UserActionsObserver);
    }

    /**
     * Set to null if empty
     * @param $input
     */
    public function setAdminIdAttribute($input)
    {
        $this->attributes['admin_id'] = $input ? $input : null;
    }
    
    public function admin()
    {
        return $this->belongsTo(User::class, 'admin_id')->withTrashed();
    }
    
}
