<?php

namespace App\Http\Controllers;

use App\Model\Event;
use Illuminate\Http\Request;
use App\Repositories\Admin\AdminRepositoryInterface;

class FullcalendarController extends Controller
{
    protected $adminRepository;

    public function __construct(AdminRepositoryInterface $adminRepository)
    {
        $this->adminRepository = $adminRepository;
    }

    public function show()
    {
        $events = [];
        $data = Event::all();
        if($data->count()) {
            foreach ($data as $key => $value) {
                $attender_id = json_decode($value->admin_id) ;
                $str_attender_name=[];
                foreach ($attender_id as $id) {
                    $str_attender_name_id = $this->adminRepository->show($id)->name;
                    array_push($str_attender_name, $str_attender_name_id);
                };
                $events[] = \Calendar::event(
                    $value->title,
                    true,
                    new \DateTime($value->start),
                    new \DateTime($value->end.' +1 day'),
                    $value->id,
                    [
                        'color'=> $value->color,
                        'admins'=>$str_attender_name,
                        'start_time'=> \Carbon\Carbon::parse($value->start)->format('d/m/Y - H:i')
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
            'eventRender' => 'function(event, element) {
                element.popover({
                  animation: true,
                  html: true,
                  title: $(element).html(),
                  content: function(){
                      return `
                        <div>
                            <p style="color:red">Admin tham dự: ${event.admins}</p>
                            <p>Thời gian: ${(event.start_time)}</p>
                        </div>
                      `;
                  },
                  trigger: "hover",
                  placement: "bottom",
                  container: "body"
                  });
                }'
        ]);
        return view('admin.fullcalendar.show', compact('calendar'));
    }
}
