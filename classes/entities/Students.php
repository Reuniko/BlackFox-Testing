<?php

namespace Testing;

class Students extends \BlackFox\SCRUD {

	public function Init() {
		$this->name = 'Students';
		$this->fields = [
			'ID'         => self::ID,
			'FIRST_NAME' => [
				'TYPE'  => 'STRING',
				'NAME'  => 'First name',
				'VITAL' => true,
			],
			'LAST_NAME'  => [
				'TYPE' => 'STRING',
				'NAME' => 'Last name',
			],
			'GRADE'      => [
				'TYPE'    => 'OUTER',
				'LINK'    => 'Testing\Grades',
				'NAME'    => 'Grade',
				'FOREIGN' => 'RESTRICT',
			],
		];
	}

	public function GetElementTitle($element = []) {
		return $element['FIRST_NAME'];
	}

	public function Fill($total) {
		$names = file(__DIR__ . '/data/names.txt', FILE_IGNORE_NEW_LINES);
		$lasts = ['J', 'G', 'V', 'X', 'Z'];
		$grades = array_values(Grades::I()->GetColumn());
		$this->Database->StartTransaction();
		for ($i = 1; $i < $total; $i++) {
			$this->Create([
				'FIRST_NAME' => $names[array_rand($names)],
				'LAST_NAME'  => $lasts[array_rand($lasts)] . '.',
				'GRADE'      => next($grades) ?: reset($grades), //Grades::I()->GetCell([], 'ID', ['{RANDOM}' => 'ASC']),
			]);
		}
		$this->Database->Commit();
	}
}