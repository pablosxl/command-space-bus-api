<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Services\MissionService;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\ResetsPasswords;
use Illuminate\Http\Request;

class MissionController extends Controller
{
    public function __construct()
    {
        $this->missionService = new MissionService();
    }

    public function create(Request $request) {
        return $this->missionService->create($request);
    }

    public function uncoupleSpaceBus(Request $request, $id) {
        return $this->missionService->uncoupleSpaceBus($request, $id);
    }
    public function init(Request $request, $id) {
        return $this->missionService->init($request, $id);
    }
    public function activateThrusters(Request $request, $id) {
        return $this->missionService->activateThrusters($request, $id);
    }
    public function startEngines(Request $request, $id) {
        return $this->missionService->startEngines($request, $id);
    }
    public function openLandingGear(Request $request, $id) {
        return $this->missionService->openLandingGear($request, $id);
    }
    public function initLandingProcedure(Request $request, $id) {
        return $this->missionService->initLandingProcedure($request, $id);
    }
    public function finish(Request $request, $id) {
        return $this->missionService->finish($request, $id);
    }
    
    public function getMissions() {
        
        return $this->missionService->getMissions();
    }
    public function disableMission($id) {
        
        return $this->missionService->disableMission($id);
    }
    public function deleteMission($id) {
        
        $this->missionService->delete($id);
    }

    public function testeController($id) {
        
        $resposta =  $this->missionService->teste($id);

        return response()->json(['teste' => $resposta]);
    }
    use ResetsPasswords;

    /**
     * Where to redirect users after resetting their password.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;
}
