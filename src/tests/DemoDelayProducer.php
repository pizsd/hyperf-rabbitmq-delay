<?php
declare(strict_types=1);

namespace Zerduo\RabbitmqDelay\tests;

use Zerduo\RabbitmqDelay\DelayProducerMessage;
use Hyperf\Amqp\Annotation\Producer;

/**
 * @Producer(exchange="demo.delay", routingKey="demo.DemoDelay")
 */
class DemoDelayProducer extends DelayProducerMessage
{
	public function __construct($data)
	{
		$this->payload = $data;
	}
}