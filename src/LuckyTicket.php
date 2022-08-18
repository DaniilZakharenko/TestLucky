<?php

class LuckyTicket{

    private int $allCount;
    public int $lengthNumberTicket = 6;
    public function __construct(public int $start,public int $end){}

    public function getCountOptimize():int{
        $this->allCount = 0;
        $this->addCountInStart();
        $this->addCountInBody();
        $this->addCountInEnd();
        return $this->allCount;
    }

    public function getCountWithoutOptimize():int{
        $this->allCount = 0;
        $this->getCountInFormat($this->start, $this->end);
        return $this->allCount;
    }

    public function checkLuckyNumber($num):bool{
        $arrNum = $this->separateNum($num);
        $sum1 = $this->plus($arrNum[0]);
        $sum2 = $this->plus($arrNum[1]);
        if($sum1 == $sum2){
            return true;
        }
        return false;
    }

    private function addCountInStart():void{
        $countT = $this->separateNum($this->start)[0]+1;
        $this->getCountInFormat($this->start, $countT*1000);
    }
    private function addCountInEnd():void{
        $countT = $this->separateNum($this->end)[0];
        $this->getCountInFormat($countT*1000, $this->end);
    }
    private function addCountInBody():void{
        $countStartT = $this->separateNum($this->start)[0] + 1;
        $countEndT = $this->separateNum($this->end)[0];
        $this->allCount += ($countEndT - $countStartT)*111;
    }

    private function getCountInFormat($start, $end):void{
        for ($i=$start; $i<=$end; $i++){
            $this->checkLuckyNumber($i) ? $this->allCount++:0;
        }
    }

    private function separateNum($num):array{
        $numbers = [];
        if(strlen($num)>$this->lengthNumberTicket/2){
            $numbers[0] = substr($num, 0, strlen($num) - $this->lengthNumberTicket/2);
            $numbers[1] = substr($num, strlen($num) - $this->lengthNumberTicket/2, $this->lengthNumberTicket/2);
        }else{
            $numbers[0] = 0;
            $numbers[1] = $num;
        }
        return $numbers;
    }

    private function plus(string $num):int{
      do {
          $sum = 0;
          $arrStrs = str_split($num);
          foreach ($arrStrs as $str){
              $sum +=(int)$str;
          }
          $num = $sum;
      }while(strlen($sum)>1);
      return $sum;
    }
}


