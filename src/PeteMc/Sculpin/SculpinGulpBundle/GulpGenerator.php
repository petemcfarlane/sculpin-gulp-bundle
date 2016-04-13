<?php

namespace PeteMc\Sculpin\SculpinGulpBundle;

use Sculpin\Core\Event\SourceSetEvent;
use Sculpin\Core\Sculpin;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\Process\Process;

class GulpGenerator implements EventSubscriberInterface
{
    /**
     * {@inheritdoc}
     */
    public static function getSubscribedEvents()
    {
        return [
            Sculpin::EVENT_AFTER_RUN => 'runGulp'
        ];
    }

    /**
     * @param  SourceSetEvent $sourceSetEvent
     */
    public function runGulp(SourceSetEvent $sourceSetEvent)
    {
        if ($process = $this->getProcess($sourceSetEvent)) {
            echo 'Running gulp.' . PHP_EOL;
            $process->run();
            echo $process->getOutput() . PHP_EOL;
        }
    }

    /**
     * @param  SourceSetEvent $sourceSetEvent
     *
     * @return null|Process
     */
    public function getProcess(SourceSetEvent $sourceSetEvent)
    {
        if ($sourceSetEvent->updatedSources()) {
            return new Process('gulp sculpin');
        }
        return null;
    }
}
