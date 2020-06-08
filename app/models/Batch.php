<?php
 
namespace Models;
 
use \Illuminate\Database\Eloquent\Model;
 
class Batch extends Model
{
     
    protected $table = 'batches';
    protected $fillable = ['started_by', 'closed_by'];
    protected $dates = ['deleted_at, closed_at'];

    public function courierName()
    {
        return $this->hasOneThrough('Models\Consignment', 'Models\Couriers');
    }
}
 
?>