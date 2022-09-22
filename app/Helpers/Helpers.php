<?php

use Carbon\Carbon;

if (!function_exists('calendar')){
    function calendar($date = null)
    {
        $date = empty($date) ? Carbon::now() : Carbon::createFromDate($date);
        $startOfCalendar = $date->copy()->firstOfMonth()->startOfWeek(Carbon::SUNDAY);
        $endOfCalendar = $date->copy()->lastOfMonth()->endOfWeek(Carbon::SATURDAY);

        $html = '<div class="calendar">';

        $html .= '<div class="month-year">';
        $html .= '<span class="month">' . $date->format('F') .'-'.$date->format('Y') .'</span>';
        $html .= '</div>';

        $html .= '<div class="days text-center">';

        $dayLabels = ['Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat'];
        foreach ($dayLabels as $dayLabel)
        {
            $html .= '<span class="day-label">' . $dayLabel . '</span>';
        }

        while($startOfCalendar <= $endOfCalendar)
        {
            $extraClass = $startOfCalendar->format('m') != $date->format('m') ? 'dull' : '';
            $extraClass .= $startOfCalendar->isToday() ? ' today' : '';

            $html .= '<span class="day text-center '.$extraClass.'"><a href="/predictions/betting-tips/'.$startOfCalendar->format('Y-m-d').'" title="Football Prediction"><span class="content">' . $startOfCalendar->format('j') . '</span></a> </span>';
            $startOfCalendar->addDay();
        }
        $html .= '</div></div>';
        return $html;
    }
}
