<?php
namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Notifications\ResetPassword;
use Carbon\Carbon;
use Hash;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class User
 *
 * @package App
 * @property string $name
 * @property string $lastname
 * @property string $email
 * @property string $password
 * @property string $birthdate
 * @property string $address
 * @property string $role
 * @property string $remember_token
 * @property string $profilphoto
 * @property string $group
*/
class User extends Authenticatable
{
    use Notifiable;
    use SoftDeletes;

    protected $fillable = ['name', 'lastname', 'email', 'password', 'birthdate', 'address', 'remember_token', 'profilphoto', 'role_id', 'group_id'];
    
    public static function boot()
    {
        parent::boot();

        User::observe(new \App\Observers\UserActionsObserver);
    }
    
    /**
     * Hash password
     * @param $input
     */
    public function setPasswordAttribute($input)
    {
        if ($input)
            $this->attributes['password'] = app('hash')->needsRehash($input) ? Hash::make($input) : $input;
    }
    

    /**
     * Set attribute to date format
     * @param $input
     */
    public function setBirthdateAttribute($input)
    {
        if ($input != null && $input != '') {
            $this->attributes['birthdate'] = Carbon::createFromFormat(config('app.date_format'), $input)->format('Y-m-d');
        } else {
            $this->attributes['birthdate'] = null;
        }
    }

    /**
     * Get attribute from date format
     * @param $input
     *
     * @return string
     */
    public function getBirthdateAttribute($input)
    {
        $zeroDate = str_replace(['Y', 'm', 'd'], ['0000', '00', '00'], config('app.date_format'));

        if ($input != $zeroDate && $input != null) {
            return Carbon::createFromFormat('Y-m-d', $input)->format(config('app.date_format'));
        } else {
            return '';
        }
    }

    /**
     * Set to null if empty
     * @param $input
     */
    public function setRoleIdAttribute($input)
    {
        $this->attributes['role_id'] = $input ? $input : null;
    }

    /**
     * Set to null if empty
     * @param $input
     */
    public function setGroupIdAttribute($input)
    {
        $this->attributes['group_id'] = $input ? $input : null;
    }
    
    public function role()
    {
        return $this->belongsTo(Role::class, 'role_id');
    }
    
    public function group()
    {
        return $this->belongsTo(Group::class, 'group_id')->withTrashed();
    }
    
    
    

    public function sendPasswordResetNotification($token)
    {
       $this->notify(new ResetPassword($token));
    }
}
