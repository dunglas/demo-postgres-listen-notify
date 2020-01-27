<?php

declare(strict_types=1);

namespace App\MessageHandler;

use App\Message\MyNotification;
use Symfony\Component\Messenger\Handler\MessageHandlerInterface;

final class MyNotificationHandler implements MessageHandlerInterface
{
    public function __invoke(MyNotification $message)
    {
        dump($message);
    }
}
