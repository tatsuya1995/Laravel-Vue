<?php

namespace App\Repositories;

interface SpotInfoRepositoryInterface 
{
    public function getAll();
    public function getSearchSpotList($searchList);

}