<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use MaddHatter\LaravelFullcalendar\Facades\Calendar;


class EventController extends Controller
{
    //
    public function showEvent(){

        $events = [];

        $events[] = Calendar::event(
            "Event one",//event title
            true,//full day: boolean value
            "2017-01-02T0900",//event staring date
            "2017-01-02T0900",//event  ending date
            1,
            [
                'url' => 'www.facebook.com',
                'color' => 'red'
            ]
        );
        $events[] = Calendar::event(
            "Event two",//event title
            true,//full day: boolean value
            "2017-01-02T0900",//event staring date
            "2017-01-05T0700",//event  ending date
            1
        );

        $events[] = Calendar::event(
            "Valentine's Day", //event title
            true, //full day event?
            new \DateTime('2017-01-14'), //start time (you can also use Carbon instead of DateTime)
            new \DateTime('2011-01-15'), //end time (you can also use Carbon instead of DateTime)
            'stringEventId' //optionally, you can specify an event ID
        );

        $calendar = Calendar::addEvents($events)
                    ->setOptions([
                        'firstDay' => 1,
                    ])->setCallbacks([

            ]);

        return view('events.index', array('calendar'=>$calendar));
    }
}
