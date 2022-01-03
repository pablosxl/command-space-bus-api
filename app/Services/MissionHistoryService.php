<?php

namespace App\Services;

use Illuminate\Http\Request;
use App\Models\MissionHistory;


class MissionHistoryService {

    public function create($missionHistory) {

        return MissionHistory::create(
            ['origin'=>$missionHistory->origin,
            'situation'=>$missionHistory->situation,
            'command'=>$missionHistory->command,
            'missionId'=>$missionHistory->id,
            'memberId'=>$missionHistory->memberId]); 
    }

    public function getHistoryById($id) {

        return MissionHistory::where('missionId', $id)->get();
    }

    public function delete($id) {

        return MissionHistory::where('missionId', $id)->delete();
    }        
}