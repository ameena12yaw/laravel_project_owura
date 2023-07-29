<?php

namespace App\Filament\Widgets;

use App\Models\Country;
use App\Models\Employee;
use Filament\Widgets\StatsOverviewWidget\Card;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;

class EmployeeStatsOverview extends BaseWidget
{
    protected function getCards(): array
    {
        $GH = Country::where('country_code', 'GH')->withCount('employees')->first();
        $NG = Country::where('country_code', 'NG')->withCount('employees')->first();
        return [
            Card::make('All Employees',Employee::all()->count()),
            Card::make($GH->name . ' Employees',$GH->employees->count()),
            Card::make($NG->name . ' Employees',$NG->employees->count())

        ];
    }
}