<?php

namespace Model;

Class RecordModel extends \core\lib\model
{
	public function __construct()
	{
		$this->table = 'record';
		parent::__construct();
	}
}