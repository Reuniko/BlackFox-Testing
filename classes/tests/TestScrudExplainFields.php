<?php

namespace Testing;

class TestScrudExplainFields extends Test {
	public $name = 'Test SCRUD: method ExplainFields';

	/** @var \BlackFox\SCRUD $SCRUD */
	public $SCRUD = null;
	public $limit = 100;

	/** Getting instance of TestScrudBase */
	public function TestGetInstance() {
		$this->SCRUD = Table1::I();
	}

	/** * — all fields of 1st layer */
	public function Test1A() {
		$fields = $this->SCRUD->ExplainFields(['*']);
		//debug(var_export($fields, true));
		$awaits = [
			'ID'       => 'ID',
			'BOOLEAN'  => 'BOOLEAN',
			'INTEGER'  => 'INTEGER',
			'FLOAT'    => 'FLOAT',
			'STRING'   => 'STRING',
			'LINK'     => 'LINK',
			'TEXT'     => 'TEXT',
			'DATETIME' => 'DATETIME',
			'TIME'     => 'TIME',
			'DATE'     => 'DATE',
			'ENUM'     => 'ENUM',
			'SET'      => 'SET',
			'FILE'     => 'FILE',
		];
		if ($fields <> $awaits) {
			throw new Exception($fields);
		}
	}

	/** @ — vital fields of 1st layer */
	public function Test1V() {
		$fields = $this->SCRUD->ExplainFields(['@']);
		//debug(var_export($fields, true));
		$awaits = [
			'ID'     => 'ID',
			'STRING' => 'STRING',
		];
		if ($fields <> $awaits) {
			throw new Exception($fields);
		}
	}

	/** ** — all fields of 1st layer, all fields of 2nd layer */
	public function Test1A2A() {
		$fields = $this->SCRUD->ExplainFields(['**']);
		//debug(var_export($fields, true));
		$awaits = [
			'ID'       => 'ID',
			'BOOLEAN'  => 'BOOLEAN',
			'INTEGER'  => 'INTEGER',
			'FLOAT'    => 'FLOAT',
			'STRING'   => 'STRING',
			'LINK'     => [
				'ID'       => 'ID',
				'BOOLEAN'  => 'BOOLEAN',
				'INTEGER'  => 'INTEGER',
				'FLOAT'    => 'FLOAT',
				'STRING'   => 'STRING',
				'LINK'     => 'LINK',
				'TEXT'     => 'TEXT',
				'DATETIME' => 'DATETIME',
				'TIME'     => 'TIME',
				'DATE'     => 'DATE',
				'ENUM'     => 'ENUM',
				'SET'      => 'SET',
				'FILE'     => 'FILE',
			],
			'TEXT'     => 'TEXT',
			'DATETIME' => 'DATETIME',
			'TIME'     => 'TIME',
			'DATE'     => 'DATE',
			'ENUM'     => 'ENUM',
			'SET'      => 'SET',
			'FILE'     => [
				'ID'          => 'ID',
				'CREATE_DATE' => 'CREATE_DATE',
				'CREATE_BY'   => 'CREATE_BY',
				'NAME'        => 'NAME',
				'SIZE'        => 'SIZE',
				'TYPE'        => 'TYPE',
				'SRC'         => 'SRC',
			],
		];
		if ($fields <> $awaits) {
			throw new Exception($fields);
		}
	}

	/** *@ — all fields of 1st layer, vital fields of 2nd layer */
	public function Test1A2V() {
		$fields = $this->SCRUD->ExplainFields(['*@']);
		//debug(var_export($fields, true));
		$awaits = [
			'ID'       => 'ID',
			'BOOLEAN'  => 'BOOLEAN',
			'INTEGER'  => 'INTEGER',
			'FLOAT'    => 'FLOAT',
			'STRING'   => 'STRING',
			'LINK'     => [
				'ID'     => 'ID',
				'STRING' => 'STRING',
			],
			'TEXT'     => 'TEXT',
			'DATETIME' => 'DATETIME',
			'TIME'     => 'TIME',
			'DATE'     => 'DATE',
			'ENUM'     => 'ENUM',
			'SET'      => 'SET',
			'FILE'     => [
				'ID'   => 'ID',
				'NAME' => 'NAME',
				'SIZE' => 'SIZE',
				'TYPE' => 'TYPE',
				'SRC'  => 'SRC',
			],
		];
		if ($fields <> $awaits) {
			throw new Exception($fields);
		}
	}

	/** complex selection */
	public function TestComplex() {
		$fields = $this->SCRUD->ExplainFields([
			'@',
			'BOOLEAN',
			'LINK' => ['@', 'INTEGER', 'FILE'],
		]);
		//debug(var_export($fields, true));
		$awaits = [
			'ID'      => 'ID',
			'STRING'  => 'STRING',
			'BOOLEAN' => 'BOOLEAN',
			'LINK'    => [
				'ID'      => 'ID',
				'STRING'  => 'STRING',
				'INTEGER' => 'INTEGER',
				'FILE'    => 'FILE',
			],
		];
		if ($fields <> $awaits) {
			throw new Exception($fields);
		}
	}
}