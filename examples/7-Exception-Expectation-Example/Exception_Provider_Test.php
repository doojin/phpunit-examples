<?php

require_once 'Exception_Provider.php';

class Exception_Provider_Test extends PHPUnit_Framework_TestCase
{
    public function test__get_default_value__should_return_default_value_if_it_is_set()
    {
        $exception_provider = new Exception_Provider('dummy value');
        
        $value = $exception_provider->get_default_value();
        
        $this->assertEquals('dummy value', $value);
    }
    
    /**
     * @expectedException               Exception
     * @expectedExceptionMessage        Default value is not set!
     * @expectedExceptionMessageRegExp  #^Default value.*$#
     * @expectedExceptionCode           123
     */
    public function test__get_default_value__should_throw_exception_if_default_value_is_not_set()
    {
        $exception_provider = new Exception_Provider();
        
        $value = $exception_provider->get_default_value();
    }
    
    public function test__get_default_value__should_throw_exception_if_default_value_is_not_set2()
    {
        $this->setExpectedException('Exception', 'Default value is not set!', 123);
        $this->setExpectedExceptionRegExp('Exception', '/^Default value.*$/', 123);

        $exception_provider = new Exception_Provider();
        
        $value = $exception_provider->get_default_value();
    }
    
    public function test__get_default_value__should_throw_exception_if_default_value_is_not_set3()
    {
        $exception_provider = new Exception_Provider();
        
        try
        {
            $value = $exception_provider->get_default_value();
        }
        catch (Exception $e)
        {
            return;
        }
        
        $this->fail('Exception expected, but not found.');
    }
}

?>