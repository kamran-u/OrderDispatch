<?php
namespace Controllers;

use Models\Batch;
use Models\Consignment;
use Services\Courier\DispatchConsignmentIds;
use \Carbon\Carbon;

class ConsignmentBatch
{
    /**
     * Start new batch or continue started batch
     * @return array
     */
    public function start()
    {
        //check if batch already started if not the create
        $batch = Batch::whereDate('created_at', Carbon::today())->select(['id', 'deleted_at', 'closed_at'])->get();
        $closed_at = $batch->pluck('closed_at')->first();
        $deleted_at = $batch->pluck('deleted_at')->first();

        if($closed_at || $deleted_at)
        {
        	return [
        			'status' => 403,
        			'msg' => 'Batch closed or deleted'
        		];
        }


        $msg = 'Batch open';
        if(!$batch->count())
        {
        	$batch = Batch::create(['started_by' => loggedInUserId()]);
        	$msg = 'New batch started';
        }

        return [
        			'status' => 200,
        			'msg' => $msg,
        			'batchId' => $batch->pluck('id')->first()
        		];
    }

    /**
     * Dispatch consignment ids to relevant couriers
     * close the batch 
     * @return array
     */
    public function end($batchId)
    {
        $consignments = Consignment::where('batch_id', $batchId)->get(['courier_id', 'consignment_id'])
                                                                ->groupBy('courier_id')
                                                                ->toArray();

        $dispatchStatus = (new DispatchConsignmentIds())->handle($consignments);

        Batch::find($batchId)->update(['closed_by' => loggedInUserId(), 'closed_at' => now()]);
        
        return $dispatchStatus;
    }
}