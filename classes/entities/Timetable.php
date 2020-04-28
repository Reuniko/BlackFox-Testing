<?php

namespace Testing;

class Timetable extends \BlackFox\SCRUD {
	public function Init() {
		$this->name = 'Timetable';
		$this->fields = [
			'ID'       => self::ID,
			'ROOM'     => [
				'TYPE'     => 'OUTER',
				'NAME'     => 'Room',
				'LINK'     => 'Rooms',
				'NOT_NULL' => true,
				'FOREIGN'  => 'CASCADE',
			],
			'GRADE'    => [
				'TYPE'     => 'OUTER',
				'NAME'     => 'Grade',
				'LINK'     => 'Grades',
				'NOT_NULL' => true,
				'FOREIGN'  => 'CASCADE',
			],
			'START'    => [
				'TYPE'     => 'DATETIME',
				'NAME'     => 'Class start time',
				'NOT_NULL' => true,
				'VITAL'    => true,
			],
			'DURATION' => [
				'TYPE'     => 'INTEGER',
				'NAME'     => 'Duration (in hours)',
				'NOT_NULL' => true,
				'DEFAULT'  => 1,
			],
		];
	}

	public function Fill($total) {
		for ($i = 0; $i < $total; $i++) {
			$this->Create([
				'GRADE' => Grades::I()->GetCell([], 'ID', ['{RANDOM}' => 'ASC']),
				'ROOM'  => Rooms::I()->GetCell([], 'ID', ['{RANDOM}' => 'ASC']),
				'START' => time() + $i * 3600,
			]);
		}
	}
}

