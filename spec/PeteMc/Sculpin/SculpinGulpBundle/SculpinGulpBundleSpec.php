<?php

namespace spec\PeteMc\Sculpin\SculpinGulpBundle;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use Symfony\Component\HttpKernel\Bundle\Bundle;

class SculpinGulpBundleSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('PeteMc\Sculpin\SculpinGulpBundle\SculpinGulpBundle');
    }

    function it_is_a_symfony_kernel_bundle()
    {
        $this->shouldImplement(Bundle::class);
    }
}
