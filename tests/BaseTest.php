<?php

namespace CleaniqueCoders\LaravelObservers\Tests;

class BaseTest extends TestCase
{
    /** @test */
    public function it_has_helpers()
    {
        foreach (['generate_reference', 'hashids'] as $helper) {
            $this->assertHelperExist($helper);
        }
    }

    /** @test */
    public function it_has_observer_kernel_class()
    {
        $this->assertClassExist(\CleaniqueCoders\LaravelObservers\Observers\Kernel::class);
    }

    /** @test */
    public function it_has_hashid_observer_class()
    {
        $this->assertClassExist(\CleaniqueCoders\LaravelObservers\Observers\HashidsObserver::class);
    }

    /** @test */
    public function it_has_hashid_service_class()
    {
        $this->assertClassExist(\CleaniqueCoders\LaravelObservers\Services\Hashids::class);
    }

    /** @test */
    public function it_has_reference_observer_class()
    {
        $this->assertClassExist(\CleaniqueCoders\LaravelObservers\Observers\ReferenceObserver::class);
    }
}
