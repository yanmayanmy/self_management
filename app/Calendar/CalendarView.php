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

	/**
	 * 週カレンダーを一月分用意
	 */
	protected function getweeks(){
		$weeks = [];

		$firstDay = $this->carbon->copy()->firstOfMonth();
		$lastDay = $this->carbon->copy()->lastOfMonth();

		$week = new CalendarWeek($firstDay->copy()); //CalendarWeekはその週のカレンダーを出力するクラス。（CalendarWeek.php参照）
		$weeks[] = $week;

		$tmpDay = $firstDay->copy()->addDay(7)->startOfWeek(); //初日の翌週の月曜日

		while($tmpDay->lte($lastDay))
		{
			$week = new CalendarWeek($tmpDay, count($weeks)); //count関数...要素の数を返す。一回目のループは 1.
			$weeks[] = $week;

			$tmpDay->addDay(7);
		}

		return $weeks;
	}
}