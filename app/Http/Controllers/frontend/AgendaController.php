<?php

namespace App\Http\Controllers\frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Calendar;
use App\Agenda;
class AgendaController extends Controller
{
    public function index()
    {
    	parent::trackers('agenda');

    	$events = [];
        $data = Agenda::all();

        if($data->count()) {
            foreach ($data as $key => $value) {
                
                $events[] = Calendar::event(
                    $value->title,
                    true,
                    new \DateTime($value->tanggal),
                    new \DateTime($value->tanggal_selesai.' +1 day'),
                    null,
                    // Add color and link on event
	                [
	                    'color' => '#B9DFFB',
	                    
	                ]
                );
            }
        }

        $calendar = Calendar::addEvents($events);
        
    	return view('frontend.agenda.index', compact('calendar'));
    }
}
