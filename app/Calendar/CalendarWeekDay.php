<?php
namespace App\Calendar;
use Carbon\Carbon;

class CalendarWeekDay
{
    protected $carbon;

    function __construct($date)
    {
        $this->carbon = new Carbon($date);
    }

    function getClassName()
    {
        return 'day-' . strtolower($this->carbon->format("D")); //D ... 曜日の省略形式
    }

    /**
	 * @return
	 */
    function render()
    {
        return '<a href="' . route('todos.daily_plan', $this->carbon) . '" class="day">' . $this->carbon->format("j"). '</a>'; // j ... 0なしの日付
    }

    function render_carbon()
    {
        return $this->carbon;
    }
}