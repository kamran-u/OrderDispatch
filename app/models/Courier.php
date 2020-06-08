<?php
namespace Models;
use \Illuminate\Database\Eloquent\Model;
 
class Courier extends Model {
    protected $table = 'couriers';
    protected $fillable = ['courier_name'];

    const ROYAL_MAIL = 1;
    const ANC 		 = 2;
}