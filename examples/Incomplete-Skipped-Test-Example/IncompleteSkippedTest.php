<?php

class IncompleteSkippedTest extends PHPUnit_Framework_TestCase
{
    public function test_ShouldBeConsideredAsIncompleteTest()
    {
        $this->markTestIncomplete('Test is incomplete');
        $this->fail();
    }

    public function test_ShouldBeMarkedAsSkipped()
    {
        $this->markTestSkipped('Test is skipped');
        $this->fail();
    }

    /**
     * @requires extension UnknownExtension
     */
    public function test_ShouldNotRunIfExtensionWasNotLoaded()
    {
        $this->fail();
    }
}