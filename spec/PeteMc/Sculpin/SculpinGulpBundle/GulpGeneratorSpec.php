<?php

namespace spec\PeteMc\Sculpin\SculpinGulpBundle;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use Sculpin\Core\Event\SourceSetEvent;
use Sculpin\Core\Source\SourceInterface;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\Process\Process;

class GulpGeneratorSpec extends ObjectBehavior
{
    function it_implements_symfony_event_subscriber_interface()
    {
        $this->shouldImplement(EventSubscriberInterface::class);
    }

    function it_runs_the_gulp_command_if_there_are_changed_files(SourceSetEvent $sourceSetEvent, SourceInterface $source)
    {
        $sourceSetEvent->updatedSources()->willReturn([$source]);
        $this->getProcess($sourceSetEvent)->shouldBeLike(new Process('gulp sculpin'));
    }

    function it_does_not_run_the_gulp_command_if_there_are_no_changed_files(SourceSetEvent $sourceSetEvent)
    {
        $sourceSetEvent->updatedSources()->willReturn([]);
        $this->getProcess($sourceSetEvent)->shouldReturn(null);
    }
}
