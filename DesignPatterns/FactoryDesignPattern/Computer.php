<?php

abstract class Computer {

	abstract public function getRAM();
	abstract public function getHDD();
	abstract public function getCPU();
	
	//@Override
	public function toString(){
		return "RAM= "+this.getRAM()+", HDD="+this.getHDD()+", CPU="+this.getCPU();
	}
}


