<?php

namespace spec\PeteMc\Sculpin\SculpinGulpBundle\DependencyInjection;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use Symfony\Component\HttpKernel\DependencyInjection\Extension;

class SculpinGulpExtensionSpec extends ObjectBehavior
{
    function it_extends_symfony_dependency_injection_extension()
    {
        $this->shouldHaveType(Extension::class);
    }
}
