<?php
use PHPUnit\Framework\TestCase;

class ExampleTest extends TestCase
{
    /** @test */
    public function it_normalizes_a_string_for_the_cache_key()
    {
        $cache = $this->prophesize(RussianCache::class);
        $directive = new BladeDirective($cache->reveal());

        // this is the test
        $cache->has('cache-key')->shouldBeCalled();

        $directive->setUp('cache-key');
    }

    /** @test */
    public function it_normalizes_a_cacheable_model_for_the_cache_key()
    {
        $cache = $this->prophesize(RussianCache::class);
        $directive = new BladeDirective($cache->reveal());

        // this is the test
        $cache->has('stub-cache-key')->shouldBeCalled();

        $directive->setUp(new ModelStub);
    }
}

class ModelStub
{
    public function getCacheKey()
    {
        return 'stub-cache-key';
    }
}
