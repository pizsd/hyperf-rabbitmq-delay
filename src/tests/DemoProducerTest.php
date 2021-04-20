<?php


namespace Zerduo\RabbitmqDelay\tests;


use Zerduo\RabbitmqDelay\DelayProducer;

class DemoProducerTest
{
	public function demo(){
		$producer = make(DelayProducer::class);
		$producer->delay(10)->produce(new DemoDelayProducer(['date' => date('Y-m-d H:i:s')]));
		//$producer->delayProduce(new DemoDelayProducer(['date' => date('Y-m-d H:i:s')]),10)
	}
}