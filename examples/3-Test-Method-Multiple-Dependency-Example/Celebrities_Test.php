<?php

require_once 'Celebrities.php';

class Celebrities_Test extends PHPUnit_Framework_TestCase
{
    public function test__get_musicians_array__should_return_musicians_array_of_set_size()
    {
        $expected_musicians = array(
            'Johannes Sebastian Bach',
            'The Rolling Stones',
            'Xian Xinghai',
            'Notorious B.I.G.',
            'Bob Marley'
        );
        
        $actual_musicians = Celebrities::get_musicians_array(5);
        
        $this->assertEquals($expected_musicians, $actual_musicians);
        return $actual_musicians;
    }
    
    public function test__get_actors_array__should_return_actors_array_of_set_size()
    {
        $expected_actors = array(
            'Jack Nicholson',
            'Ralph Fiennes',
            'Daniel Day-Lewis'
        );
        
        $actual_actors = Celebrities::get_actors_array(3);
        
        $this->assertEquals($expected_actors, $actual_actors);
        return $actual_actors;
    }
    
    
    /**
     * @depends test__get_musicians_array__should_return_musicians_array_of_set_size
     * @depends test__get_actors_array__should_return_actors_array_of_set_size
     */
    public function test__merge__should_merge_array_of_musicians_with_array_of_actors($musicians, $actors)
    {
        $expected_result = array(
            'Johannes Sebastian Bach',
            'The Rolling Stones',
            'Xian Xinghai',
            'Notorious B.I.G.',
            'Bob Marley',
            'Jack Nicholson',
            'Ralph Fiennes',
            'Daniel Day-Lewis'
        );
        
        $actual_result = Celebrities::merge($musicians, $actors);
        
        $this->assertEquals($expected_result, $actual_result);
    }
}

?>