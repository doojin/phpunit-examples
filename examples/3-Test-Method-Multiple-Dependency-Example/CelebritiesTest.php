<?php

require_once 'Celebrities.php';

class CelebritiesTest extends PHPUnit_Framework_TestCase
{
    /**
     * @return array
     */
    public function test_getMusiciansArray_ShouldReturnMusiciansArrayOfCorrectSize()
    {
        $expectedMusicians = array(
            'Johannes Sebastian Bach',
            'The Rolling Stones',
            'Xian Xinghai',
            'Notorious B.I.G.',
            'Bob Marley'
        );
        
        $actualMusicians = Celebrities::getMusiciansArray(5);
        
        $this->assertEquals($expectedMusicians, $actualMusicians);
        return $actualMusicians;
    }

    /**
     * @return array
     */
    public function test_getActorsArray_ShouldReturnActorsArrayOfCorrectSize()
    {
        $expectedActors = array(
            'Jack Nicholson',
            'Ralph Fiennes',
            'Daniel Day-Lewis'
        );
        
        $actualActors = Celebrities::getActorsArray(3);
        
        $this->assertEquals($expectedActors, $actualActors);
        return $actualActors;
    }


    /**
     * @depends test_getMusiciansArray_ShouldReturnMusiciansArrayOfCorrectSize
     * @depends test_getActorsArray_ShouldReturnActorsArrayOfCorrectSize
     * @param array $musicians
     * @param array $actors
     */
    public function test_merge_ShouldMergeArrayOfMusiciansWithArrayOfActors($musicians, $actors)
    {
        $expectedResult = array(
            'Johannes Sebastian Bach',
            'The Rolling Stones',
            'Xian Xinghai',
            'Notorious B.I.G.',
            'Bob Marley',
            'Jack Nicholson',
            'Ralph Fiennes',
            'Daniel Day-Lewis'
        );
        
        $actualResult = Celebrities::merge($musicians, $actors);
        
        $this->assertEquals($expectedResult, $actualResult);
    }
}

?>