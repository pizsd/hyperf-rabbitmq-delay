<?php

declare(strict_types=1);

namespace Zerduo\RabbitmqDelay\tests;

use Zerduo\RabbitmqDelay\DelayConsumerMessage;
use Hyperf\Amqp\Result;
use Hyperf\Amqp\Annotation\Consumer;
use PhpAmqpLib\Message\AMQPMessage;

/**
 * @Consumer(exchange="test.delay", routingKey="test.DemoDelay", queue="test.DemoDelay", name="DemoDelay", nums=1)
 */
class DemoDelayConsumer extends DelayConsumerMessage
{
	/**
	 * @param $data
	 * @param AMQPMessage $message
	 * @return string
	 */
	public function consumeMessage($data, AMQPMessage $message): string
	{
		// do something
		return Result::ACK;
	}

	public function isEnable(): bool
	{
		return true;
	}
}