<?php
namespace App\Calendar;

use Carbon\Carbon;

class CalendarWeek{

    protected $carbon;
    protected $index = 0;

    function __construct($date, $index=0)
    {
        $this->carbon = new Carbon($date);
        $this->index = $index;
    }

    /**
	 * return the class name for css
	 */
    function getClassName()
    {
        return "week-" . $this->index;
    }

    /**
	 * @return CalendarWeek[]
	 */

    function getDays()
    {
        $days = [];

        $startDay = $this->carbon->copy()->firstOfWeek();
		$lastDay = $this->carbon->copy()->lastOfWeek();

		$tmpDay = $startDay->copy();

		while($tmpDay->lte($lastDay))
		{

            if($tmpDay->month() != $this->carbon->month()){
                $day = new CalendarWeekBlankDay($tmpDay->copy());
                $days[] = $day; //このへんとか、
                $tmpDay->addDay(1); //このへん、else文使ってリファクタリングできそう
                continue;
            }
			
            $day = new CalendarWeekDay($tmpDay->copy());
            $days[] = $day;

            $tmpDay->addDay(1);
		}

		return $days;
    }
}





