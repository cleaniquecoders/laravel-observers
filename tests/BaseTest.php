<?php

namespace CleaniqueCoders\LaravelObservers\Tests;

use PHPUnit\Framework\Attributes\Test;

class BaseTest extends TestCase
{
    #[Test]
    public function it_has_helpers()
    {
        foreach (['generate_reference', 'hashids'] as $helper) {
            $this->assertHelperExist($helper);
        }
    }

    #[Test]
    public function it_has_config()
    {
        $this->assertTrue(! empty(config('observers')));
    }

    #[Test]
    public function it_has_observer_kernel_class()
    {
        $this->assertClassExist(\CleaniqueCoders\LaravelObservers\Observers\Kernel::class);
    }

    #[Test]
    public function it_has_hashid_observer_class()
    {
        $this->assertClassExist(\CleaniqueCoders\LaravelObservers\Observers\HashidsObserver::class);
    }

    #[Test]
    public function it_has_uuid_observer_class()
    {
        $this->assertClassExist(\CleaniqueCoders\LaravelObservers\Observers\UuidObserver::class);
    }

    #[Test]
    public function it_has_hashid_service_class()
    {
        $this->assertClassExist(\CleaniqueCoders\LaravelObservers\Services\Hashids::class);
    }

    #[Test]
    public function it_has_reference_observer_class()
    {
        $this->assertClassExist(\CleaniqueCoders\LaravelObservers\Observers\ReferenceObserver::class);
    }
}
