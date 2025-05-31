<?php

namespace App\Traits\Date;

trait DatePickerParser
{
    /**
     * Serialize Date from DatePicker Component
     * 
     * @param string $date 
     * @return string 
     */
    protected function parseDateFromDatePicker(string $date): string
    {
        return date('Y-m-d', strtotime($date));
    }

    /**
     * Serialize Time from TimePicker Component
     * 
     * @param string $time 
     * @return string 
     */
    protected function parseTimeFromTimePicker(string $time): string
    {
        return date('H:i', strtotime($time));
    }
}
