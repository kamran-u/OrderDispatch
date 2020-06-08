<?php 
	
require dirname(__DIR__) . '/start.php'; 
use Controllers\ConsignmentBatch;
use Controllers\Consignments;

//user will supply courier id
$courierId 	= 1;

$batch 		 = new ConsignmentBatch();
$consignment = new Consignments();

?>
<html>
	<head>
		<title>Order Dispatcher::Gears4Music</title>
	</head>
	<body>
		<h3>Gears4Music Order Dispatcher</h3>
	<pre>
		<?php
		/*
		** start or use already started batch - using singleton - no static
		*/
		$runningBatch = $batch->start();
		if($runningBatch['status'] != 200)
		{
			die($runningBatch['msg']);
		}

		/*
		** prepare consignment and persist assignment - no static
		*/
		if(isset($_GET['consignemnt']) && $_GET['consignemnt'] == 'add')
		{
			$consignment->add($runningBatch['batchId'], $courierId);
		}


		/*
		** prepare consignment and persist assignment - no static
		*/
		if(isset($_GET['consignemnt']) && $_GET['consignemnt'] == 'end')
		{

			$status = $batch->end(11);//$runningBatch['batchId']
			print_r($status);
		}
		?>

	</body>
</html>