<?php

require_once('StaticProperty.php');

class BackupStaticPropertyTest extends PHPUnit_Framework_TestCase
{
    public function test_PropertyShouldBeEqualToFive()
    {
        $this->assertEquals(5, StaticProperty::$prop);
        StaticProperty::$prop = 6;
    }

    /**
     * @backupStaticAttributes enabled
     */
    public function test_PropertyShouldBeEqualToSix()
    {
        $this->assertEquals(6, StaticProperty::$prop);
        StaticProperty::$prop = 7;
    }

    public function test_PropertyShouldBeEqualToSeven()
    {
        $this->assertEquals(StaticProperty::$prop, 6);
    }
}