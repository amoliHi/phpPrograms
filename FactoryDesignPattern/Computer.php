<?php

/**
 * Computer abstract class holds abstract functions
 */
abstract class Computer
{
	/**
	 * Abstract function to get ram of product
	 */
	abstract public function getRAM();
	/**
	 * Abstract function to get HDD of product
	 */
	abstract public function getHDD();
	/**
	 * Abstract function to get CPU of product
	 */
	abstract public function getCPU();

	/**
	 * @Overridden toString function to represent object as string
	 *
	 * @return string
	 */
	public function toString()
	{
		return "RAM= " . $this->getRAM() . ", HDD= " . $this->getHDD() . ", CPU= " . $this->getCPU();
	}
}
