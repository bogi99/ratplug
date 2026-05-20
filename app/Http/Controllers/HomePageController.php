<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;

class HomePageController extends Controller
{
    public function index()
    {
        $now = Carbon::now();
        $start = Carbon::parse('2026-05-01 00:00:00', $now->tz);
        $end = Carbon::parse('2026-05-31 00:00:00', $now->tz);

        if ($now->lt($start)) {
            $target = $start;
            $label = 'Starts in';
        } elseif ($now->lte($end)) {
            $target = $end;
            $label = 'Ends in';
        } else {
            $countdown = 'The event period has ended.';
            return view('welcome', compact('countdown'));
        }

        $diff = $now->diff($target);
        $parts = [];
        if ($diff->d > 0) {
            $parts[] = $diff->d . ' day' . ($diff->d === 1 ? '' : 's');
        }
        if ($diff->h > 0) {
            $parts[] = $diff->h . ' hour' . ($diff->h === 1 ? '' : 's');
        }
        if ($diff->i > 0 || empty($parts)) {
            $parts[] = $diff->i . ' minute' . ($diff->i === 1 ? '' : 's');
        }
        $countdown = $label . ' ' . implode(', ', $parts);
        return view('welcome', compact('countdown'));
    }
}
