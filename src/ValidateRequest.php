<?php

class ValidateRequest
{
    static public function check(int $start, int $end){
        if($start < 1){
            return 'Start less 1';
        }
        if($end > 999999){
            return 'End more 999999';
        }
        if($end <= $start){
            return 'Start more end';
        }
        return true;
    }

}