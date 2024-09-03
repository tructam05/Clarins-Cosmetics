<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\ContactUs;
use App\Models\OrderDetail;
use DateTime;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ChartController extends Controller
{



  public function index()
  {
    $year = 2024;

    $monthlyRevenue = DB::table('order_detail')
      ->selectRaw('MONTH(created_at) as month, SUM(total) as revenue')
      ->whereYear('created_at', $year)
      ->groupBy('month')
      ->pluck('revenue', 'month')
      ->toArray();

    //Fill in the value of 0 for months with no revenue
    $revenues = [];
    for ($i = 1; $i <= 12; $i++) {
      $revenues[] = $monthlyRevenue[$i] ?? 0;
    }

    return view('chart.index', compact('revenues'));
  }


  public function index2()
  {



    return view('chart.index2');
  }
}
