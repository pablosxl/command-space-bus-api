<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\MissionHistoryService;

class MissionHistoryController extends Controller
{
    public function __construct()
    {
        $this->missionHistoryService = new MissionHistoryService();
    }

    public function getHistoryById($id) {
        return $this->missionHistoryService->getHistoryById($id);
    }
}
