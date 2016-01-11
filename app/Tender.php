<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;


class Tender extends Model
{
    protected $table = 'tender';

    public $timestamps = false;

    protected $fillable = ['name', 'description', 'photo', 'author_name', 'phone', 'active_date', 'status'];

    public function setActiveDateAttribute($value)
    {

        $dtime = Carbon::createFromFormat('m/d/Y', $value);

        $this->attributes['active_date'] = $dtime->toDateTimeString();
    }

    public function scopeActive($query)
    {
        return $query->whereIn('status', ['open', 'close']);
    }

    public function scopeDeletedTender($query)
    {
        return $query->whereStatus('delete');
    }

    public function scopeOpen($query)
    {
        return $query->whereStatus('open');
    }

    public function scopeClose($query)
    {
        return $query->whereStatus('close');
    }

    public function getDaysCountAttribute()
    {
        $dtime = ceil((Carbon::createFromFormat('Y-m-d H:i:s', $this->getAttribute('active_date'))->getTimestamp()
                - Carbon::now()->getTimestamp())/60/60/24);
        return $dtime;
    }

    public function getFormatDateAttribute()
    {
        return Carbon::createFromFormat('Y-m-d H:i:s', $this->getAttribute('active_date'))->format('m/d/Y');
    }

    public function filter($filter)
    {
        return $this->$filter()->get();
    }
}
