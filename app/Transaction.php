<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Representative;

class Transaction extends Model
{
    protected $fillable = ['id', 'representative_id','amount','due_date','customer_name','wtp','notes'];
    function representative() {
        return $this->belongsTo('App\Representative');
    }
}
