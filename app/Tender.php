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

}
