<?php
namespace App\Calendar;
use App\Models\Book;
use Carbon\Carbon;

class CalendarView {

	private $carbon;
	private $books;

	function __construct($date, $books){
		$this->carbon = new Carbon($date);
		$this->books = $books;
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
            '</thead>'
        ];


		$html[] = '<tbody>';

		$weeks = $this->getWeeks();
		foreach($weeks as $week){
			$html[] = '<tr class="' .$week->getClassName(). '">';
			$days = $week->getDays();
			foreach($days as $day){
				$html[] = '<td class="' .$day->getClassName(). '">';
				$html[] = $day->render();
				$html[] = '<ul>';
				foreach($this->books as $book){
					if($book->deadline != NULL){
						$date = $book->deadline->setTime(0, 0, 0);
						if($date == $day->render_obj()){
							$html[] = '<li>';
							$html[] = $book->title;
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