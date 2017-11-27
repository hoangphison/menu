<?php

namespace Spatie\Menu\Test\Traits;

use PHPUnit\Framework\TestCase;
use Spatie\Menu\Traits\Activatable;

class AnonymousClass0
{
    use Activatable;
    protected $active = false;
}

class ActivatableTest extends TestCase
{
    protected $activatable;

    public function setUp()
    {
        /*$this->activatable = new class {
            use Activatable;
            protected $active = false;
        };*/
    }

    /** @test */
    public function it_can_be_set_active()
    {
        $this->assertTrue((new AnonymousClass0)->setActive()->isActive());
    }

    /** @test */
    public function it_can_be_set_inactive_via_set_active()
    {
        $this->assertFalse((new AnonymousClass0)->setActive()->setActive(false)->isActive());
    }

    /** @test */
    public function it_can_be_set_inactive_via_set_inactive()
    {
        $this->assertFalse((new AnonymousClass0)->setActive()->setInactive()->isActive());
    }

    /** @test */
    public function it_can_be_set_active_via_a_callable()
    {
        $this->assertFalse((new AnonymousClass0)->setActive(function () {
            return false;
        })->isActive());
    }
}
