<?php

namespace App\Models;

use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Illuminate\Database\Eloquent\Model;

class Provider extends Model
{
    use CrudTrait;

    /*
    |--------------------------------------------------------------------------
    | GLOBAL VARIABLES
    |--------------------------------------------------------------------------
    */

    protected $table = 'providers';
    // protected $primaryKey = 'id';
    // public $timestamps = false;
    protected $guarded = ['id'];
    // protected $fillable = [];
    // protected $hidden = [];
    // protected $dates = [];

    /*
    |--------------------------------------------------------------------------
    | FUNCTIONS
    |--------------------------------------------------------------------------
    */
    public function openReceive($crud = false)
    {
        return '<a class="btn btn-sm btn-link" href="http://127.0.0.1:8000/admin/AddreciveProvider/'.urlencode($this->id).'" data-toggle="tooltip" title="Just a demo custom button."><i class="la la-search"></i> Receive</a>';
    }

    public function openPay($crud = false)
    {
        return '<a class="btn btn-sm btn-link" href="http://127.0.0.1:8000/admin/Addrecive/'.urlencode($this->id).'" data-toggle="tooltip" title="Just a demo custom button."><i class="la la-search"></i> Pay</a>';
    }

    /*
    |--------------------------------------------------------------------------
    | RELATIONS
    |--------------------------------------------------------------------------
    */

    /*
    |--------------------------------------------------------------------------
    | SCOPES
    |--------------------------------------------------------------------------
    */

    /*
    |--------------------------------------------------------------------------
    | ACCESSORS
    |--------------------------------------------------------------------------
    */

    /*
    |--------------------------------------------------------------------------
    | MUTATORS
    |--------------------------------------------------------------------------
    */
}
