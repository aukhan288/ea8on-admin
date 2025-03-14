<?php

namespace App\Http\Controllers\services\V1\customer;


use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;


class HomeController extends Controller
{
    public function HomePageBanners()
    {
        $banners = DB::table('banners')->get();

        return response()->json([
            'data' => $banners,
            'status' => 'success'
        ]);
    }
    public function dealsOfTheDay()
    {
        return response()->json([
            'message' => 'Deals of the day',
            'status' => 'success'
        ]);
    }
}

