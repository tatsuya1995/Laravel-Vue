<?php

namespace App\Repositories;
use  App\Models\SpotInfo;
use Illuminate\Support\Facades\DB;

class SpotInfoRepository implements SpotInfoRepositoryInterface
{
    public function getAll()
    {
        return SpotInfo::all();
    }

    public function getSearchSpotList($searchList)
    {

        $name = $searchList['name'];
        $sortValue = $searchList['sortOrder'] ?: 0;
        $ageRange = $searchList['ageRange'];

        // between句に入れる値を取得する
        $ageRangeValue = $ageRange ? config('type.ageRange')[$ageRange]['range'] : [1, 100];
        $sortValue = config('type.sortValue')[$sortValue]['sort'];

        return DB::table('spot_infos')
            ->when($name, function ($query) use ($name) {
                $query->where('name', 'like',   "%$name%");
            })
            // TODO: 未設定の時の対応が必要
            ->when($ageRangeValue , function ($query) use ($ageRangeValue) {
                $query->whereBetween('age', $ageRangeValue);
            })
            ->orderBy($sortValue, 'desc')
            ->get();
    }
}