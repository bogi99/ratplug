<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;

class HomePageController extends Controller
{
    public function index()
    {
        $now = Carbon::now();
        $start = Carbon::parse('2026-05-03 00:00:00', $now->tz);
        $end = Carbon::parse('2026-05-19 00:00:00', $now->tz);

        if ($now->lt($start)) {
            $target = $start;
            $label = 'Starts in';
        } elseif ($now->lt($end)) {
            $target = $end;
            $label = 'Ends in';
        } else {
            $countdown = 'The 14-day period has ended.';
            return view('welcome', compact('countdown'));
        }

        $diffInMinutes = $now->diffInMinutes($target, false);
        $days = intdiv($diffInMinutes, 1440);
        $hours = intdiv($diffInMinutes % 1440, 60);
        $minutes = $diffInMinutes % 60;

        $countdown = sprintf(
            '%s %d day%s, %d hour%s, %d minute%s',
            $label,
            $days,
            $days === 1 ? '' : 's',
            $hours,
            $hours === 1 ? '' : 's',
            $minutes,
            $minutes === 1 ? '' : 's'
        );

        return view('welcome', compact('countdown'));
    }
}
