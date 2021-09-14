<?php

declare(strict_types = 1);

namespace App\Charts;

use Chartisan\PHP\Chartisan;
use ConsoleTVs\Charts\BaseChart;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Carbon;

class SampleChart extends BaseChart
{
    /**
     * Handles the HTTP request for the given chart.
     * It must always return an instance of Chartisan
     * and never a string or an array.
     */
    public function handler(Request $request): Chartisan
    {
        $users = User::withCount(['posts' => function ($query) {
                $query->where('created_at', '>=', Carbon::now()->subDay());
            }])->orderBy('posts_count', 'DESC')
            ->paginate(5)
            ->pluck('posts_count', 'username')
            ->toArray();

        $labels = array_keys($users);
        $values = array_values($users);

        return Chartisan::build()
            ->labels($labels)
            ->dataset('Sample', $values);
    }
}