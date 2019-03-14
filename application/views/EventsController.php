<?php

/* ING.GIOVANNI */

namespace App\Http\Controllers;

use App\Event;
use Illuminate\Support\Facades\DB;

class EventsController extends Controller {

    public function index() {
        $events = Event::active()->orderByDesc('updated_at')->get();

        return view('events.browse', [
            'events' => $events
        ]);
    }

    public function browse() {
        $events = Event::where('archived', false)->orderByDesc('updated_at')->get();

        return view('events.browse', [
            'events' => $events
        ]);
    }

    public function show(Event $event) {
        try {

            $e = json_decode($event);
            $sections = DB::table('seats AS S')
                    ->select('S.section')
                    ->join('audience_seating_chart_specifications AS ASCS', 'S.audience_seating_chart_specifications_id', '=', 'ASCS.id')
                    ->where('ASCS.event_id', '=', $e->id)->groupBy('S.section')
                    ->get();
            $subsections = DB::table('seats AS S')
                    ->select('S.subsection')
                    ->join('audience_seating_chart_specifications AS ASCS', 'S.audience_seating_chart_specifications_id', '=', 'ASCS.id')
                    ->where('ASCS.event_id', '=', $e->id)->groupBy('S.subsection')
                    ->get();
            $seats = DB::table('seats AS S')
                    ->select('S.id', 'A.id AS IDASP', 'S.seat_title', 'A.event_id', 'A.venue_id', 'A.name_seating_chart', 'A.sections AS sections', 'A.subsections', 'S.section AS section', 'S.subsection AS subsection', 'S.seat AS seat', 'S.type AS type', 'S.row_title', 'S.row AS row', 'A.seatsbyrow AS nseats', 'A.rowsbysubsection', 'A.total AS total_seats', 'A.multiplerooms', 'A.typeofroom')
                    ->join('audience_seating_chart_specifications AS A', 'A.id', '=', 'S.audience_seating_chart_specifications_id')
                    ->join('events AS E', 'E.id', '=', 'A.event_id')
                    ->join('users AS U', 'A.user_id', '=', 'U.id')
                    ->join('venues AS V', 'A.venue_id', '=', 'V.id')
                    ->where('A.event_id', '=', $e->id)
                    ->where('E.venue_id', '=', $e->venue_id)
                    ->orderBy('S.id', 'asc')
                    ->orderBy('S.row', 'asc')
                    ->get();
            $auditorium = (DB::table('audience_seating_chart_specifications AS A')
                            ->select('A.sections', 'A.subsections', 'A.seatsbyrow', 'A.url')
                            ->where('A.event_id', '=', $e->id)
                            ->get());
            $event->load(['categories', 'tickets']);

            return view('events.show', ['event' => $event,
                'auditorium' => ($auditorium),
                'sections' => $sections,
                'subsections' => $subsections,
                'seats' => $seats]);
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

}
