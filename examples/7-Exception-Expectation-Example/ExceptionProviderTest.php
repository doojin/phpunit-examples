<?php

require_once 'ExceptionProvider.php';

class ExceptionProviderTest extends PHPUnit_Framework_TestCase
{
    /**
     * @throws Exception
     */
    public function test_getDefaultValue_ShouldReturnDefaultValueIfItIsSet()
    {
        $exceptionProvider = new ExceptionProvider('dummy value');
        
        $value = $exceptionProvider->getDefaultValue();
        
        $this->assertEquals('dummy value', $value);
    }
    
    /**
     * @expectedException               Exception
     * @expectedExceptionMessage        Default value is not set!
     * @expectedExceptionMessageRegExp  #^Default value.*$#
     * @expectedExceptionCode           123
     */
    public function test_getDefaultValue_ShouldThrowExceptionIfDefaultValueIsNotSet()
    {
        $exceptionProvider = new ExceptionProvider();

        $exceptionProvider->getDefaultValue();
    }

    /**
     * @throws Exception
     */
    public function test_getDefaultValue_ShouldThrowExceptionIfDefaultValueIsNotSet2()
    {
        $this->setExpectedException('Exception', 'Default value is not set!', 123);
        $this->setExpectedExceptionRegExp('Exception', '/^Default value.*$/', 123);

        $exceptionProvider = new ExceptionProvider();
        
        $exceptionProvider->getDefaultValue();
    }

    public function test_getDefaultValue_ShouldThrowExceptionIfDefaultValueIsNotSet3()
    {
        $exceptionProvider = new ExceptionProvider();
        
        try {
            $exceptionProvider->getDefaultValue();
        } catch (Exception $e) {
            return;
        }
        
        $this->fail('Exception expected, but not found.');
    }
}

?>