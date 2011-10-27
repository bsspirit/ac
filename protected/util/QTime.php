<?php
class QTime
{
	private $offsetTime = 0;//28800
	private $curtime = 0;
	private $bittime = 0;
	private $dayTime = 0;
	
	public function __construct(){
		$this->setTime();
	}
	
	public function setTime($time=null){
		if($time==null){
			$this->curtime = time();
		}else{
			$this->curtime = $time;
		}
	}
	
	public function getTime(){
		return $this->attachOffset($this->curtime);
	}
	
	public function setDayTime(){
		$this->dayTime = strtotime(date('Y-m-d', $this->curtime));
	}
	
	public function getDayTime(){
		if($this->dayTime == 0){
			$this->setDayTime();
		}
		return $this->attachOffset($this->dayTime);
	}
	
	public function setOffsetTime($time){
		$this->offsetTime = $time;
	}
	
	public function setBittime($time){
		$this->bittime = $time;
	}
	
	private function attachOffset($times){
		if(is_array($times)){
			foreach ($times as $k => $v){
				$times[$k] = $this->attachOffset($v);
			}
		}else{
			$times += $this->offsetTime;
		}
		return $times;
	}
}