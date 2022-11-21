<?php

class Date
{
    private $date;

    public function __construct($date = null)
    {
        if ($date != null) {
            if (!$this->date = strtotime($date)) {
                $this->date = time();
            }
        } else {
            $this->date = time();
        }
    }

    public function getDay()
    {
        return date('d', $this->date);
    }

    public function getMonth($lang = null)
    {
        $translate = [
            'January' => "Январь",
            'February' => "Февраль",
            'March' => "Март",
            'April' => "Апрель",
            'May' => "Май",
            'June' => "Июнь",
            'July' => "Июль",
            'August' => "Август",
            'September' => "Сентябрь",
            'October' => "Октябрь",
            'November' => "Ноябрь",
            'December' => "Декабрь"
        ];
        if ($lang == 'ru') {
            $month = date('F', $this->date);
            return $translate[$month];
        } elseif ($lang == 'en' || $lang == null) {
            return date('F', $this->date);
        }
    }

    public function getYear()
    {
        return date('Y', $this->date);
    }

    public function getWeekDay($lang = null)
    {
        $translate = [
            1 => 'Понедельник',
            2 => 'Вторник',
            3 => 'Среда',
            4 => 'Четверг',
            5 => 'Пятница',
            6 => 'Суббота',
            7 => 'Воскресенье'
        ];
        if ($lang == 'ru') {
            $day =(int) date('N', $this->date);
            return $translate[$day];
        } else {
            return date('l', $this->date);
        }
    }

    public function addDay($value)
    {
        $this->date=strtotime("+$value day",$this->date);
    }

    public function subDay($value)
    {
        $this->date=strtotime("-$value day",$this->date);
    }

    public function addMonth($value)
    {
        $this->date=strtotime("+$value month",$this->date);
    }

    public function subMonth($value)
    {
        $this->date=strtotime("-$value month",$this->date);
    }

    public function addYear($value)
    {
        $this->date=strtotime("+$value year",$this->date);
    }

    public function subYear($value)
    {
        $this->date=strtotime("-$value year",$this->date);
    }

    public function format($format)
    {
        return date($format,$this->date);
    }

    public function __toString()
    {
        return date('Y-m-d',$this->date);
    }
}
