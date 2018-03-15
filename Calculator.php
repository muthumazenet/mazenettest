<?php
// Calculator.php
class Calculator {  
const MIN_LENGTH = 6;
const MAX_LENGTH = 20;
    public function divideBy($num2) {
        $length=strlen($num2);
        return $length >= self::MIN_LENGTH && $length <= self::MAX_LENGTH;
    }   
}