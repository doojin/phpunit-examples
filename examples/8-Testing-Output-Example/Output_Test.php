<?php

class Output_Test extends PHPUnit_Framework_TestCase
{
	public function test__output_expectation_should_not_fail_for_a_single_string()
	{
		$this->expectOutputString('Hello, world!');
		
		echo 'Hello, world!';
	}
	
	public function test__output_expectation_should_not_fail_for_multiple_strings()
	{
		$this->expectOutputString('HelloWorld');
		
		print 'Hello';
		echo 'World';
	}
	
	public function test__output_expectation_should_not_fail_for_multiple_output_using_cycle()
	{
		$this->expectOutputString('abc123efg');
		
		$string_array = array('abc', '123', 'efg');
		foreach ($string_array as $string)
		{
			echo $string;
		}
	}
	
	public function test__output_regexp_expectation_should_not_fail()
	{
		$this->expectOutputRegex('/^H.*ld\!$/');
		
		echo 'Hello, world!';
	}
	
	public function test__setOutputCallback__should_work_correctly()
	{
		$this->setOutputCallback('Output_Test::custom_callback');
		$this->expectOutputString('!H!e!l!l!o!,! !w!o!r!l!d!!');
		
		echo 'Hello, world!';
	}
	
	public static function custom_callback($string)
	{
		$output = '';
		for ($i=0; $i<strlen($string); $i++)
		{
			$output .= '!' . $string[$i];
		}
		return $output;
	}
}