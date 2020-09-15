<?php

namespace App\Http\Controllers;

use App\Model\Event;
use Illuminate\Http\Request;

class FullcalendarController extends Controller
{
    public function __construct()
    {

    }

    public function show()
    {
        $events = [];
        $data = Event::all();
        if($data->count()) {
            foreach ($data as $key => $value) {
                $events[] = \Calendar::event(
                    $value->title,
                    true,
                    new \DateTime($value->start),
                    new \DateTime($value->end.' +1 day'),
                    $value->id,
                    [
                        'color'=> $value->color
                    ]
                );
            }
        }
        $calendar = \Calendar::addEvents($events)
        ->setOptions([ 
            'editable' => true,
            'selectable'=> true,
            'selectHelper'=> true,
            'displayEventTime'=> true,
        ]) 
        ->setCallbacks([ 
            'dayClick' => 'function(date, event, view) {
                $("#dialog").dialog({
                    title:"Add Event",
                    width:600,
                    height:500,
                    modal:true,
                    show:{effect: "clip", duration: 350},
                    hide:{effect: "clip", duration: 250},
                  })
            }'
        ]);
        return view('admin.fullcalendar.show', compact('calendar'));
    }
}
