<?php

namespace App\Models;

use App\Models\Customer;
use Illuminate\Database\Eloquent\Model;
use Backpack\CRUD\app\Models\Traits\CrudTrait;

class User extends Model
{
    use CrudTrait;

    /*
    |--------------------------------------------------------------------------
    | GLOBAL VARIABLES
    |--------------------------------------------------------------------------
    */
    protected $table = 'users';
    protected $primaryKey = 'id';
    // public $timestamps = false;
    protected $guarded = ['id'];
    protected $fillable = ['name','email','password','is_provider'];
    // protected $hidden = [];
    // protected $dates = [];

    /*
    |--------------------------------------------------------------------------
    | FUNCTIONS
    |--------------------------------------------------------------------------
    */
    public function openReceive($crud = false)
    {
        return '<a class="btn btn-sm btn-link" href="http://phplaravel-421479-1568723.cloudwaysapps.com/admin/Addrecive/'.urlencode($this->id).'" data-toggle="tooltip" title="Just a demo custom button."><i class="la la-search"></i> Receive</a>';
    }

    public function openPay($crud = false)
    {
        return '<a class="btn btn-sm btn-link" href="http://phplaravel-421479-1568723.cloudwaysapps.com/admin/AddPay/'.urlencode($this->id).'" data-toggle="tooltip" title="Just a demo custom button."><i class="la la-search"></i> Pay</a>';
    }
    /*
    |--------------------------------------------------------------------------
    | RELATIONS
    |--------------------------------------------------------------------------
    */

    public function Customer()
    {
        return $this->hasMany(Customer::class, 'user_id');
    }
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
    // public function setPasswordAttribute($value) {
    //     $this->attributes['password'] = Hash::make($value);
    // }
}
