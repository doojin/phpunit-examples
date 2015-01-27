<?php

require_once('Kittens_Creator.php');
require_once('Kitten.php');

class Kittens_Creator_Test extends PHPUnit_Framework_TestCase
{
    public function test__create_kittens__should_create_an_array_of_kittens()
    {
        $kittens_creator = new Kittens_Creator();
        $expected_kittens = array(
            0 => new Kitten(),
            1 => new Kitten(),
            2 => new Kitten(),
            3 => new Kitten(),
            4 => new Kitten()
        );
        
        $kittens_creator->create_kittens(5);
        $actual_kittens = PHPUnit_Framework_Assert::readAttribute($kittens_creator, 'kittens');
        
        $this->assertEquals($expected_kittens, $actual_kittens);
        $this->assertFalse($actual_kittens[0]->isHappy);
        $this->assertFalse($actual_kittens[1]->isHappy);
        $this->assertFalse($actual_kittens[2]->isHappy);
        $this->assertFalse($actual_kittens[3]->isHappy);
        $this->assertFalse($actual_kittens[4]->isHappy);
        
        return $kittens_creator;
    }
    
    /**
     * @depends test__create_kittens__should_create_an_array_of_kittens
     */
    public function test__make_happy__should_make_all_kittens_happy($kittens_creator)
    {
        $kittens_creator->make_happy();
        $actual_kittens = PHPUnit_Framework_Assert::readAttribute($kittens_creator, 'kittens');
        
        $this->assertTrue($actual_kittens[0]->isHappy);
        $this->assertTrue($actual_kittens[1]->isHappy);
        $this->assertTrue($actual_kittens[2]->isHappy);
        $this->assertTrue($actual_kittens[3]->isHappy);
        $this->assertTrue($actual_kittens[4]->isHappy);
        
        return $kittens_creator;
    }
    
    /**
     * @depends test__make_happy__should_make_all_kittens_happy
     */
    public function test__get_kittens_array__should_return_an_actual_kittens_array($kittens_creator)
    {
        $expected_kittens = array();
        $expected_kittens[] = new Kitten(true);
        $expected_kittens[] = new Kitten(true);
        $expected_kittens[] = new Kitten(true);
        $expected_kittens[] = new Kitten(true);
        $expected_kittens[] = new Kitten(true);
        
        $actual_kittens = $kittens_creator->get_kittens_array();
        
        $this->assertEquals($expected_kittens, $actual_kittens);
    }
}

?>