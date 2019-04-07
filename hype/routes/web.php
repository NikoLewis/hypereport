<?php
use Illuminate\Http\Response;

use \App\TemplateLoader;

/**
 * create the template loader
 */
$template_loader = new TemplateLoader('index');


/**
 * homepage
 */
$router->get('/', function () use ($router, $template_loader) {
    return view('welcome');
});


/**
 * get the reports for a specific month
 */
$router->get('/{year:\d{4}}/{month:\d{1,2}}', function($month, $year) use ($router, $template_loader) {
    $reports = [];
    $month_year = \App\MonthYear::where('month', $month)
        ->where('year', $year)
        ->first();

    if($month_year){
        $reports = \App\Report::where('month_year_id', $month_year->id)
            ->get();
    }

    if($router->app->request->ajax()){
        return response()->json($reports);
    }

    return $template_loader->render($year, $month, ['reports' => $reports]);
});


/**
 * get all of the reports for a given year
 */
$router->get('/{year:\d{4}}', function($year) use ($router, $template_loader) {
    $reports = [];
    $months_year = \App\MonthYear::where('year', $year)
        ->get();

    if($months_year){
        $ids = [];

        foreach($months_year as $my){
            $ids[] = $my->id;
        }

        $reports = \App\Report::whereIn('month_year_id', $ids)
            ->get();
    }

    if($router->app->request->ajax()){
        return response()->json($reports);
    }

    return $template_loader->render($year, false, ['reports' => $reports]);
});
