<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Representative extends Model
{
     /**
     *     id: number;
	*name: string;
	*email: string;
	*dob: string;
	*schema: string;
	*curp: string;
	*rfc: string;
     */
    protected $fillable = ['id', 'name','email','dob','schema','curp','rfc'];

}
