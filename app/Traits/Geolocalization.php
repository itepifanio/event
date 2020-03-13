<?php

trait Geolocalization
{
    function geolocalization(){
//        $buildings = Building::select(
//            DB::raw("*,
//                              ( 6371 * acos( cos( radians(?) ) *
//                                cos( radians( lat ) )
//                                * cos( radians( lon ) - radians(?)
//                                ) + sin( radians(?) ) *
//                                sin( radians( lat ) ) )
//                              ) AS distance"))
//            ->having("distance", "<", "?")
//            ->orderBy("distance")
//            ->setBindings([$lat, $lon, $lat,  $radius])
//            ->get();
    }
}