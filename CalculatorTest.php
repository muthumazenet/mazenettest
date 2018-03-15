<?php
class CalculatorTest extends \PHPUnit_Framework_TestCase {
	 const MIN_LENGTH = 6;
const MAX_LENGTH = 20;
    public function testDivideByPositiveNumber() {		
        $this->assertFalse($this->divideBy('123456789'));
    }
  
    public function divideBy($num2) {
        $length=strlen($num2);
        return $length >= self::MIN_LENGTH && $length <= self::MAX_LENGTH;
    }   
}