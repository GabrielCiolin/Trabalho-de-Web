<?php

class Functions {

    public function fixCharacter($value, $type) {
        switch($type) {
            case 1: $rst = utf8_decode($value); break;
            case 2: $rst = utf8_encode($value); break; 
            case 3: $rst = htmlentities($value, ENT_QUOTES, "ISO-8859-1"); break; 
        }
        return $rst;
    }

    public function base64($value, $type){
        switch($type) {
            case 1: $rst = base64_encode($value); break;
            case 2: $rst = base64_decode($value); break;
        }
        return $rst;
    }

    
}


?>