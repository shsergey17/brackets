<?php
namespace shsergey17\brackets;

Class Brackets {
    
    public static $alow_symbols = '/^[\t\n\(\)\s\r]+$/';
    
    public static function check($s){
        if(!preg_match(self::$alow_symbols, $s)){
            throw new InvalidArgumentException('Wrong symbol');
        }
        $count = 0;
        for ($i = 0; $i < strlen($s); $i++){
            if($s[$i] == '('){
                $count++;
            } elseif($s[$i] == ')') {
                $count--;
            }
            if($count < 0){
                return false;
            }
        }
        return $count == 0;
    }
}

