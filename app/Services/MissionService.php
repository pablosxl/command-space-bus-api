<?php

namespace App\Services;

use Illuminate\Http\Request;
use App\Models\Mission;
use App\Services\MissionHistoryService;

class MissionService {
    
    public function __construct()
    {
        $this->missionHistoryService = new MissionHistoryService();
    }
    public function create(Request $request) {
        $request->merge(['stage' => 1]);
        $mission = Mission::create($request->all());
        $mission->setAttribute('memberId', $request->memberId);
        $this->createHistory($mission);

        return $mission;
        
    }

    public function uncoupleSpaceBus(Request $request, $id) {
        $mission = $this->getAndverifyMissionStatus($id);
        
        $mission->stage = 2;
        $mission->situation = 'Em andamento';
        $mission->command = 'Desacoplar da ISS!';
        
        $mission->update($request->all());
        $mission->setAttribute('memberId', $request->memberId);
        $this->createHistory($mission);

        return $mission;
    }

    public function init(Request $request, $id) {

        $mission = $this->getAndverifyMissionStatus($id);
        
        $mission->stage = 3;
        $mission->situation = 'Em andamento';
        $mission->command = 'Iniciar Viajem!';
        
        $mission->update($request->all());

        $mission->setAttribute('memberId', $request->memberId);
        $this->createHistory($mission);

        return $mission;

    }

    public function activateThrusters(Request $request, $id) {
        $mission = $this->getAndverifyMissionStatus($id);
        
        $mission->stage = 4;
        $mission->situation = 'Em andamento';
        $mission->command = 'Ativar propursores!';
        
        $mission->update($request->all());
        $mission->setAttribute('memberId', $request->memberId);
        $this->createHistory($mission);

        return $mission;
    }

    public function startEngines(Request $request, $id) {
        $mission = $this->getAndverifyMissionStatus($id);
        
        $mission->stage = 5;
        $mission->situation = 'Em andamento';
        $mission->command = 'Ligar motores!';
        
        $mission->update($request->all());
        $mission->setAttribute('memberId', $request->memberId);
        $this->createHistory($mission);

        return $mission;
    }

    public function openLandingGear(Request $request, $id) {
        $mission = $this->getAndverifyMissionStatus($id);
        
        $mission->stage = 6;
        $mission->situation = 'Em andamento';
        $mission->command = 'Acionar trem de pouso!';
        
        $mission->update($request->all());
        $mission->setAttribute('memberId', $request->memberId);
        $this->createHistory($mission);

        return $mission;
    }

    public function initLandingProcedure(Request $request, $id) {
        $mission = $this->getAndverifyMissionStatus($id);
        
        $mission -> stage = 7;
        $mission->situation = 'Em andamento';
        $mission->command = 'Iniciar procedimento de pouso!';
 
        $mission->update($request->all());
        $mission->setAttribute('memberId', $request->memberId);
        $this->createHistory($mission);

        return $mission;
    }

    public function finish(Request $request, $id) {
        $mission = $this->getAndverifyMissionStatus($id);
        
        $mission->stage = 8;
        $mission->situation = 'Finalizado';
        $mission->command = 'Missão concluída!';
        
        $mission->update($request->all());
        $mission->setAttribute('memberId', $request->memberId);
        $this->createHistory($mission);

        return $mission;
    }

    public function getMissions() {
        
        return Mission::where('active', true)->get();
    }

    public function getLastMissionNotFinish() {
        return Mission::where('situation', '!=' , 'Finalizado')->get()->last();
    }

    public function disableMission($id) {
        
        $mission = Mission::FindOrFail($id);
        
        $mission->update(['active' => false]);
    }

    public function delete($id) {
        
        $this->missionHistoryService->delete($id);
        Mission::FindOrFail($id)->delete();
    }

    public function teste($id) {
        

        $data = $id;
        return $data;
    }

    function createHistory($mission) {
        return $this->missionHistoryService->create($mission);
    }
    
    function getAndverifyMissionStatus($id) {
        $mission = Mission::FindOrFail($id);

        if($mission->situation == "Finalizado") {
            throw new \ErrorException('Missão já foi finalizada!');
        }

        return $mission;
    }
}