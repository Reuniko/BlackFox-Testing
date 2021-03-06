<?php

namespace Testing;

class Table1 extends \BlackFox\SCRUD {

	public function Init() {
		$this->name = 'Table1';
		$this->fields = [
			'ID'       => self::ID,
			'BOOLEAN'  => [
				'TYPE' => 'BOOLEAN',
				'NAME' => 'Bool',
			],
			'INTEGER'  => [
				'TYPE' => 'INTEGER',
				'NAME' => 'Number',
			],
			'FLOAT'    => [
				'TYPE' => 'FLOAT',
				'NAME' => 'Float',
			],
			'STRING'   => [
				'TYPE'  => 'STRING',
				'NAME'  => 'String',
				'VITAL' => true,
			],
			'LINK'     => [
				'TYPE' => 'OUTER',
				'NAME' => 'Link to self',
				'LINK' => 'Testing\Table1',
			],
			'TEXT'     => [
				'TYPE' => 'TEXT',
				'NAME' => 'Text',
			],
			'DATETIME' => [
				'TYPE' => 'DATETIME',
				'NAME' => 'Datetime',
			],
			'TIME'     => [
				'TYPE' => 'TIME',
				'NAME' => 'Time',
			],
			'DATE'     => [
				'TYPE' => 'DATE',
				'NAME' => 'Date',
			],
			'ENUM'     => [
				'TYPE'    => 'ENUM',
				'NAME'    => 'Enum',
				'VALUES'  => [
					'VALUE_1' => 'VALUE_1',
					'VALUE_2' => 'VALUE_2',
					'VALUE_3' => 'VALUE_3',
				],
				'DEFAULT' => 'VALUE_1',
			],
			'SET'      => [
				'TYPE'    => 'SET',
				'NAME'    => 'Set',
				'VALUES'  => [
					'VALUE_4' => 'VALUE_4',
					'VALUE_5' => 'VALUE_5',
					'VALUE_6' => 'VALUE_6',
					'VALUE_7' => 'VALUE_7',
				],
				'DEFAULT' => ['VALUE_4', 'VALUE_5'],
			],
			'FILE'     => [
				'TYPE' => 'FILE',
				'NAME' => 'File',
				'LINK' => 'BlackFox\Files',
			],
		];
	}

}