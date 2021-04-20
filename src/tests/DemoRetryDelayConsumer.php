<?php

declare(strict_types=1);

namespace Zerduo\RabbitmqDelay\tests;

use Zerduo\RabbitmqDelay\Concerns\Runnable;
use Zerduo\RabbitmqDelay\DelayConsumerMessage;
use Hyperf\Amqp\Result;
use Hyperf\Amqp\Annotation\Consumer;
use PhpAmqpLib\Message\AMQPMessage;

/**
 * @Consumer(exchange="test.delay", routingKey="test.DemoDelay", queue="test.DemoDelay", name="DemoDelay", nums=1)
 */
class DemoRetryDelayConsumer extends DelayConsumerMessage
{
	use Runnable;

	public function __construct()
	{
		$this->tries(20);
	}

	public function retriesIn()
	{
		return 60;
	}

	/**
	 * @param $data
	 * @param AMQPMessage $message
	 * @return string
	 */
	public function run($data, AMQPMessage $message): string
	{
		// do something
		return Result::ACK;
	}

	public function isEnable(): bool
	{
		return true;
	}
}