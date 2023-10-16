<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Services\UserData\UserDataService;
use App\Services\XmlService;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class UserController extends Controller
{
    public function __construct(private UserDataService $userDataService, private XmlService $xmlService)
    {}

    /**
     * @param Request $request
     * @return Response
     */
    public function getRandomUsers(Request $request) : Response
    {
        $data = $this->userDataService->getRandomUsers((int) $request->get('limit', 1), 10);

        return $this->xmlService->createXmlResponse($data);
    }

}
