<?php
namespace App\Calendar;

use Carbon\Carbon;

class CalendarView {

	private $carbon;

	function __construct($date){
		$this->carbon = new Carbon($date);
	}
	/**
	 * タイトル
	 */
	public function getTitle(){
		return $this->carbon->format('Y年n月');
	}

	/**
	 * カレンダーを出力する
	 */
	function render(){
		$html = [
            '<div class="calendar">',
            '<table class="table">',
            '<thead>',
            '<tr>',
            '<th>月</th>',
            '<th>火</th>',
            '<th>水</th>',
            '<th>木</th>',
            '<th>金</th>',
            '<th>土</th>',
            '<th>日</th>',
            '</tr>',
            '</thead>',
            '</table>',
            '</div>'
        ];
		return implode("", $html);
	}
}