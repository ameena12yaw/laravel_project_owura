<?php

use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Filament\Resources\EmployeeResource;



Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});




Route::get('/employees', function() {
    $employees = Employee::orderBy('last_name', 'DESC')->get();

    return EmployeeResource::collection($employees);
});