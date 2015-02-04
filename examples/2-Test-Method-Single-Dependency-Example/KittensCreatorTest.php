<?php

require_once('KittensCreator.php');
require_once('Kitten.php');

class KittensCreatorTest extends PHPUnit_Framework_TestCase
{
    /**
     * @return KittensCreator
     */
    public function test_createKittens_ShouldCreateAnArrayOfKittens()
    {
        $kittensCreator = new KittensCreator();
        $expectedKittens = array(
            0 => new Kitten(),
            1 => new Kitten(),
            2 => new Kitten(),
            3 => new Kitten(),
            4 => new Kitten()
        );

        $kittensCreator->createKittens(5);
        $actualKittens = PHPUnit_Framework_Assert::readAttribute($kittensCreator, 'kittens');
        
        $this->assertEquals($expectedKittens, $actualKittens);
        $this->assertFalse($actualKittens[0]->isHappy);
        $this->assertFalse($actualKittens[1]->isHappy);
        $this->assertFalse($actualKittens[2]->isHappy);
        $this->assertFalse($actualKittens[3]->isHappy);
        $this->assertFalse($actualKittens[4]->isHappy);
        
        return $kittensCreator;
    }

    /**
     * @depends test_createKittens_ShouldCreateAnArrayOfKittens
     * @param KittensCreator $kittensCreator
     * @return KittensCreator
     */
    public function test_makeHappy_ShouldMakeAllKittensHappy($kittensCreator)
    {
        $kittensCreator->makeHappy();
        $actualKittens = PHPUnit_Framework_Assert::readAttribute($kittensCreator, 'kittens');
        
        $this->assertTrue($actualKittens[0]->isHappy);
        $this->assertTrue($actualKittens[1]->isHappy);
        $this->assertTrue($actualKittens[2]->isHappy);
        $this->assertTrue($actualKittens[3]->isHappy);
        $this->assertTrue($actualKittens[4]->isHappy);
        
        return $kittensCreator;
    }

    /**
     * @depends test_makeHappy_ShouldMakeAllKittensHappy
     * @param KittensCreator $kittensCreator
     */
    public function test_getKittensArray_ShouldReturnAnActualKittensArray($kittensCreator)
    {
        $expectedKittens = array();
        $expectedKittens[] = new Kitten(true);
        $expectedKittens[] = new Kitten(true);
        $expectedKittens[] = new Kitten(true);
        $expectedKittens[] = new Kitten(true);
        $expectedKittens[] = new Kitten(true);
        
        $actualKittens = $kittensCreator->getKittensArray();
        
        $this->assertEquals($expectedKittens, $actualKittens);
    }
}

?>