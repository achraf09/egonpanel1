<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Contract
 *
 * @package App
 * @property string $contractsname
 * @property string $end_date
 * @property string $owner
*/
class Contract extends Model
{
    use SoftDeletes;

    protected $fillable = ['contractsname', 'end_date', 'owner_id'];
    
    public static function boot()
    {
        parent::boot();

        Contract::observe(new \App\Observers\UserActionsObserver);
    }

    /**
     * Set attribute to date format
     * @param $input
     */
    public function setEndDateAttribute($input)
    {
        if ($input != null && $input != '') {
            $this->attributes['end_date'] = Carbon::createFromFormat(config('app.date_format'), $input)->format('Y-m-d');
        } else {
            $this->attributes['end_date'] = null;
        }
    }

    /**
     * Get attribute from date format
     * @param $input
     *
     * @return string
     */
    public function getEndDateAttribute($input)
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
    public function setOwnerIdAttribute($input)
    {
        $this->attributes['owner_id'] = $input ? $input : null;
    }
    
    public function owner()
    {
        return $this->belongsTo(User::class, 'owner_id')->withTrashed();
    }
    
}
