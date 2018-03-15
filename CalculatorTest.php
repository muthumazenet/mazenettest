<?php
// CalculatorTest.php
include_once("Calculator.php");
class CalculatorTest extends \PHPUnit_Framework_TestCase {
    public function testDivideByPositiveNumber() {
        $calcMock = new Calculator();
        $this->assertFalse($calcMock->divideBy('123456789'));
    }
   
}