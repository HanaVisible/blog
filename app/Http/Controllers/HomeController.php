<?php

namespace App\Http\Controllers;

use AkkiIo\LaravelGoogleAnalytics\Facades\LaravelGoogleAnalytics;
use AkkiIo\LaravelGoogleAnalytics\Period;
use Carbon\Carbon;
use Google\Analytics\Data\V1beta\MetricAggregation;

class HomeController extends Controller
{
    public $page = 'Dashboard';

    /**
     * Display a listing of the resource.
     *
     * @return void
     */
    public function index()
    {
        // dd(LaravelGoogleAnalytics::getTotalUsers(Period::days(1)));
        $topPerformingPage = LaravelGoogleAnalytics::getTotalViewsByPageAndUser(Period::months(1), 20);
        $totalUserOneDay = LaravelGoogleAnalytics::getTotalUsers(Period::days(1));
        $totalUserByDay = LaravelGoogleAnalytics::getTotalUsers(Period::days(7));
        $totalPageByDay = LaravelGoogleAnalytics::getTotalViews(Period::days(7));
        $averageBrowser = LaravelGoogleAnalytics::getAverageSessionDuration(Period::years(1));

        $userByDateYear = LaravelGoogleAnalytics::getTotalUsersByDate(Period::years(1));
        $userByDateMonth = LaravelGoogleAnalytics::getTotalUsersByDate(Period::months(1));
        $userByDate = LaravelGoogleAnalytics::getTotalUsersByDate(Period::days(7));
        $userMostVisitCountry = LaravelGoogleAnalytics::getMostUsersByCountry(Period::months(1));
        $userMostVisitCountryMap = collect($userMostVisitCountry)->pluck('countryId');
        dd($userMostVisitCountry);

        $userDate = [];
        $usertotal = [];
        $usertotalmonth = [];
        $usertotalyear = [];

        $userDateYear = [];
        foreach ($userByDateYear as $d) {
            $userDateYear[] = Carbon::createFromFormat('Ymd', $d['date'])->format('Y');
            $usertotalyear[] = $d['totalUsers'];
        }

        $userDateMonth = [];
        foreach ($userByDateMonth as $d) {
            $userDateMonth[] = Carbon::createFromFormat('Ymd', $d['date'])->format('d M');
            $usertotalmonth[] = $d['totalUsers'];
        }
        foreach ($userByDate as $d) {
            $userDate[] = Carbon::createFromFormat('Ymd', $d['date'])->format('D');
            $usertotal[] = $d['totalUsers'];
        }
        $userByDate = LaravelGoogleAnalytics::getTotalViewsByDate(Period::days(7));
        $pageDate = [];
        $pageTotal = [];
        foreach ($userByDate as $d) {
            $pageDate[] = Carbon::createFromFormat('Ymd', $d['date'])->format('D');
            $pageTotal[] = $d['screenPageViews'];
        }
        $device = LaravelGoogleAnalytics::dateRanges(Period::years(1))
        ->metrics('totalUsers')
        ->dimensions('deviceCategory')
        ->metricAggregations(MetricAggregation::TOTAL)
        ->get();
        $deviceName = [];
        $userCount = [];
        $colourCode = [];
        foreach ($device->table as $dev) {
            $code = str_pad(dechex(mt_rand(0, 0xFFFFFF)), 6, '0', STR_PAD_LEFT);
            $deviceName[] = $dev['deviceCategory'];
            $userCount[] = (int) $dev['totalUsers'];
            $colourCode[] = '#'.$code;
        }
        $deviceUserTotal = 0;
        foreach ($device->metricAggregationsTable as $dev) {
            $deviceUserTotal = $dev['totalUsers'];
        }
        $page = $this->page;

        return view('home', compact('page', 'topPerformingPage', 'totalUserOneDay', 'totalUserByDay', 'totalPageByDay', 'averageBrowser', 'userDate', 'usertotal', 'pageDate', 'pageTotal', 'deviceName', 'userCount', 'deviceUserTotal', 'colourCode', 'usertotalmonth', 'usertotalyear', 'userDateMonth', 'userDateYear', 'userMostVisitCountry', 'userMostVisitCountryMap'));
    }
}
