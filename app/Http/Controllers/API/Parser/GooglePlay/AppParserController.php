<?php

namespace App\Http\Controllers\API\Parser\GooglePlay;

use App\Http\Controllers\Controller;
use App\Http\Requests\GetAppIconRequest;
use App\Services\Parsers\GooglePlay\AppParserService;

class AppParserController extends Controller
{
    public function getAppIconUrlByName(GetAppIconRequest $request, AppParserService $appParserService)
    {
        try {
            $appIconUrl = $appParserService
                ->setAppName($request->post('app'))
                ->parse()
                ->getAppIcon();
        } catch (\Exception $e){
            return $e->getMessage();
        }

        return response()->json([
            'app_icon' => $appIconUrl
        ]);
    }
}
