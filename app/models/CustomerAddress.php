<?php
 
namespace Models;
 
use \Illuminate\Database\Eloquent\Model;
 
class CustomerAddress extends Model
{     
    protected $table = 'customer_address';
    //protected $guarded = [];
    protected $dates = ['deleted_at'];

    public function customer()
    {
    	return $this->belongsTo(Customer::class);
    }
}