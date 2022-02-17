<?php
namespace App\Calendar;
use App\Models\Book;
use Carbon\Carbon;

class CalendarView {

	private $carbon;
	private $todo;

	function __construct($date, $todo){
		$this->carbon = new Carbon($date);
		$this->todo = $todo;
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
            '<div id="calendar">',
            '<table class="table">',
            '<thead>',
            '<tr>',
            '<th>Mon</th>',
            '<th>Tue</th>',
            '<th>Wed</th>',
            '<th>Thu</th>',
            '<th>Fri</th>',
            '<th>Sat</th>',
            '<th>Sun</th>',
            '</tr>',
            '</thead>'
        ];


		$html[] = '<tbody>';

		$weeks = $this->getWeeks();
		foreach($weeks as $week){
			$html[] = '<tr class="week ' .$week->getClassName(). '">';
			$days = $week->getDays();
			foreach($days as $day){
				$html[] = '<td class="' .$day->getClassName(). '">';
				$html[] = $day->render();
				$html[] = '<ul>';
				foreach($this->todo['books'] as $book){
					if($book->start_time != NULL){
						$startDate = $book->start_time->setTime(0, 0, 0); //時刻を00:00:00にして日付のみでの比較を可能にする。
						$endDate = $book->end_time->setTime(0, 0, 0);
						if($day->render_carbon()->gte($startDate) && $day->render_carbon()->lte($endDate)){
							$html[] = '<li>';
							$html[] = $book->title;
							$html[] = '</li>';
						}
					}
				}
				foreach($this->todo['tasks'] as $task){
					if($task->deadline != NULL){
						$date = $task->deadline->setTime(0, 0, 0); //時刻を00:00:00にして日付のみでの比較を可能にする。
						if($date == $day->render_carbon()){
							$html[] = '<li>';
							$html[] = $task->title;
							$html[] = '</li>';
						}
					}
				}

				$html[] = '</ul>';
				$html[] = '</td>';
			}
			$html[] = '</tr>';
		}

		$html[] = '</tbody>';

        $html[] = '</table>';
		$html[] = '</div>';
		return implode("", $html);
	}

	/**
	 * @return CalendarWeek[]
	 */
	protected function getWeeks(){
		$weeks = [];

		$firstDay = $this->carbon->copy()->firstOfMonth(); //Carbonにtime関数で入力された現在時刻のタイプスタンプをもとに月初日の情報をコピー
		$lastDay = $this->carbon->copy()->lastOfMonth(); //月末日の情報をコピー

		$week = new CalendarWeek($firstDay->copy()); //CalendarWeekはその週のカレンダーを出力するクラス。（CalendarWeek.php参照）
		$weeks[] = $week;

		$tmpDay = $firstDay->copy()->addDay(7)->startOfWeek(); //初日の翌週の"月曜日"

		while($tmpDay->lte($lastDay))
		{
			$week = new CalendarWeek($tmpDay, count($weeks)); //count関数...要素の数を返す。一回目のループは 1.
			$weeks[] = $week;

			$tmpDay->addDay(7);
		}

		return $weeks;
	}
}