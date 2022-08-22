<?php

namespace App\Http\Controllers\Parser\GooglePlay;

use App\Http\Controllers\Controller;
use App\Services\Parsers\GooglePlay\AppParserService;
use Illuminate\Http\Request;

class AppParserController extends Controller
{
    public function showAppIconByName(Request $request, AppParserService $appParserService)
    {
        try {
            $appIconUrl = $appParserService
                ->setAppName($request->get('app'))
                ->parse()
                ->getAppIcon();
        } catch (\Exception $e){
            return $e->getMessage();
        }

        return view('welcome')->with([
            'appIconUrl' => $appIconUrl
        ]);
    }
}
