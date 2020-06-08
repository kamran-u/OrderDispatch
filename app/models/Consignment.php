<?php
 
namespace Models;
 
use \Illuminate\Database\Eloquent\Model;
 
class Consignment extends Model
{
     
    protected $table = 'consignments';
    protected $fillable = ['consignment_id', 'batch_id', 'created_by', 'courier_id'];
    protected $dates = ['deleted_at'];

}