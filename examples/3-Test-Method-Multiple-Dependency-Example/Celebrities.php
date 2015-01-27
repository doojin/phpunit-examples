<?php

class Celebrities
{
    public static function get_musicians_array($count)
    {
        $musicians = array(
            'Johannes Sebastian Bach',
            'The Rolling Stones',
            'Xian Xinghai',
            'Notorious B.I.G.',
            'Bob Marley',
            'Madonna',
            'Caetano Veloso',
            'Fela Kuti',
            'Miles Davis',
            'Billie Holiday',
        );
        return array_slice($musicians, 0, $count);
    }
    
    public static function get_actors_array($count)
    {
        $actors = array(
            'Jack Nicholson',
            'Ralph Fiennes',
            'Daniel Day-Lewis',
            'Robert De Niro',
            'Al Pacino',
            'Dustin Hoffman',
            'Tom Hanks',
            'Brad Pitt',
            'Anthony Hopkins',
            'Marlon Brando'
        );
        return array_slice($actors, 0, $count);
    }
    
    public static function merge($arr1, $arr2)
    {
        return array_merge($arr1, $arr2);
    }
}

?>