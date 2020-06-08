<?php
 
namespace Models;
 
use \Illuminate\Database\Eloquent\Model;
 
class Customer extends Model
{     
    protected $table = 'customers';
    //protected $guarded = [];
    protected $dates = ['deleted_at'];
    protected $primaryKey = 'id';

    public function address()
    {
    	return $this->hasMany(CustomerAddress::class);
    }
}