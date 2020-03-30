<?php

class Time{

	private $startController;

	private $stopController;

	public function startController(): void {
		$this->startController = microtime(true);
	}

	public function stopController(): void {
		$this->stopController = microtime(true);
	}

	public function calculationTime(): string {
		return number_format($this->stopController - $this->startController, 3, ',', '');
	}
}