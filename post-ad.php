<? 
include "header.php";
include "profile_header.php";
include "mapapi.php";
?>
<style>
body{ overflow-x:hidden; }
</style>
<div class="container">
    <div class="col-md-12 col-sm-12 col-xs-12  market-place-head-bg mt20">
        <span class="blackhead pdl10">Dashboard</span>
    </div><!--col-md-12 col-sm-12 col-xs-12  market-place-head-bg mt20-->
    
         <? include "profile_left.php"; ?>       
         <div class="col-md-9 col-sm-12 col-xs-12 mt20">
             <div class="col-md-12 col-sm-12 col-xs-12 profile-brdr-2">
                 <div class="pdt10">
                 <div class="row col-md-10 col-sm-6 col-xs-12 property-dash-head">Aggiungi immobile<br></div>
                 </div>
                 <div class="mt40">
                     <ul class="nav nav-tabs">
                         <li class="active"><a href="#details" data-toggle="tab">Dettagli</a></li>
                         <li><a href="#features" data-toggle="tab">Caratteristiche</a></li>
                         <li><a href="#services" data-toggle="tab">Servizi</a></li>
                         <li><a href="#financial" data-toggle="tab">Finanziario</a></li>
                         <li><a href="#pics" data-toggle="tab">Foto e Video</a></li>
                     </ul>
                 </div><!--class="pdt10"-->
<?
if(isset($p_ad)) {
    $prop_ref=trim(addslashes($prop_ref));
    $title=trim(addslashes($title));
    $title=preg_replace("/[^A-Za-z0-9 ]/", "", $title);
    $title=lcfirst($title);
    $types=trim(addslashes($types));
    $cat=trim(addslashes($cat));
    $pfor=trim(addslashes($pfor));
    $loc=trim(addslashes($loc));

    // Get JSON results from this request
    $geo = file_get_contents('https://maps.googleapis.com/maps/api/geocode/json?address='.urlencode($loc).'&sensor=false');
    // Convert the JSON to an array
    $geo = json_decode($geo, true);

    $addr=trim(addslashes($addr));
    $cap=trim(addslashes($cap));
    $eprice=trim(addslashes($eprice));
    $carea=trim(addslashes($carea));
    $poss=trim(addslashes($poss));
    $bed=trim(addslashes($bed));
    $bath=trim(addslashes($bath));
    $hall=trim(addslashes($hall));
    $furnish=trim(addslashes($furnish));
    $energy=trim(addslashes($energy));
    $floor=trim(addslashes($floor));
    $descrip=trim(addslashes($descrip));
    $posted=time();

    //services checkbox

    if(isset($leveled_apartment)) {

        $leveled_apartment=1;
    }
    else {
        $leveled_apartment=0;
    }

    if(isset($bungalow)) {
        $bungalow=1;
    }
    else {
        $bungalow=0;
    }

    if(isset($old_building)) {
        $old_building=1;
    }
    else {
        $old_building=0;
    }

    if(isset($farmhouse_four_sides)) {
        $farmhouse_four_sides=1;
    }
    else {
        $farmhouse_four_sides=0;
    }

    if(isset($farmhouse_three_sides)) {
        $farmhouse_three_sides=1;
    }
    else {
        $farmhouse_three_sides=0;
    }

    if(isset($farmhouse_one_side)) {
        $farmhouse_one_side=1;
    }
    else {
        $farmhouse_one_side=0;
    }

    if(isset($villa_vintage)) {
        $villa_vintage=1;
    }
    else {
        $villa_vintage=0;
    }

    if(isset($accessible_people)) {
        $accessible_people=1;
    }
    else {
        $accessible_people=0;
    }

    if(isset($electric_gate)) {
        $electric_gate=1;
    }
    else {
        $electric_gate=0;
    }

    if(isset($to_be_restructured)) {
        $to_be_restructured=1;
    }
    else {
        $to_be_restructured=0;
    }

    if(isset($alarm_system)) {
        $alarm_system=1;
    }
    else {
        $alarm_system=0;
    }

    if(isset($near_public_transportation)) {
        $near_public_transportation=1;
    }
    else {
        $near_public_transportation=0;
    }

    if(isset($position)) {
        $position=1;
    }
    else {
        $position=0;
    }

    if(isset($restructured)) {
        $restructured=1;
    }
    else {
        $restructured=0;
    }

    if(isset($high_traffic)) {
        $high_traffic=1;
    }
    else {
        $high_traffic=0;
    }

    if(isset($near_highway)) {
        $near_highway=1;
    }
    else {
        $near_highway=0;
    }

    if(isset($rooftop_terrace)) {
        $rooftop_terrace=1;
    }
    else {
        $rooftop_terrace=0;
    }

    if(isset($balcony)) {
        $balcony=1;
    }
    else {
        $balcony=0;
    }

    if(isset($basement_garage)) {
        $basement_garage=1;
    }
    else {
        $basement_garage=0;
    }

    if(isset($concrete)) {
        $concrete=1;
    }
    else {
        $concrete=0;
    }

    if(isset($garage_box)) {
        $garage_box=1;
    }
    else {
        $garage_box=0;
    }

    if(isset($garden)) {
        $garden=1;
    }
    else {
        $garden=0;
    }

    if(isset($pond)) {
        $pond=1;
    }
    else {
        $pond=0;
    }

    if(isset($exposed_brick)) {
        $exposed_brick=1;
    }
    else {
        $exposed_brick=0;
    }

    if(isset($mosaic)) {
        $mosaic=1;
    }
    else {
        $mosaic=0;
    }

    if(isset($noted_palace)) {
        $noted_palace=1;
    }
    else {
        $noted_palace=0;
    }

    if(isset($panels)) {
        $panels=1;
    }
    else {
        $panels=0;
    }

    if(isset($parking)) {
        $parking=1;
    }
    else {
        $parking=0;
    }

    if(isset($glass_wall)) {
        $glass_wall=1;
    }
    else {
        $glass_wall=0;
    }

    if(isset($stone)) {
        $stone=1;
    }
    else {
        $stone=0;
    }

    if(isset($pool)) {
        $pool=1;
    }
    else {
        $pool=0;
    }

    if(isset($parking_space)) {
        $parking_space=1;
    }
    else {
        $parking_space=0;
    }

    if(isset($cesspool)) {
        $cesspool=1;
    }
    else {
        $cesspool=0;
    }

    if(isset($prefabricated)) {
        $prefabricated=1;
    }
    else {
        $prefabricated=0;
    }

    if(isset($closet)) {
        $closet=1;
    }
    else {
        $closet=0;
    }

    if(isset($independent_closet)) {
        $independent_closet=1;
    }
    else {
        $independent_closet=0;
    }

    if(isset($wood_coating)) {
        $wood_coating=1;
    }
    else {
        $wood_coating=0;
    }

    if(isset($structure_under_construction)) {
        $structure_under_construction=1;
    }
    else {
        $structure_under_construction=0;
    }

    if(isset($putty)) {
        $putty=1;
    }
    else {
        $putty=0;
    }

    if(isset($patio_deck)) {
        $patio_deck=1;
    }
    else {
        $patio_deck=0;
    }

    if(isset($flat_roof)) {
        $flat_roof=1;
    }
    else {
        $flat_roof=0;
    }

    if(isset($unfinished)) {
        $unfinished=1;
    }
    else {
        $unfinished=0;
    }

    if(isset($lift_elevator)) {
        $lift_elevator=1;
    }
    else {
        $lift_elevator=0;
    }

    if(isset($redeveloped)) {
        $redeveloped=1;
    }
    else {
        $redeveloped=0;
    }

    if(isset($outdoor_pool)) {
        $outdoor_pool=1;
    }
    else {
        $outdoor_pool=0;
    }

    if(isset($indoor_pool)) {
        $indoor_pool=1;
    }
    else {
        $indoor_pool=0;
    }

    if(isset($reception)) {
        $reception=1;
    }
    else {
        $reception=0;
    }

    if(isset($first_owner)) {
        $first_owner=1;
    }
    else {
        $first_owner=0;
    }

    if(isset($needs_redevelopment)) {
        $needs_redevelopment=1;
    }
    else {
        $needs_redevelopment=0;
    }

    if(isset($security_service)) {
        $security_service=1;
    }
    else {
        $security_service=0;
    }

    if(isset($frescoes)) {
        $frescoes=1;
    }
    else {
        $frescoes=0;
    }

    if(isset($large_hall)) {
        $large_hall=1;
    }
    else {
        $large_hall=0;
    }

    if(isset($large_closet)) {
        $large_closet=1;
    }
    else {
        $large_closet=0;
    }

    if(isset($kitchenette)) {
        $kitchenette=1;
    }
    else {
        $kitchenette=0;
    }

    if(isset($conditioned_air)) {
        $conditioned_air=1;
    }
    else {
        $conditioned_air=0;
    }

    if(isset($central_air_conditioned)) {
        $central_air_conditioned=1;
    }
    else {
        $central_air_conditioned=0;
    }

    if(isset($independent_room)) {
        $independent_room=1;
    }
    else {
        $independent_room=0;
    }

    if(isset($fireplace)) {
        $fireplace=1;
    }
    else {
        $fireplace=0;
    }

    if(isset($livable_kitchen)) {
        $livable_kitchen=1;
    }
    else {
        $livable_kitchen=0;
    }

    if(isset($livable_kitchen_den)) {
        $livable_kitchen_den=1;
    }
    else {
        $livable_kitchen_den=0;
    }

    if(isset($tiled_kitchen)) {
        $tiled_kitchen=1;
    }
    else {
        $tiled_kitchen=0;
    }

    if(isset($kitchen_kitchenette)) {
        $kitchen_kitchenette=1;
    }
    else {
        $kitchen_kitchenette=0;
    }

    if(isset($circular_windows)) {
        $circular_windows=1;
    }
    else {
        $circular_windows=0;
    }

    if(isset($internal_plasterboard)) {
        $internal_plasterboard=1;
    }
    else {
        $internal_plasterboard=0;
    }

    if(isset($washing_facilities)) {
        $washing_facilities=1;
    }
    else {
        $washing_facilities=0;
    }

    if(isset($laundry_room)) {
        $laundry_room=1;
    }
    else {
        $laundry_room=0;
    }

    if(isset($tiled_floors)) {
        $tiled_floors=1;
    }
    else {
        $tiled_floors=0;
    }

    if(isset($parquet_floor)) {
        $parquet_floor=1;
    }
    else {
        $parquet_floor=0;
    }

    if(isset($underfloor_heating)) {
        $underfloor_heating=1;
    }
    else {
        $underfloor_heating=0;
    }

    if(isset($gas_stove)) {
        $gas_stove=1;
    }
    else {
        $gas_stove=0;
    }

    if(isset($accessible_by_boat)) {
        $accessible_by_boat=1;
    }
    else {
        $accessible_by_boat=0;
    }

    if(isset($town_center)) {
        $town_center=1;
    }
    else {
        $town_center=0;
    }

    if(isset($business_center)) {
        $business_center=1;
    }
    else {
        $business_center=0;
    }

    if(isset($old_town)) {
        $old_town=1;
    }
    else {
        $old_town=0;
    }

    if(isset($surrounded_by_beaches)) {
        $surrounded_by_beaches=1;
    }
    else {
        $surrounded_by_beaches=0;
    }

    if(isset($easily_accessible_by_car)) {
        $easily_accessible_by_car=1;
    }
    else {
        $easily_accessible_by_car=0;
    }

    if(isset($lagoon_front)) {
        $lagoon_front=1;
    }
    else {
        $lagoon_front=0;
    }

    if(isset($country_side)) {
        $country_side=1;
    }
    else {
        $country_side=0;
    }

    if(isset($settlement)) {
        $settlement=1;
    }
    else {
        $settlement=0;
    }

    if(isset($isolated)) {
        $isolated=1;
    }
    else {
        $isolated=0;
    }

    if(isset($isolated_far_from_settlements)) {
        $isolated_far_from_settlements=1;
    }
    else {
        $isolated_far_from_settlements=0;
    }

    if(isset($forest_edge)) {
        $forest_edge=1;
    }
    else {
        $forest_edge=0;
    }

    if(isset($isolated_location)) {
        $isolated_location=1;
    }
    else {
        $isolated_location=0;
    }

    if(isset($near_golf_course)) {
        $near_golf_course=1;
    }
    else {
        $near_golf_course=0;
    }

    if(isset($outskirts)) {
        $outskirts=1;
    }
    else {
        $outskirts=0;
    }

    if(isset($private_location)) {
        $private_location=1;
    }
    else {
        $private_location=0;
    }

    if(isset($quiet_street)) {
        $quiet_street=1;
    }
    else {
        $quiet_street=0;
    }

    if(isset($on_the_sea)) {
        $on_the_sea=1;
    }
    else {
        $on_the_sea=0;
    }

    if(isset($on_the_beach)) {
        $on_the_beach=1;
    }
    else {
        $on_the_beach=0;
    }

    if(isset($airport_nearby)) {
        $airport_nearby=1;
    }
    else {
        $airport_nearby=0;
    }

    if(isset($forest_nearby)) {
        $forest_nearby=1;
    }
    else {
        $forest_nearby=0;
    }

    if(isset($channel_nearby)) {
        $channel_nearby=1;
    }
    else {
        $channel_nearby=0;
    }

    if(isset($near_congress_center)) {
        $near_congress_center=1;
    }
    else {
        $near_congress_center=0;
    }

    if(isset($near_church)) {
        $near_church=1;
    }
    else {
        $near_church=0;
    }

    if(isset($near_bus)) {
        $near_bus=1;
    }
    else {
        $near_bus=0;
    }


    if(isset($school_bus_stop_nearby)) {
        $school_bus_stop_nearby=1;
    }
    else {
        $school_bus_stop_nearby=0;
    }

    if(isset($near_lake)) {
        $near_lake=1;
    }
    else {
        $near_lake=0;
    }

    if(isset($near_sea)) {
        $near_sea=1;
    }
    else {
        $near_sea=0;
    }

    if(isset($near_subway)) {
        $near_subway=1;
    }
    else {
        $near_subway=0;
    }

    if(isset($near_mountain)) {
        $near_mountain=1;
    }
    else {
        $near_mountain=0;
    }

    if(isset($shops_nearby)) {
        $shops_nearby=1;
    }
    else {
        $shops_nearby=0;
    }

    if(isset($near_hospital)) {
        $near_hospital=1;
    }
    else {
        $near_hospital=0;
    }

    if(isset($near_gym)) {
        $near_gym=1;
    }
    else {
        $near_gym=0;
    }

    if(isset($near_park)) {
        $near_park=1;
    }
    else {
        $near_park=0;
    }

    if(isset($walking_nearby)) {
        $walking_nearby=1;
    }
    else {
        $walking_nearby=0;
    }

    if(isset($near_wood)) {
        $near_wood=1;
    }
    else {
        $near_wood=0;
    }

    if(isset($near_school)) {
        $near_school=1;
    }
    else {
        $near_school=0;
    }

    if(isset($near_beach)) {
        $near_beach=1;
    }
    else {
        $near_beach=0;
    }

    if(isset($near_train_station)) {
        $near_train_station=1;
    }
    else {
        $near_train_station=0;
    }

    if(isset($near_tangential)) {
        $near_tangential=1;
    }
    else {
        $near_tangential=0;
    }

    if(isset($canal_view)) {
        $canal_view=1;
    }
    else {
        $canal_view=0;
    }

    if(isset($lake_view)) {
        $lake_view=1;
    }
    else {
        $lake_view=0;
    }

    if(isset($sea_view)) {
        $sea_view=1;
    }
    else {
        $sea_view=0;
    }

    if(isset($mountain_view)) {
        $mountain_view=1;
    }
    else {
        $mountain_view=0;
    }

    if(isset($city_view)) {
        $city_view=1;
    }
    else {
        $city_view=0;
    }

    if(isset($nature_view)) {
        $nature_view=1;
    }
    else {
        $nature_view=0;
    }

    if(isset($beach_view)) {
        $beach_view=1;
    }
    else {
        $beach_view=0;
    }

    if(isset($nord)) {
        $nord=1;
    }
    else {
        $nord=0;
    }

    if(isset($nord_est)) {
        $nord_est=1;
    }
    else {
        $nord_est=0;
    }

    if(isset($est)) {
        $est=1;
    }
    else {
        $est=0;
    }

    if(isset($sud_est)) {
        $sud_est=1;
    }
    else {
        $sud_est=0;
    }

    if(isset($sud)) {
        $sud=1;
    }
    else {
        $sud=0;
    }

    if(isset($sud_ovest)) {
        $sud_ovest=1;
    }
    else {
        $sud_ovest=0;
    }

    if(isset($ovest)) {
        $ovest=1;
    }
    else {
        $ovest=0;
    }

    if(isset($nord_ovest)) {
        $nord_ovest=1;
    }
    else {
        $nord_ovest=0;
    }

    if(isset($ancient)) {
        $ancient=1;
    }
    else {
        $ancient=0;
    }

    if(isset($art_deco)) {
        $art_deco=1;
    }
    else {
        $art_deco=0;
    }

    if(isset($art_nouveau)) {
        $art_nouveau=1;
    }
    else {
        $art_nouveau=0;
    }

    if(isset($barocco)) {
        $barocco=1;
    }
    else {
        $barocco=0;
    }

    if(isset($biedermeier)) {
        $biedermeier=1;
    }
    else {
        $biedermeier=0;
    }

    if(isset($british)) {
        $british=1;
    }
    else {
        $british=0;
    }

    if(isset($attic_rooms)) {
        $attic_rooms=1;
    }
    else {
        $attic_rooms=0;
    }

    if(isset($century_home)) {
        $century_home=1;
    }
    else {
        $century_home=0;
    }

    if(isset($colonnade)) {
        $colonnade=1;
    }
    else {
        $colonnade=0;
    }

    if(isset($contemporary)) {
        $contemporary=1;
    }
    else {
        $contemporary=0;
    }

    if(isset($edwardian)) {
        $edwardian=1;
    }
    else {
        $edwardian=0;
    }

    if(isset($elizabethan)) {
        $elizabethan=1;
    }
    else {
        $elizabethan=0;
    }

    if(isset($french)) {
        $french=1;
    }
    else {
        $french=0;
    }

    if(isset($gothic)) {
        $gothic=1;
    }
    else {
        $gothic=0;
    }

    if(isset($english)) {
        $english=1;
    }
    else {
        $english=0;
    }

    if(isset($liberty)) {
        $liberty=1;
    }
    else {
        $liberty=0;
    }

    if(isset($mediterranean)) {
        $mediterranean=1;
    }
    else {
        $mediterranean=0;
    }

    if(isset($modern)) {
        $modern=1;
    }
    else {
        $modern=0;
    }

    if(isset($neoclassic)) {
        $neoclassic=1;
    }
    else {
        $neoclassic=0;
    }

    if(isset($fine_arts)) {
        $fine_arts=1;
    }
    else {
        $fine_arts=0;
    }

    if(isset($regency)) {
        $regency=1;
    }
    else {
        $regency=0;
    }

    if(isset($renaissance)) {
        $renaissance=1;
    }
    else {
        $renaissance=0;
    }

    if(isset($roman)) {
        $roman=1;
    }
    else {
        $roman=0;
    }

    if(isset($spanish)) {
        $spanish=1;
    }
    else {
        $spanish=0;
    }

    if(isset($style_1200)) {
        $style_1200=1;
    }
    else {
        $style_1200=0;
    }

    if(isset($style_1300)) {
        $style_1300=1;
    }
    else {
        $style_1300=0;
    }

    if(isset($style_1400)) {
        $style_1400=1;
    }
    else {
        $style_1400=0;
    }

    if(isset($style_1500)) {
        $style_1500=1;
    }
    else {
        $style_1500=0;
    }

    if(isset($style_1600)) {
        $style_1600=1;
    }
    else {
        $style_1600=0;
    }

    if(isset($style_1700)) {
        $style_1700=1;
    }
    else {
        $style_1700=0;
    }

    if(isset($style_1800)) {
        $style_1800=1;
    }
    else {
        $style_1800=0;
    }

    if(isset($style_60_70)) {
        $style_60_70=1;
    }
    else {
        $style_60_70=0;
    }

    if(isset($style_900)) {
        $style_900=1;
    }
    else {
        $style_900=0;
    }

    if(isset($tudor)) {
        $tudor=1;
    }
    else {
        $tudor=0;
    }

    if(isset($victorian)) {
        $victorian=1;
    }
    else {
        $victorian=0;
    }

    if(isset($running_water)) {
        $running_water=1;
    }
    else {
        $running_water=0;
    }

    if(isset($fireplace_chimney)) {
        $fireplace_chimney=1;
    }
    else {
        $fireplace_chimney=0;
    }

    if(isset($water_tank)) {
        $water_tank=1;
    }
    else {
        $water_tank=0;
    }

    if(isset($solar_collectors)) {
        $solar_collectors=1;
    }
    else {
        $solar_collectors=0;
    }

    if(isset($electricity)) {
        $electricity=1;
    }
    else {
        $electricity=0;
    }

    if(isset($geothermal_energy)) {
        $geothermal_energy=1;
    }
    else {
        $geothermal_energy=0;
    }

    if(isset($sanitation)) {
        $sanitation=1;
    }
    else {
        $sanitation=0;
    }

    if(isset($source_of_water)) {
        $source_of_water=1;
    }
    else {
        $source_of_water=0;
    }

    if(isset($gas)) {
        $gas=1;
    }
    else {
        $gas=0;
    }

    if(isset($gas_gpl)) {
        $gas_gpl=1;
    }
    else {
        $gas_gpl=0;
    }

    if(isset($methane_gas)) {
        $methane_gas=1;
    }
    else {
        $methane_gas=0;
    }

    if(isset($natural_gas)) {
        $natural_gas=1;
    }
    else {
        $natural_gas=0;
    }

    if(isset($ups_generator)) {
        $ups_generator=1;
    }
    else {
        $ups_generator=0;
    }

    if(isset($adsl_line)) {
        $adsl_line=1;
    }
    else {
        $adsl_line=0;
    }

    if(isset($heat_pump)) {
        $heat_pump=1;
    }
    else {
        $heat_pump=0;
    }

    if(isset($fireplace_predisposition)) {
        $fireplace_predisposition=1;
    }
    else {
        $fireplace_predisposition=0;
    }

    if(isset($network_computing)) {
        $network_computing=1;
    }
    else {
        $network_computing=0;
    }

    if(isset($heating_hot_air)) {
        $heating_hot_air=1;
    }
    else {
        $heating_hot_air=0;
    }

    if(isset($heating_none)) {
        $heating_none=1;
    }
    else {
        $heating_none=0;
    }

    if(isset($autonomous_heating)) {
        $autonomous_heating=1;
    }
    else {
        $autonomous_heating=0;
    }

    if(isset($heating_central_boiler)) {
        $heating_central_boiler=1;
    }
    else {
        $heating_central_boiler=0;
    }

    if(isset($centralized_warming)) {
        $centralized_warming=1;
    }
    else {
        $centralized_warming=0;
    }

    if(isset($heating_solid_fuel)) {
        $heating_solid_fuel=1;
    }
    else {
        $heating_solid_fuel=0;
    }

    if(isset($electric_heating)) {
        $electric_heating=1;
    }
    else {
        $electric_heating=0;
    }

    if(isset($heating_gas_gpl)) {
        $heating_gas_gpl=1;
    }
    else {
        $heating_gas_gpl=0;
    }

    if(isset($heating_oil)) {
        $heating_oil=1;
    }
    else {
        $heating_oil=0;
    }

    if(isset($heating_solar)) {
        $heating_solar=1;
    }
    else {
        $heating_solar=0;
    }

    if(isset($heating_district_heating)) {
        $heating_district_heating=1;
    }
    else {
        $heating_district_heating=0;
    }

    if(isset($satellite)) {
        $satellite=1;
    }
    else {
        $satellite=0;
    }

    if(isset($cable_tv)) {
        $cable_tv=1;
    }
    else {
        $cable_tv=0;
    }

    //Financial fields
    $actual_mortgage=trim(addslashes($actual_mortgage));
    $balance_difference=trim(addslashes($balance_difference));
    $rate_type=trim(addslashes($rate_type));
    $remain_loan=trim(addslashes($remain_loan));
    $remain_years=trim(addslashes($remain_years));
    $periodicity_installment=trim(addslashes($periodicity_installment));
    $payment=trim(addslashes($payment));
    $bank=trim(addslashes($bank));

        //Images and Videos

        if (stristr($video,'youtu.be/')) {
            preg_match('/(https:|http:|)(\/\/www\.|\/\/|)(.*?)\/(.{11})/i', $video, $final_ID);
            $video = $final_ID[4];
        }
        else
        {
            @preg_match('/(https:|http:|):(\/\/www\.|\/\/|)(.*?)\/(embed\/|watch.*?v=|)([a-z_A-Z0-9\-]{11})/i', $video, $IDD);
            $video = $IDD[5];
        }

        if($_FILES['file']['tmp_name'] != "" && $_FILES['file']['tmp_name'] != "null") {
			if(count($_FILES['file']['name'])>25) {
				$_SESSION['ab5']=true;
				echo "<script>location.href='post-ad';</script>";
				header("Location: post-ad"); exit;
			}
			$files=array();
			$fdata=$_FILES['file'];
			if(is_array($fdata['name'])){
				for($i=0;$i<count($fdata['name']);++$i){
					$files[]=array(
					'name'    =>$fdata['name'][$i],
					'type'  => $fdata['type'][$i],
					'tmp_name'=>$fdata['tmp_name'][$i],
					'error' => $fdata['error'][$i], 
					'size'  => $fdata['size'][$i] );
				}
			}
			else $files[]=$fdata;
			foreach($files as $file) {
				$fl=$file['tmp_name'];
				$fln=$file['name'];
				$ext=end(explode(".", $fln));
				$ext=strtolower($ext);
				list($width,$height,$type,$attr)=getimagesize($fl);
				if(($ext != "jpg") && ($ext != "jpeg") && ($ext != "gif") && ($ext != "png")) {
					$_SESSION['ptper']=true;
					echo "<script>location.href='post-ad';</script>";
					header("Location: post-ad"); exit;
				}
				else if($width<500 || $height<330) {
					$_SESSION['szerr']=true;
					echo "<script>location.href='post-ad';</script>";
					header("Location: post-ad"); exit;
				}
			}

            if(empty($prop_ref) || empty($title) || empty($types) || empty($cat) || empty($pfor) || empty($loc) || empty($eprice) || empty($carea) || empty($poss) || empty($bed) || empty($bath) || empty($hall) || empty($furnish) || empty($energy) || empty($floor) || empty($descrip)) {
                $error = "";
                if(empty($prop_ref)){ $error .= "Codice riferimento immobile, "; }
                if(empty($title)){ $error .= "Titolo immobile, "; }
                if(empty($types)){ $error .= "Tipo immobile, "; }
                if(empty($cat)){ $error .= "Categoria immobile, "; }
                if(empty($pfor)){ $error .= "Immobile in, "; }
                if(empty($loc)){ $error .= "Città immobile, "; }
                if(empty($eprice)){ $error .= "Prezzo immobile, "; }
                if(empty($carea)){ $error .= "Superficie immobile, "; }
                if(empty($poss)){ $error .= "Stato attuale immobile, "; }
                if(empty($bed)){ $error .= "Camere da letto, "; }
                if(empty($bath)){ $error .= "Bagni, "; }
                if(empty($hall)){ $error .= "Totale locali, "; }
                if(empty($furnish)){ $error .= "Stato arredamento, "; }
                if(empty($energy)){ $error .= "Classe energetica, "; }
                if(empty($floor)){ $error .= "Piani totali, "; }
                if(empty($descrip)){ $error .= "Descrizione immobile."; }

                echo "<script>swal('Errore', 'Compila tutti i campi e poi controlla di aver inserito correttamente i dati: " . $error . "', 'error');</script>";
            }
            else {

                $randuniq = $com_obj->randuniq();
                $slug = str_replace(" ", "-", $title);
                $slug = strtolower($slug);
                $set = "randuniq='$randuniq',";
                $set .= "slug='$slug',";
                $set .= "email='" . $_SESSION['usr'] . "',";
                $set .= "prop_ref='$prop_ref',";
                $set .= "prop_title='$title',";
                $set .= "location='$loc',";
                if ($geo['status'] == 'OK') {
                    // Get Lat & Long
                    $latitude = $geo['results'][0]['geometry']['location']['lat'];
                    $longitude = $geo['results'][0]['geometry']['location']['lng'];
                    $set .= "lat='$latitude',";
                    $set .= "lng='$longitude',";
                }
                $set .= "address='$addr',";
                $set .= "cap='$cap',";
                $set .= "exp_price='$eprice',";
                $set .= "description='$descrip',";
                $set .= "bedroom='$bed',";
                $set .= "bathroom='$bath',";
                $set .= "hall='$hall',";
                $set .= "types='$types',";
                $set .= "category='$cat',";
                $set .= "prop_for='$pfor',";
                $set .= "covered_area='$carea',";
                $set .= "poss_sts='$poss',";
                $set .= "furnished='$furnish',";
                $set .= "energy='$energy',";
                $set .= "floors='$floor',";
                $set .= "posted_at='$posted',";
                $set .= "post_sts=1,";
                $set .= "featured=0',";

                //Set DB services checkbox

                $set .= "leveled_apartment='$leveled_apartment',";
                $set .= "bungalow='$bungalow',";
                $set .= "old_building='$old_building',";
                $set .= "farmhouse_four_sides='$farmhouse_four_sides',";
                $set .= "farmhouse_three_sides='$farmhouse_three_sides',";
                $set .= "farmhouse_one_side='$farmhouse_one_side',";
                $set .= "villa_vintage='$villa_vintage',";
                $set .= "accessible_people='$accessible_people',";
                $set .= "electric_gate='$electric_gate',";
                $set .= "to_be_restructured='$to_be_restructured',";
                $set .= "alarm_system='$alarm_system',";
                $set .= "near_public_transportation='$near_public_transportation',";
                $set .= "position='$position',";
                $set .= "restructured='$restructured',";
                $set .= "high_traffic='$high_traffic',";
                $set .= "near_highway='$near_highway',";
                $set .= "rooftop_terrace='$rooftop_terrace',";
                $set .= "balcony='$balcony',";
                $set .= "basement_garage='$basement_garage',";
                $set .= "concrete='$concrete',";
                $set .= "garage_box='$garage_box',";
                $set .= "garden='$garden',";
                $set .= "pond='$pond',";
                $set .= "exposed_brick='$exposed_brick',";
                $set .= "mosaic='$mosaic',";
                $set .= "noted_palace='$noted_palace',";
                $set .= "panels='$panels',";
                $set .= "parking='$parking',";
                $set .= "glass_wall='$glass_wall',";
                $set .= "stone='$stone',";
                $set .= "pool='$pool',";
                $set .= "parking_space='$parking_space',";
                $set .= "cesspool='$cesspool',";
                $set .= "prefabricated='$prefabricated',";
                $set .= "closet='$closet',";
                $set .= "independent_closet='$independent_closet',";
                $set .= "wood_coating='$wood_coating',";
                $set .= "structure_under_construction='$structure_under_construction',";
                $set .= "putty='$putty',";
                $set .= "patio_deck='$patio_deck',";
                $set .= "flat_roof='$flat_roof',";
                $set .= "unfinished='$unfinished',";
                $set .= "lift_elevator='$lift_elevator',";
                $set .= "redeveloped='$redeveloped',";
                $set .= "outdoor_pool='$outdoor_pool',";
                $set .= "indoor_pool='$indoor_pool',";
                $set .= "reception='$reception',";
                $set .= "first_owner='$first_owner',";
                $set .= "needs_redevelopment='$needs_redevelopment',";
                $set .= "security_service='$security_service',";
                $set .= "frescoes='$frescoes',";
                $set .= "large_hall='$large_hall',";
                $set .= "large_closet='$large_closet',";
                $set .= "kitchenette='$kitchenette',";
                $set .= "conditioned_air='$conditioned_air',";
                $set .= "central_air_conditioned='$central_air_conditioned',";
                $set .= "independent_room='$independent_room',";
                $set .= "fireplace='$fireplace',";
                $set .= "livable_kitchen='$livable_kitchen',";
                $set .= "livable_kitchen_den='$livable_kitchen_den',";
                $set .= "tiled_kitchen='$tiled_kitchen',";
                $set .= "kitchen_kitchenette='$kitchen_kitchenette',";
                $set .= "circular_windows='$circular_windows',";
                $set .= "internal_plasterboard='$internal_plasterboard',";
                $set .= "washing_facilities='$washing_facilities',";
                $set .= "laundry_room='$laundry_room',";
                $set .= "tiled_floors='$tiled_floors',";
                $set .= "parquet_floor='$parquet_floor',";
                $set .= "underfloor_heating='$underfloor_heating',";
                $set .= "gas_stove='$gas_stove',";
                $set .= "accessible_by_boat='$accessible_by_boat',";
                $set .= "town_center='$town_center',";
                $set .= "business_center='$business_center',";
                $set .= "old_town='$old_town',";
                $set .= "surrounded_by_beaches='$surrounded_by_beaches',";
                $set .= "easily_accessible_by_car='$easily_accessible_by_car',";
                $set .= "lagoon_front='$lagoon_front',";
                $set .= "country_side='$country_side',";
                $set .= "settlement='$settlement',";
                $set .= "isolated='$isolated',";
                $set .= "isolated_far_from_settlements='$isolated_far_from_settlements',";
                $set .= "forest_edge='$forest_edge',";
                $set .= "isolated_location='$isolated_location',";
                $set .= "near_golf_course='$near_golf_course',";
                $set .= "outskirts='$outskirts',";
                $set .= "private_location='$private_location',";
                $set .= "quiet_street='$quiet_street',";
                $set .= "on_the_sea='$on_the_sea',";
                $set .= "on_the_beach='$on_the_beach',";
                $set .= "airport_nearby='$airport_nearby',";
                $set .= "forest_nearby='$forest_nearby',";
                $set .= "channel_nearby='$channel_nearby',";
                $set .= "near_congress_center='$near_congress_center',";
                $set .= "near_church='$near_church',";
                $set .= "near_bus='$near_bus',";
                $set .= "school_bus_stop_nearby='$school_bus_stop_nearby',";
                $set .= "near_lake='$near_lake',";
                $set .= "near_sea='$near_sea',";
                $set .= "near_subway='$near_subway',";
                $set .= "near_mountain='$near_mountain',";
                $set .= "shops_nearby='$shops_nearby',";
                $set .= "near_hospital='$near_hospital',";
                $set .= "near_gym='$near_gym',";
                $set .= "near_park='$near_park',";
                $set .= "walking_nearby='$walking_nearby',";
                $set .= "near_wood='$near_wood',";
                $set .= "near_school='$near_school',";
                $set .= "near_beach='$near_beach',";
                $set .= "near_train_station='$near_train_station',";
                $set .= "near_tangential='$near_tangential',";
                $set .= "canal_view='$canal_view',";
                $set .= "lake_view='$lake_view',";
                $set .= "sea_view='$sea_view',";
                $set .= "mountain_view='$mountain_view',";
                $set .= "city_view='$city_view',";
                $set .= "nature_view='$nature_view',";
                $set .= "beach_view='$beach_view',";
                $set .= "nord='$nord',";
                $set .= "nord_est='$nord_est',";
                $set .= "est='$est',";
                $set .= "sud_est='$sud_est',";
                $set .= "sud='$sud',";
                $set .= "sud_ovest='$sud_ovest',";
                $set .= "ovest='$ovest',";
                $set .= "nord_ovest='$nord_ovest',";
                $set .= "ancient='$ancient',";
                $set .= "art_deco='$art_deco',";
                $set .= "art_nouveau='$art_nouveau',";
                $set .= "barocco='$barocco',";
                $set .= "biedermeier='$biedermeier',";
                $set .= "british='$british',";
                $set .= "attic_rooms='$attic_rooms',";
                $set .= "century_home='$century_home',";
                $set .= "colonnade='$colonnade',";
                $set .= "contemporary='$contemporary',";
                $set .= "edwardian='$edwardian',";
                $set .= "elizabethan='$elizabethan',";
                $set .= "french='$french',";
                $set .= "gothic='$gothic',";
                $set .= "english='$english',";
                $set .= "liberty='$liberty',";
                $set .= "mediterranean='$mediterranean',";
                $set .= "modern='$modern',";
                $set .= "neoclassic='$neoclassic',";
                $set .= "fine_arts='$fine_arts',";
                $set .= "regency='$regency',";
                $set .= "renaissance='$renaissance',";
                $set .= "roman='$roman',";
                $set .= "spanish='$spanish',";
                $set .= "style_1200='$style_1200',";
                $set .= "style_1300='$style_1300',";
                $set .= "style_1400='$style_1400',";
                $set .= "style_1500='$style_1500',";
                $set .= "style_1600='$style_1600',";
                $set .= "style_1700='$style_1700',";
                $set .= "style_1800='$style_1800',";
                $set .= "style_60_70='$style_60_70',";
                $set .= "style_900='$style_900',";
                $set .= "tudor='$tudor',";
                $set .= "victorian='$victorian',";
                $set .= "running_water='$running_water',";
                $set .= "fireplace_chimney='$fireplace_chimney',";
                $set .= "water_tank='$water_tank',";
                $set .= "solar_collectors='$solar_collectors',";
                $set .= "electricity='$electricity',";
                $set .= "geothermal_energy='$geothermal_energy',";
                $set .= "sanitation='$sanitation',";
                $set .= "source_of_water='$source_of_water',";
                $set .= "gas='$gas',";
                $set .= "gas_gpl='$gas_gpl',";
                $set .= "methane_gas='$methane_gas',";
                $set .= "natural_gas='$natural_gas',";
                $set .= "ups_generator='$ups_generator',";
                $set .= "adsl_line='$adsl_line',";
                $set .= "heat_pump='$heat_pump',";
                $set .= "fireplace_predisposition='$fireplace_predisposition',";
                $set .= "network_computing='$network_computing',";
                $set .= "heating_hot_air='$heating_hot_air',";
                $set .= "heating_none='$heating_none',";
                $set .= "autonomous_heating='$autonomous_heating',";
                $set .= "heating_central_boiler='$heating_central_boiler',";
                $set .= "centralized_warming='$centralized_warming',";
                $set .= "heating_solid_fuel='$heating_solid_fuel',";
                $set .= "electric_heating='$electric_heating',";
                $set .= "heating_gas_gpl='$heating_gas_gpl',";
                $set .= "heating_oil='$heating_oil',";
                $set .= "heating_solar='$heating_solar',";
                $set .= "heating_district_heating='$heating_district_heating',";
                $set .= "satellite='$satellite',";
                $set .= "cable_tv='$cable_tv',";

                //Set DB financial fields

                $set .= "actual_mortgage='$actual_mortgage',";
                $set .= "balance_difference='$balance_difference',";
                $set .= "rate_type='$rate_type',";
                $set .= "remain_loan='$remain_loan',";
                $set .= "remain_years='$remain_years',";
                $set .= "periodicity_installment='$periodicity_installment',";
                $set .= "payment='$payment',";
                $set .= "bank='$bank',";

                $set .= "video='$video'";


                $que = "insert into listings set $set";
                $id = $db->insertid($que);
                $_SESSION['pid'] = $id;

                foreach ($files as $file) {
                    $fl = $file['tmp_name'];
                    $fln = $file['name'];
                    $ext = end(explode(".", $fln));
                    $ext = strtolower($ext);
                    $tmpname = basename($fl);
                    $pat = array();
                    $pat[0] = '/php/';
                    $pat[1] = '/.tmp/';
                    $repl = array();
                    $repl[0] = '';
                    $repl[1] = '';
                    $oname = strtolower(preg_replace($pat, $repl, $tmpname));
                    $newname = 'prop' . $_SESSION['pid'] . '_' . $oname . '.' . $ext;
                    $org = 'images/prop/org/' . $newname;
                    $prf = 'images/prop/' . $newname;
                    $sm = 'images/prop/230_144/' . $newname;
                    $tsm = 'images/prop/74_46/' . $newname;
                    move_uploaded_file($fl, $org);

                    $resizeObj = new resize($org);

                    $resizeObj->resizeImage(800, 500, 'exact');
                    $resizeObj->saveImage($prf, 72);

                    $resizeObj->resizeImage(230, 144, 'exact');
                    $resizeObj->saveImage($sm, 100);

                    $resizeObj->resizeImage(74, 46, 'exact');
                    $resizeObj->saveImage($tsm, 100);

                    $set = "pid='" . $_SESSION['pid'] . "',";
                    $set .= "image='$newname'";
                    $db->insertrec("insert into listing_images set $set");
                }
                $_SESSION['posted'] = true;
                echo "<script>swal('Complimenti', 'L\'immobile è stato aggiunto con successo!', 'success')</script>";
                echo "<script>location.href='$siteurl/manage-your-list'</script>";
                header("Location: $siteurl/manage-your-list");
                exit;
            }
		}
}
?>               				 
<form class="tab-content contain" id="p_ad" action="post-ad" method="post" enctype="multipart/form-data">
    <div class="tab-pane active" id="details">
    <div class="col-md-9 col-sm-12 col-xs-12 mt5 row">
          <div class="col-md-12 col-sm-12 col-xs-12"><span class="blackhead"><br>Dettagli immobile</span></div><!--col-md-12-->
              <div class="col-md-12 col-sm-12 col-xs-12">
                     <label class="col-md-4 col-sm-6 col-xs-12 post-add-box-form-font mt20">Riferimento immobile <span class="post-add-box-form-font-redfont">*</span></label>
                     <label class="col-md-8  col-sm-6 col-xs-12 mt20">
                         <label class="col-md-12  col-sm-12 col-xs-12">
                             <input type="text" name="prop_ref" class="post-add-form-control" placeholder="Inserisci codice riferimento immobile" value="<? echo @$prop_ref; ?>">
                         </label>
                     </label>
                     <label class="col-md-4 col-sm-6 col-xs-12 post-add-box-form-font mt20">Titolo immobile <span class="post-add-box-form-font-redfont">*</span></label>
                     <label class="col-md-8  col-sm-6 col-xs-12 mt20">
                            <label class="col-md-12  col-sm-12 col-xs-12">
                                   <input type="text" name="title" class="post-add-form-control" placeholder="Inserisci titolo immobile" value="<? echo @$title; ?>">
                            </label>
                      </label>
                      <label class="col-md-4 col-sm-6 col-xs-12 post-add-box-form-font mt20">Tipo immobile <span class="post-add-box-form-font-redfont">*</span></label>
                      <label class="col-md-8  col-sm-6 col-xs-12 mt20">
                          <label class="col-md-12 col-sm-12 col-xs-12">
                              <select name="types" class="form-control post-add-selectbox">
                                  <option value="">Seleziona tipo</option>
                                  <option value="residenziale" <? if($types=='residenziale') echo "selected"; ?>>Residenziale</option>
                                  <option value="commerciale" <? if($types=='commerciale') echo "selected"; ?>>Commerciale</option>
                                  <option value="immobili-di-lusso" <? if($types=='immobili-di-lusso') echo "selected"; ?>>Immobili di lusso</option>
                                  <option value="nuove-costruzioni" <? if($types=='nuove-costruzioni') echo "selected"; ?>>Nuove costruzioni</option>
                                  <option value="asta" <? if($types=='asta') echo "selected"; ?>>Immobili all'asta</option>

                              </select>
                          </label>
                      </label>
                     <label class="col-md-4 col-sm-6 col-xs-12 post-add-box-form-font mt20">Categoria immobile <span class="post-add-box-form-font-redfont">*</span></label>
                     <label class="col-md-8  col-sm-6 col-xs-12 mt20">
                                 <label class="col-md-12 col-sm-12 col-xs-12">
                                       <select name="cat" class="form-control post-add-selectbox">
                                           <option value="">Seleziona categoria</option>
                                           <option value="appartamento" <? if($categ=='appartamento') echo "selected"; ?>>Appartamento</option>
                                           <option value="attico-mansarda" <? if($categ=='attico-mansarda') echo "selected"; ?>>Attico / Mansarda</option>
                                           <option value="box-garage" <? if($categ=='box-garage') echo "selected"; ?>>Box / Garage</option>
                                           <option value="casa-indipendente" <? if($categ=='casa-indipendente') echo "selected"; ?>>Casa indipendente</option>
                                           <option value="loft-open-space" <? if($categ=='loft-open-space') echo "selected"; ?>>Loft / Open Space</option>
                                           <option value="palazzo-stabile" <? if($categ=='palazzo-stabile') echo "selected"; ?>>Palazzo / Stabile</option>
                                           <option value="rustico-casale" <? if($categ=='rustico-casale') echo "selected"; ?>>Rustico / Casale</option>
                                           <option value="villa" <? if($categ=='villa') echo "selected"; ?>>Villa</option>
                                           <option value="villetta-a-schiera" <? if($categ=='villetta-a-schiera') echo "selected"; ?>>Villetta a schiera</option>
                                           <option value="terreno" <? if($categ=='terreno') echo "selected"; ?>>Terreno</option>
                                           <option value="altro" <? if($categ=='altro') echo "selected"; ?>>Altro</option>
                                       </select>
                               </label>
                     </label>
                     
                     <label class="col-md-4 col-sm-6 col-xs-12 post-add-box-form-font mt20">Immobile in <span class="post-add-box-form-font-redfont">*</span></label>
                     <label class="col-md-8  col-sm-6 col-xs-12 mt20">
                                 <label class="col-md-12 col-sm-12 col-xs-12">
                                       <select name="pfor" class="form-control post-add-selectbox">
                                           <option value="">Seleziona contratto</option>
                                           <option value="vendita" <? if(isset($pfor)=='vendita') echo "selected"; ?>>Vendita</option>
                                           <option value="affitto" <? if(isset($pfor)=='affitto') echo "selected"; ?>>Affitto</option>
                                       </select>
                               </label>
                     </label>
					 
                     <label class="col-md-4 col-sm-6 col-xs-12 post-add-box-form-font mt20">
                     Citt&aacute; immobile <span class="post-add-box-form-font-redfont">*</span></label>
                     <label class="col-md-8  col-sm-6 col-xs-12">
                           <label class="col-md-12 col-sm-12 col-xs-12 mt20">
                               <input id="autocomplete" onFocus="geolocate()" type="text" name="loc" class="post-add-form-control" placeholder="Inserisci citt&aacute; immobile" autocomplete="off">
                           </label>
                     </label>
					 
					 <label class="col-md-4 col-sm-6 col-xs-12 post-add-box-form-font mt20">
                     Indirizzo immobile <span class="post-add-box-form-font-redfont"></span></label>
                     <label class="col-md-8  col-sm-6 col-xs-12">
                           <label class="col-md-12 col-sm-12 col-xs-12 mt20">
                               <input id="addr" onFocus="geolocate()" type="text" name="addr" class=" post-add-form-control" placeholder="Inserisci indirizzo immobile" autocomplete="off">
                           </label>
                     </label>

                     <label class="col-md-4 col-sm-6 col-xs-12 post-add-box-form-font mt20">
                         CAP</label>
                     <label class="col-md-8  col-sm-6 col-xs-12">
                         <label class="col-md-12 col-sm-12 col-xs-12 mt20">
                             <input type="number" name="cap" value="" class="post-add-form-control" placeholder="Inserisci CAP zona"></label>
                     </label>
                     
                     <label class="col-md-4 col-sm-6 col-xs-12 post-add-box-form-font mt20">
                     Prezzo immobile <span class="post-add-box-form-font-redfont">*</span></label>
                     <label class="col-md-8  col-sm-6 col-xs-12">
                           <label class="col-md-12 col-sm-6 col-xs-12 mt20"><input type="number" onkeydown="return ( event.ctrlKey || event.altKey
                    || (47<event.keyCode && event.keyCode<58 && event.shiftKey==false) 
                    || (95<event.keyCode && event.keyCode<106)
                    || (event.keyCode==8) || (event.keyCode==9) 
                    || (event.keyCode>34 && event.keyCode<40) 
                    || (event.keyCode==46) )" name="eprice" class=" post-add-form-control" placeholder="Inserisci prezzo in &euro;" value="<? echo @$eprice; ?>"></label>
                     </label>

                     <label class="col-md-4 col-sm-6 col-xs-12 post-add-box-form-font mt20">
                       Superficie immobile <span class="post-add-box-form-font-redfont">*</span></label>
                     <label class="col-md-8  col-sm-6 col-xs-12">
                           <label class="col-md-12 col-sm-6 col-xs-12 mt20"><input type="number" onkeydown="return ( event.ctrlKey || event.altKey
                    || (47<event.keyCode && event.keyCode<58 && event.shiftKey==false) 
                    || (95<event.keyCode && event.keyCode<106)
                    || (event.keyCode==8) || (event.keyCode==9) 
                    || (event.keyCode>34 && event.keyCode<40) 
                    || (event.keyCode==46) )" name="carea" class=" post-add-form-control" placeholder="Metri quadrati" value="<? echo @$carea; ?>"></label>
                     </label>

                  <label class="col-md-4 col-sm-6 col-xs-12 post-add-box-form-font">&nbsp;</label>

              </div><!--col-md-12 col-sm-12 col-xs-12-->
          </div>
        </div><!--TAB-->

        <div class="tab-pane" id="features"><!--TAB begin-->

        <div class="col-md-9 col-sm-12 col-xs-12 mt5 row">

          <div class="col-md-12 col-sm-12 col-xs-12 mt25"><span class="blackhead">Caratteristiche immobile</span></div><!--col-md-12-->
          
              <div class="col-md-12 col-sm-12 col-xs-12">        
                     
                     <label class="col-md-4 col-sm-6 col-xs-12 post-add-box-form-font mt20">Stato attuale immobile <span class="post-add-box-form-font-redfont">*</span></label>
                     <label class="col-md-8 col-sm-6 col-xs-12">
                     <label class="col-md-12  col-sm-12 col-xs-12 mt20">
                         <select name="poss" class="form-control post-add-selectbox">
                             <option value="">Seleziona stato immobile</option>
                             <option value="1" <? if(isset($poss)==1) echo "selected"; ?>>Libero</option>
                             <option value="2" <? if(isset($poss)==2) echo "selected"; ?>>Da costruire</option>
                             <option value="3" <? if(isset($poss)==3) echo "selected"; ?>>Occupato da proprietario</option>
                             <option value="4" <? if(isset($poss)==4) echo "selected"; ?>>Occupato da inquilino</option>
                             <option value="5" <? if(isset($poss)==5) echo "selected"; ?>>Parzialmente Rifinito</option>
                             <option value="6" <? if(isset($poss)==6) echo "selected"; ?>>Rifiniture Standard</option>
                             <option value="7" <? if(isset($poss)==7) echo "selected"; ?>>Rifiniture di Lusso</option>
                             <option value="8" <? if(isset($poss)==8) echo "selected"; ?>>Pre Costruzione</option>
                             <option value="9" <? if(isset($poss)==9) echo "selected"; ?>>Con Permessi</option>
                             <option value="10" <? if(isset($poss)==10) echo "selected"; ?>>Convertito</option>
                             <option value="11" <? if(isset($poss)==11) echo "selected"; ?>>Convertito Parzialmente</option>
                             <option value="12" <? if(isset($poss)==12) echo "selected"; ?>>Non Convertito</option>
                         </select>
                     </label>

                     </label><!--col-md-8-->
                     
                     <label class="col-md-4 col-sm-6 col-xs-12 post-add-box-form-font mt20">Camere</label>
                     <label class="col-md-8 col-sm-6 col-xs-12">
                               <label class="col-md-6  col-sm-12 col-xs-12 mt20">
                                <span class="post-add-box-font">Camere da letto</span>
                                   <input type="number" name="bed" value="" placeholder="Inserisci numero" class="post-add-form-control">
                               </label>
                               <label class="col-md-6  col-sm-12 col-xs-12 mt20">
                                <span class=" post-add-box-font">Bagni</span>
                                   <input type="number" name="bath" value="" placeholder="Inserisci numero" class="post-add-form-control">
                               </label>
                     </label><!--col-md-12-->
                     
                     <label class="col-md-4 col-sm-6 col-xs-12 post-add-box-form-font mt20">Totale locali <span class="post-add-box-form-font-redfont">*</span></label>
                     <label class="col-md-8 col-sm-6 col-xs-12">
                               <label class="col-md-12  col-sm-12 col-xs-12 mt20">
                                   <input type="number" name="hall" value="" placeholder="Inserisci totale locali" class="post-add-form-control">
                               </label>
                     </label><!--col-md-12-->
                     
                     
                  <label class="col-md-4 col-sm-6 col-xs-12 post-add-box-form-font mt20">Stato arredamento <span class="post-add-box-form-font-redfont">*</span></label>
                     <label class="col-md-8 col-sm-6 col-xs-12">
                               <label class="col-md-12  col-sm-12 col-xs-12 mt20">
                                       <select name="furnish" class="form-control post-add-selectbox " >
                                                <option value="">Seleziona stato arredamento</option>
                                                <option value="1" <? if(isset($furnish)==1) echo "selected"; ?>>Arredato</option>
                                                <option value="2" <? if(isset($furnish)==2) echo "selected"; ?>>Parzialmente arredato</option>
                                                <option value="3" <? if(isset($furnish)==3) echo "selected"; ?>>Non arredato</option>
                                       </select>
                                               
                               </label>
                     </label><!--col-md-12-->

                  <label class="col-md-4 col-sm-6 col-xs-12 post-add-box-form-font mt20">Classe energetica <span class="post-add-box-form-font-redfont">*</span></label>
                  <label class="col-md-8 col-sm-6 col-xs-12">
                      <label class="col-md-12  col-sm-12 col-xs-12 mt20">
                          <select name="energy" class="form-control post-add-selectbox " >
                              <option value="">Seleziona classe energetica</option>
                              <option value="1" <? if(isset($energy)==1) echo "selected"; ?>>A+</option>
                              <option value="2" <? if(isset($energy)==2) echo "selected"; ?>>A</option>
                              <option value="3" <? if(isset($energy)==3) echo "selected"; ?>>B</option>
                              <option value="4" <? if(isset($energy)==4) echo "selected"; ?>>C</option>
                              <option value="5" <? if(isset($energy)==5) echo "selected"; ?>>D</option>
                              <option value="6" <? if(isset($energy)==6) echo "selected"; ?>>E</option>
                              <option value="7" <? if(isset($energy)==7) echo "selected"; ?>>F</option>
                              <option value="8" <? if(isset($energy)==8) echo "selected"; ?>>G</option>
                              <option value="9" <? if(isset($energy)==9) echo "selected"; ?>>In fase di rilascio</option>
                          </select>

                      </label>
                  </label><!--col-md-12-->
                     
                   <label class="col-md-4 col-sm-6 col-xs-12 post-add-box-form-font mt20">Piani totali (0 terra) <span class="post-add-box-form-font-redfont">*</span></label>
                     <label class="col-md-8 col-sm-6 col-xs-12">
                               <label class="col-md-12  col-sm-12 col-xs-12 mt20">
                                       <input type="number" name="floor" value="" placeholder="Inserisci totale piani" class="post-add-form-control">
                               </label>
                     </label><!--col-md-12-->
                     

                     <label class="col-md-4 col-sm-6 col-xs-12 post-add-box-form-font mt20">Descrizione immobile <span class="post-add-box-form-font-redfont">*</span></label>
                     <label class="col-md-8 col-sm-6 col-xs-12">
                             <label class="col-md-12 col-sm-12 col-xs-12">
                                   <textarea style="resize:vertical;height:180px;" class="post-add-form-control mt10" placeholder="Inserisci descrizione immobile" name="descrip" rows="5" cols="5" ><? echo @$descrip; ?></textarea>
                             </label>
                     </label>
                  <label class="col-md-4 col-sm-6 col-xs-12 post-add-box-form-font">&nbsp;</label>

              </div><!--col-md-12 col-sm-12 col-xs-12-->
               
    </div><!--col-md-9-->

    </div><!--TAB end-->

    <div class="tab-pane" id="services"><!--TAB begin-->

        <div class="col-md-9 col-sm-12 col-xs-12 mt5 row">
            <div class="col-md-12 col-sm-12 col-xs-12"><span class="blackhead"><br>Stile immobile</span></div><!--col-md-12-->
            <div class="col-md-12 col-sm-12 col-xs-12">

                <label class="col-md-5 col-sm-6 col-xs-12 post-add-box-form-font mt20">Appartamento su pi&uacute; piani</label>
                <label class="col-md-1 col-sm-6 col-xs-12">
                    <label class="col-md-12  col-sm-12 col-xs-12 mt20 row">
                        <label class="col-md-6  col-sm-6 col-xs-12">
                            <input type="checkbox" name="leveled_apartment" class="">
                        </label>

                    </label>

                </label><!--col-md-8-->

                <label class="col-md-5 col-sm-6 col-xs-12 post-add-box-form-font mt20">Bungalow</label>
                <label class="col-md-1 col-sm-6 col-xs-12">
                    <label class="col-md-12  col-sm-12 col-xs-12 mt20 row">
                        <label class="col-md-6  col-sm-6 col-xs-12">
                            <input type="checkbox" name="bungalow" class="">
                        </label>

                    </label>

                </label><!--col-md-8-->

                <label class="col-md-5 col-sm-6 col-xs-12 post-add-box-form-font mt20">Edificio d'epoca</label>
                <label class="col-md-1 col-sm-6 col-xs-12">
                    <label class="col-md-12  col-sm-12 col-xs-12 mt20 row">
                        <label class="col-md-6  col-sm-6 col-xs-12">
                            <input type="checkbox" name="old_building" class="">
                        </label>

                    </label>

                </label><!--col-md-8-->


                <label class="col-md-5 col-sm-6 col-xs-12 post-add-box-form-font mt20">Fattoria su quattro lati</label>
                <label class="col-md-1 col-sm-6 col-xs-12">
                    <label class="col-md-12  col-sm-12 col-xs-12 mt20 row">
                        <label class="col-md-6  col-sm-6 col-xs-12">
                            <input type="checkbox" name="farmhouse_four_sides" class="">
                        </label>

                    </label>

                </label><!--col-md-8-->

                <label class="col-md-5 col-sm-6 col-xs-12 post-add-box-form-font mt20">Fattoria su tre lati</label>
                <label class="col-md-1 col-sm-6 col-xs-12">
                    <label class="col-md-12  col-sm-12 col-xs-12 mt20 row">
                        <label class="col-md-6  col-sm-6 col-xs-12">
                            <input type="checkbox" name="farmhouse_three_sides" class="">
                        </label>

                    </label>

                </label><!--col-md-8-->

                <label class="col-md-5 col-sm-6 col-xs-12 post-add-box-form-font mt20">Fattoria su un lato</label>
                <label class="col-md-1 col-sm-6 col-xs-12">
                    <label class="col-md-12  col-sm-12 col-xs-12 mt20 row">
                        <label class="col-md-6  col-sm-6 col-xs-12">
                            <input type="checkbox" name="farmhouse_one_side" class="">
                        </label>

                    </label>

                </label><!--col-md-8-->

                <label class="col-md-5 col-sm-6 col-xs-12 post-add-box-form-font mt20">Villa d'epoca</label>
                <label class="col-md-1 col-sm-6 col-xs-12">
                    <label class="col-md-12  col-sm-12 col-xs-12 mt20 row">
                        <label class="col-md-6  col-sm-6 col-xs-12">
                            <input type="checkbox" name="villa_vintage" class="">
                        </label>

                    </label>

                </label><!--col-md-8-->

            </div><!--col-md-12 col-sm-12 col-xs-12-->

            <div class="col-md-12 col-sm-12 col-xs-12"><span class="blackhead"><br>Caratteristiche Esterne</span></div><!--col-md-12-->
            <div class="col-md-12 col-sm-12 col-xs-12">

                <label class="col-md-5 col-sm-6 col-xs-12 post-add-box-form-font mt20">Accessibile persone</label>
                <label class="col-md-1 col-sm-6 col-xs-12">
                    <label class="col-md-12  col-sm-12 col-xs-12 mt20 row">
                        <label class="col-md-6  col-sm-6 col-xs-12">
                            <input type="checkbox" name="accessible_people" class="">
                        </label>

                    </label>

                </label><!--col-md-8-->

                <label class="col-md-5 col-sm-6 col-xs-12 post-add-box-form-font mt20">Portone automatico</label>
                <label class="col-md-1 col-sm-6 col-xs-12">
                    <label class="col-md-12  col-sm-12 col-xs-12 mt20 row">
                        <label class="col-md-6  col-sm-6 col-xs-12">
                            <input type="checkbox" name="electric_gate" class="">
                        </label>

                    </label>

                </label><!--col-md-8-->
                </div>

            <div class="col-md-12 col-sm-12 col-xs-12"><span class="blackhead"><br>Caratteristiche Commerciali</span></div><!--col-md-12-->
            <div class="col-md-12 col-sm-12 col-xs-12">

                <label class="col-md-5 col-sm-6 col-xs-12 post-add-box-form-font mt20">Da ristrutturare</label>
                <label class="col-md-1 col-sm-6 col-xs-12">
                    <label class="col-md-12  col-sm-12 col-xs-12 mt20 row">
                        <label class="col-md-6  col-sm-6 col-xs-12">
                            <input type="checkbox" name="to_be_restructured" class="">
                        </label>

                    </label>

                </label><!--col-md-8-->

                <label class="col-md-5 col-sm-6 col-xs-12 post-add-box-form-font mt20">Impianto di allarme</label>
                <label class="col-md-1 col-sm-6 col-xs-12">
                    <label class="col-md-12  col-sm-12 col-xs-12 mt20 row">
                        <label class="col-md-6  col-sm-6 col-xs-12">
                            <input type="checkbox" name="alarm_system" class="">
                        </label>

                    </label>

                </label><!--col-md-8-->

                <label class="col-md-5 col-sm-6 col-xs-12 post-add-box-form-font mt20">Mezzi pubblici vicini</label>
                <label class="col-md-1 col-sm-6 col-xs-12">
                    <label class="col-md-12  col-sm-12 col-xs-12 mt20 row">
                        <label class="col-md-6  col-sm-6 col-xs-12">
                            <input type="checkbox" name="near_public_transportation" class="">
                        </label>

                    </label>

                </label><!--col-md-8-->

                <label class="col-md-5 col-sm-6 col-xs-12 post-add-box-form-font mt20">Posizione</label>
                <label class="col-md-1 col-sm-6 col-xs-12">
                    <label class="col-md-12  col-sm-12 col-xs-12 mt20 row">
                        <label class="col-md-6  col-sm-6 col-xs-12">
                            <input type="checkbox" name="position" class="">
                        </label>

                    </label>

                </label><!--col-md-8-->

                <label class="col-md-5 col-sm-6 col-xs-12 post-add-box-form-font mt20">Ristrutturato</label>
                <label class="col-md-1 col-sm-6 col-xs-12">
                    <label class="col-md-12  col-sm-12 col-xs-12 mt20 row">
                        <label class="col-md-6  col-sm-6 col-xs-12">
                            <input type="checkbox" name="restructured" class="">
                        </label>

                    </label>

                </label><!--col-md-8-->

                <label class="col-md-5 col-sm-6 col-xs-12 post-add-box-form-font mt20">Strada ad alto passaggio</label>
                <label class="col-md-1 col-sm-6 col-xs-12">
                    <label class="col-md-12  col-sm-12 col-xs-12 mt20 row">
                        <label class="col-md-6  col-sm-6 col-xs-12">
                            <input type="checkbox" name="high_traffic" class="">
                        </label>

                    </label>

                </label><!--col-md-8-->

                <label class="col-md-5 col-sm-6 col-xs-12 post-add-box-form-font mt20">Vicinanze Autostrada</label>
                <label class="col-md-1 col-sm-6 col-xs-12">
                    <label class="col-md-12  col-sm-12 col-xs-12 mt20 row">
                        <label class="col-md-6  col-sm-6 col-xs-12">
                            <input type="checkbox" name="near_highway" class="">
                        </label>

                    </label>

                </label><!--col-md-8-->

            </div>

            <div class="col-md-12 col-sm-12 col-xs-12"><span class="blackhead"><br>Caratteristiche Esterne</span></div><!--col-md-12-->
            <div class="col-md-12 col-sm-12 col-xs-12">

                <label class="col-md-5 col-sm-6 col-xs-12 post-add-box-form-font mt20">Altana - Terrazza sul Tetto</label>
                <label class="col-md-1 col-sm-6 col-xs-12">
                    <label class="col-md-12  col-sm-12 col-xs-12 mt20 row">
                        <label class="col-md-6  col-sm-6 col-xs-12">
                            <input type="checkbox" name="rooftop_terrace" class="">
                        </label>

                    </label>

                </label><!--col-md-8-->

                <label class="col-md-5 col-sm-6 col-xs-12 post-add-box-form-font mt20">Balcone</label>
                <label class="col-md-1 col-sm-6 col-xs-12">
                    <label class="col-md-12  col-sm-12 col-xs-12 mt20 row">
                        <label class="col-md-6  col-sm-6 col-xs-12">
                            <input type="checkbox" name="balcony" class="">
                        </label>

                    </label>

                </label><!--col-md-8-->

                <label class="col-md-5 col-sm-6 col-xs-12 post-add-box-form-font mt20">Box con Porta Automatica</label>
                <label class="col-md-1 col-sm-6 col-xs-12">
                    <label class="col-md-12  col-sm-12 col-xs-12 mt20 row">
                        <label class="col-md-6  col-sm-6 col-xs-12">
                            <input type="checkbox" name="basement_garage" class="">
                        </label>

                    </label>

                </label><!--col-md-8-->

                <label class="col-md-5 col-sm-6 col-xs-12 post-add-box-form-font mt20">Calcestruzzo</label>
                <label class="col-md-1 col-sm-6 col-xs-12">
                    <label class="col-md-12  col-sm-12 col-xs-12 mt20 row">
                        <label class="col-md-6  col-sm-6 col-xs-12">
                            <input type="checkbox" name="concrete" class="">
                        </label>

                    </label>

                </label><!--col-md-8-->

                <label class="col-md-5 col-sm-6 col-xs-12 post-add-box-form-font mt20">Garage/Box</label>
                <label class="col-md-1 col-sm-6 col-xs-12">
                    <label class="col-md-12  col-sm-12 col-xs-12 mt20 row">
                        <label class="col-md-6  col-sm-6 col-xs-12">
                            <input type="checkbox" name="garage_box" class="">
                        </label>

                    </label>

                </label><!--col-md-8-->

                <label class="col-md-5 col-sm-6 col-xs-12 post-add-box-form-font mt20">Giardino</label>
                <label class="col-md-1 col-sm-6 col-xs-12">
                    <label class="col-md-12  col-sm-12 col-xs-12 mt20 row">
                        <label class="col-md-6  col-sm-6 col-xs-12">
                            <input type="checkbox" name="garden" class="">
                        </label>

                    </label>

                </label><!--col-md-8-->

                <label class="col-md-5 col-sm-6 col-xs-12 post-add-box-form-font mt20">Laghetto</label>
                <label class="col-md-1 col-sm-6 col-xs-12">
                    <label class="col-md-12  col-sm-12 col-xs-12 mt20 row">
                        <label class="col-md-6  col-sm-6 col-xs-12">
                            <input type="checkbox" name="pond" class="">
                        </label>

                    </label>

                </label><!--col-md-8-->

                <label class="col-md-5 col-sm-6 col-xs-12 post-add-box-form-font mt20">Mattoni a vista</label>
                <label class="col-md-1 col-sm-6 col-xs-12">
                    <label class="col-md-12  col-sm-12 col-xs-12 mt20 row">
                        <label class="col-md-6  col-sm-6 col-xs-12">
                            <input type="checkbox" name="exposed_brick" class="">
                        </label>

                    </label>

                </label><!--col-md-8-->

                <label class="col-md-5 col-sm-6 col-xs-12 post-add-box-form-font mt20">Mosaico</label>
                <label class="col-md-1 col-sm-6 col-xs-12">
                    <label class="col-md-12  col-sm-12 col-xs-12 mt20 row">
                        <label class="col-md-6  col-sm-6 col-xs-12">
                            <input type="checkbox" name="mosaic" class="">
                        </label>

                    </label>

                </label><!--col-md-8-->

                <label class="col-md-5 col-sm-6 col-xs-12 post-add-box-form-font mt20">Palazzo Celebre</label>
                <label class="col-md-1 col-sm-6 col-xs-12">
                    <label class="col-md-12  col-sm-12 col-xs-12 mt20 row">
                        <label class="col-md-6  col-sm-6 col-xs-12">
                            <input type="checkbox" name="noted_palace" class="">
                        </label>

                    </label>

                </label><!--col-md-8-->

                <label class="col-md-5 col-sm-6 col-xs-12 post-add-box-form-font mt20">Pannelli</label>
                <label class="col-md-1 col-sm-6 col-xs-12">
                    <label class="col-md-12  col-sm-12 col-xs-12 mt20 row">
                        <label class="col-md-6  col-sm-6 col-xs-12">
                            <input type="checkbox" name="panels" class="">
                        </label>

                    </label>

                </label><!--col-md-8-->

                <label class="col-md-5 col-sm-6 col-xs-12 post-add-box-form-font mt20">Parcheggio</label>
                <label class="col-md-1 col-sm-6 col-xs-12">
                    <label class="col-md-12  col-sm-12 col-xs-12 mt20 row">
                        <label class="col-md-6  col-sm-6 col-xs-12">
                            <input type="checkbox" name="parking" class="">
                        </label>

                    </label>

                </label><!--col-md-8-->

                <label class="col-md-5 col-sm-6 col-xs-12 post-add-box-form-font mt20">Parete di Vetro</label>
                <label class="col-md-1 col-sm-6 col-xs-12">
                    <label class="col-md-12  col-sm-12 col-xs-12 mt20 row">
                        <label class="col-md-6  col-sm-6 col-xs-12">
                            <input type="checkbox" name="glass_wall" class="">
                        </label>

                    </label>

                </label><!--col-md-8-->

                <label class="col-md-5 col-sm-6 col-xs-12 post-add-box-form-font mt20">Pietra</label>
                <label class="col-md-1 col-sm-6 col-xs-12">
                    <label class="col-md-12  col-sm-12 col-xs-12 mt20 row">
                        <label class="col-md-6  col-sm-6 col-xs-12">
                            <input type="checkbox" name="stone" class="">
                        </label>

                    </label>

                </label><!--col-md-8-->

                <label class="col-md-5 col-sm-6 col-xs-12 post-add-box-form-font mt20">Piscina</label>
                <label class="col-md-1 col-sm-6 col-xs-12">
                    <label class="col-md-12  col-sm-12 col-xs-12 mt20 row">
                        <label class="col-md-6  col-sm-6 col-xs-12">
                            <input type="checkbox" name="pool" class="">
                        </label>

                    </label>

                </label><!--col-md-8-->

                <label class="col-md-5 col-sm-6 col-xs-12 post-add-box-form-font mt20">Posto Auto</label>
                <label class="col-md-1 col-sm-6 col-xs-12">
                    <label class="col-md-12  col-sm-12 col-xs-12 mt20 row">
                        <label class="col-md-6  col-sm-6 col-xs-12">
                            <input type="checkbox" name="parking_space" class="">
                        </label>

                    </label>

                </label><!--col-md-8-->

                <label class="col-md-5 col-sm-6 col-xs-12 post-add-box-form-font mt20">Pozzo Nero</label>
                <label class="col-md-1 col-sm-6 col-xs-12">
                    <label class="col-md-12  col-sm-12 col-xs-12 mt20 row">
                        <label class="col-md-6  col-sm-6 col-xs-12">
                            <input type="checkbox" name="cesspool" class="">
                        </label>

                    </label>

                </label><!--col-md-8-->

                <label class="col-md-5 col-sm-6 col-xs-12 post-add-box-form-font mt20">Prefabbricato</label>
                <label class="col-md-1 col-sm-6 col-xs-12">
                    <label class="col-md-12  col-sm-12 col-xs-12 mt20 row">
                        <label class="col-md-6  col-sm-6 col-xs-12">
                            <input type="checkbox" name="prefabricated" class="">
                        </label>

                    </label>

                </label><!--col-md-8-->

                <label class="col-md-5 col-sm-6 col-xs-12 post-add-box-form-font mt20">Ripostiglio</label>
                <label class="col-md-1 col-sm-6 col-xs-12">
                    <label class="col-md-12  col-sm-12 col-xs-12 mt20 row">
                        <label class="col-md-6  col-sm-6 col-xs-12">
                            <input type="checkbox" name="closet" class="">
                        </label>

                    </label>

                </label><!--col-md-8-->

                <label class="col-md-5 col-sm-6 col-xs-12 post-add-box-form-font mt20">Ripostiglio indipendente</label>
                <label class="col-md-1 col-sm-6 col-xs-12">
                    <label class="col-md-12  col-sm-12 col-xs-12 mt20 row">
                        <label class="col-md-6  col-sm-6 col-xs-12">
                            <input type="checkbox" name="independent_closet" class="">
                        </label>

                    </label>

                </label><!--col-md-8-->

                <label class="col-md-5 col-sm-6 col-xs-12 post-add-box-form-font mt20">Rivestimento in legno</label>
                <label class="col-md-1 col-sm-6 col-xs-12">
                    <label class="col-md-12  col-sm-12 col-xs-12 mt20 row">
                        <label class="col-md-6  col-sm-6 col-xs-12">
                            <input type="checkbox" name="wood_coating" class="">
                        </label>

                    </label>

                </label><!--col-md-8-->

                <label class="col-md-5 col-sm-6 col-xs-12 post-add-box-form-font mt20">Struttura in costruzione</label>
                <label class="col-md-1 col-sm-6 col-xs-12">
                    <label class="col-md-12  col-sm-12 col-xs-12 mt20 row">
                        <label class="col-md-6  col-sm-6 col-xs-12">
                            <input type="checkbox" name="structure_under_construction" class="">
                        </label>

                    </label>

                </label><!--col-md-8-->

                <label class="col-md-5 col-sm-6 col-xs-12 post-add-box-form-font mt20">Stucco</label>
                <label class="col-md-1 col-sm-6 col-xs-12">
                    <label class="col-md-12  col-sm-12 col-xs-12 mt20 row">
                        <label class="col-md-6  col-sm-6 col-xs-12">
                            <input type="checkbox" name="putty" class="">
                        </label>

                    </label>

                </label><!--col-md-8-->

                <label class="col-md-5 col-sm-6 col-xs-12 post-add-box-form-font mt20">Terrazza/Veranda</label>
                <label class="col-md-1 col-sm-6 col-xs-12">
                    <label class="col-md-12  col-sm-12 col-xs-12 mt20 row">
                        <label class="col-md-6  col-sm-6 col-xs-12">
                            <input type="checkbox" name="patio_deck" class="">
                        </label>

                    </label>

                </label><!--col-md-8-->

                <label class="col-md-5 col-sm-6 col-xs-12 post-add-box-form-font mt20">Tetto Piatto</label>
                <label class="col-md-1 col-sm-6 col-xs-12">
                    <label class="col-md-12  col-sm-12 col-xs-12 mt20 row">
                        <label class="col-md-6  col-sm-6 col-xs-12">
                            <input type="checkbox" name="flat_roof" class="">
                        </label>

                    </label>

                </label><!--col-md-8-->

            </div>

            <div class="col-md-12 col-sm-12 col-xs-12"><span class="blackhead"><br>Caratteristiche Generali</span></div><!--col-md-12-->
            <div class="col-md-12 col-sm-12 col-xs-12">

                <label class="col-md-5 col-sm-6 col-xs-12 post-add-box-form-font mt20">Al grezzo</label>
                <label class="col-md-1 col-sm-6 col-xs-12">
                    <label class="col-md-12  col-sm-12 col-xs-12 mt20 row">
                        <label class="col-md-6  col-sm-6 col-xs-12">
                            <input type="checkbox" name="unfinished" class="">
                        </label>

                    </label>

                </label><!--col-md-8-->

                <label class="col-md-5 col-sm-6 col-xs-12 post-add-box-form-font mt20">Ascensore/Montacarichi</label>
                <label class="col-md-1 col-sm-6 col-xs-12">
                    <label class="col-md-12  col-sm-12 col-xs-12 mt20 row">
                        <label class="col-md-6  col-sm-6 col-xs-12">
                            <input type="checkbox" name="lift_elevator" class="">
                        </label>

                    </label>

                </label><!--col-md-8-->

                <label class="col-md-5 col-sm-6 col-xs-12 post-add-box-form-font mt20">Esterno Riadattato</label>
                <label class="col-md-1 col-sm-6 col-xs-12">
                    <label class="col-md-12  col-sm-12 col-xs-12 mt20 row">
                        <label class="col-md-6  col-sm-6 col-xs-12">
                            <input type="checkbox" name="redeveloped" class="">
                        </label>

                    </label>

                </label><!--col-md-8-->

                <label class="col-md-5 col-sm-6 col-xs-12 post-add-box-form-font mt20">Piscina all'aperto</label>
                <label class="col-md-1 col-sm-6 col-xs-12">
                    <label class="col-md-12  col-sm-12 col-xs-12 mt20 row">
                        <label class="col-md-6  col-sm-6 col-xs-12">
                            <input type="checkbox" name="outdoor_pool" class="">
                        </label>

                    </label>

                </label><!--col-md-8-->

                <label class="col-md-5 col-sm-6 col-xs-12 post-add-box-form-font mt20">Piscina coperta</label>
                <label class="col-md-1 col-sm-6 col-xs-12">
                    <label class="col-md-12  col-sm-12 col-xs-12 mt20 row">
                        <label class="col-md-6  col-sm-6 col-xs-12">
                            <input type="checkbox" name="indoor_pool" class="">
                        </label>

                    </label>

                </label><!--col-md-8-->

                <label class="col-md-5 col-sm-6 col-xs-12 post-add-box-form-font mt20">Portineria</label>
                <label class="col-md-1 col-sm-6 col-xs-12">
                    <label class="col-md-12  col-sm-12 col-xs-12 mt20 row">
                        <label class="col-md-6  col-sm-6 col-xs-12">
                            <input type="checkbox" name="reception" class="">
                        </label>

                    </label>

                </label><!--col-md-8-->

                <label class="col-md-5 col-sm-6 col-xs-12 post-add-box-form-font mt20">Primo proprietario</label>
                <label class="col-md-1 col-sm-6 col-xs-12">
                    <label class="col-md-12  col-sm-12 col-xs-12 mt20 row">
                        <label class="col-md-6  col-sm-6 col-xs-12">
                            <input type="checkbox" name="first_owner" class="">
                        </label>

                    </label>

                </label><!--col-md-8-->

                <label class="col-md-5 col-sm-6 col-xs-12 post-add-box-form-font mt20">Ristrutturazione necessaria</label>
                <label class="col-md-1 col-sm-6 col-xs-12">
                    <label class="col-md-12  col-sm-12 col-xs-12 mt20 row">
                        <label class="col-md-6  col-sm-6 col-xs-12">
                            <input type="checkbox" name="needs_redevelopment" class="">
                        </label>

                    </label>

                </label><!--col-md-8-->

                <label class="col-md-5 col-sm-6 col-xs-12 post-add-box-form-font mt20">Servizio di sorveglianza</label>
                <label class="col-md-1 col-sm-6 col-xs-12">
                    <label class="col-md-12  col-sm-12 col-xs-12 mt20 row">
                        <label class="col-md-6  col-sm-6 col-xs-12">
                            <input type="checkbox" name="security_service" class="">
                        </label>

                    </label>

                </label><!--col-md-8-->

            </div>

            <div class="col-md-12 col-sm-12 col-xs-12"><span class="blackhead"><br>Caratteristiche Interne</span></div><!--col-md-12-->
            <div class="col-md-12 col-sm-12 col-xs-12">

                <label class="col-md-5 col-sm-6 col-xs-12 post-add-box-form-font mt20">Affreschi</label>
                <label class="col-md-1 col-sm-6 col-xs-12">
                    <label class="col-md-12  col-sm-12 col-xs-12 mt20 row">
                        <label class="col-md-6  col-sm-6 col-xs-12">
                            <input type="checkbox" name="frescoes" class="">
                        </label>

                    </label>

                </label><!--col-md-8-->

                <label class="col-md-5 col-sm-6 col-xs-12 post-add-box-form-font mt20">Ampio ingresso</label>
                <label class="col-md-1 col-sm-6 col-xs-12">
                    <label class="col-md-12  col-sm-12 col-xs-12 mt20 row">
                        <label class="col-md-6  col-sm-6 col-xs-12">
                            <input type="checkbox" name="large_hall" class="">
                        </label>

                    </label>

                </label><!--col-md-8-->

                <label class="col-md-5 col-sm-6 col-xs-12 post-add-box-form-font mt20">Ampio ripostiglio</label>
                <label class="col-md-1 col-sm-6 col-xs-12">
                    <label class="col-md-12  col-sm-12 col-xs-12 mt20 row">
                        <label class="col-md-6  col-sm-6 col-xs-12">
                            <input type="checkbox" name="large_closet" class="">
                        </label>

                    </label>

                </label><!--col-md-8-->

                <label class="col-md-5 col-sm-6 col-xs-12 post-add-box-form-font mt20">Angolo cottura</label>
                <label class="col-md-1 col-sm-6 col-xs-12">
                    <label class="col-md-12  col-sm-12 col-xs-12 mt20 row">
                        <label class="col-md-6  col-sm-6 col-xs-12">
                            <input type="checkbox" name="kitchenette" class="">
                        </label>

                    </label>

                </label><!--col-md-8-->

                <label class="col-md-5 col-sm-6 col-xs-12 post-add-box-form-font mt20">Aria condizionata</label>
                <label class="col-md-1 col-sm-6 col-xs-12">
                    <label class="col-md-12  col-sm-12 col-xs-12 mt20 row">
                        <label class="col-md-6  col-sm-6 col-xs-12">
                            <input type="checkbox" name="conditioned_air" class="">
                        </label>

                    </label>

                </label><!--col-md-8-->

                <label class="col-md-5 col-sm-6 col-xs-12 post-add-box-form-font mt20">Aria condizionata centralizzata</label>
                <label class="col-md-1 col-sm-6 col-xs-12">
                    <label class="col-md-12  col-sm-12 col-xs-12 mt20 row">
                        <label class="col-md-6  col-sm-6 col-xs-12">
                            <input type="checkbox" name="central_air_conditioned" class="">
                        </label>

                    </label>

                </label><!--col-md-8-->

                <label class="col-md-5 col-sm-6 col-xs-12 post-add-box-form-font mt20">Camera indipendente</label>
                <label class="col-md-1 col-sm-6 col-xs-12">
                    <label class="col-md-12  col-sm-12 col-xs-12 mt20 row">
                        <label class="col-md-6  col-sm-6 col-xs-12">
                            <input type="checkbox" name="independent_room" class="">
                        </label>

                    </label>

                </label><!--col-md-8-->

                <label class="col-md-5 col-sm-6 col-xs-12 post-add-box-form-font mt20">Caminetto</label>
                <label class="col-md-1 col-sm-6 col-xs-12">
                    <label class="col-md-12  col-sm-12 col-xs-12 mt20 row">
                        <label class="col-md-6  col-sm-6 col-xs-12">
                            <input type="checkbox" name="fireplace" class="">
                        </label>

                    </label>

                </label><!--col-md-8-->

                <label class="col-md-5 col-sm-6 col-xs-12 post-add-box-form-font mt20">Cucina abitabile</label>
                <label class="col-md-1 col-sm-6 col-xs-12">
                    <label class="col-md-12  col-sm-12 col-xs-12 mt20 row">
                        <label class="col-md-6  col-sm-6 col-xs-12">
                            <input type="checkbox" name="livable_kitchen" class="">
                        </label>

                    </label>

                </label><!--col-md-8-->

                <label class="col-md-5 col-sm-6 col-xs-12 post-add-box-form-font mt20">Cucina abitabile/Tinello</label>
                <label class="col-md-1 col-sm-6 col-xs-12">
                    <label class="col-md-12  col-sm-12 col-xs-12 mt20 row">
                        <label class="col-md-6  col-sm-6 col-xs-12">
                            <input type="checkbox" name="livable_kitchen_den" class="">
                        </label>

                    </label>

                </label><!--col-md-8-->

                <label class="col-md-5 col-sm-6 col-xs-12 post-add-box-form-font mt20">Cucina piastrellata</label>
                <label class="col-md-1 col-sm-6 col-xs-12">
                    <label class="col-md-12  col-sm-12 col-xs-12 mt20 row">
                        <label class="col-md-6  col-sm-6 col-xs-12">
                            <input type="checkbox" name="tiled_kitchen" class="">
                        </label>

                    </label>

                </label><!--col-md-8-->

                <label class="col-md-5 col-sm-6 col-xs-12 post-add-box-form-font mt20">Cucina/Cucinotto</label>
                <label class="col-md-1 col-sm-6 col-xs-12">
                    <label class="col-md-12  col-sm-12 col-xs-12 mt20 row">
                        <label class="col-md-6  col-sm-6 col-xs-12">
                            <input type="checkbox" name="kitchen_kitchenette" class="">
                        </label>

                    </label>

                </label><!--col-md-8-->

                <label class="col-md-5 col-sm-6 col-xs-12 post-add-box-form-font mt20">Finestre circolari</label>
                <label class="col-md-1 col-sm-6 col-xs-12">
                    <label class="col-md-12  col-sm-12 col-xs-12 mt20 row">
                        <label class="col-md-6  col-sm-6 col-xs-12">
                            <input type="checkbox" name="circular_windows" class="">
                        </label>

                    </label>

                </label><!--col-md-8-->

                <label class="col-md-5 col-sm-6 col-xs-12 post-add-box-form-font mt20">Interni in cartongesso</label>
                <label class="col-md-1 col-sm-6 col-xs-12">
                    <label class="col-md-12  col-sm-12 col-xs-12 mt20 row">
                        <label class="col-md-6  col-sm-6 col-xs-12">
                            <input type="checkbox" name="internal_plasterboard" class="">
                        </label>

                    </label>

                </label><!--col-md-8-->

                <label class="col-md-5 col-sm-6 col-xs-12 post-add-box-form-font mt20">Lavanderia condominiale</label>
                <label class="col-md-1 col-sm-6 col-xs-12">
                    <label class="col-md-12  col-sm-12 col-xs-12 mt20 row">
                        <label class="col-md-6  col-sm-6 col-xs-12">
                            <input type="checkbox" name="washing_facilities" class="">
                        </label>

                    </label>

                </label><!--col-md-8-->

                <label class="col-md-5 col-sm-6 col-xs-12 post-add-box-form-font mt20">Locale Lavanderia</label>
                <label class="col-md-1 col-sm-6 col-xs-12">
                    <label class="col-md-12  col-sm-12 col-xs-12 mt20 row">
                        <label class="col-md-6  col-sm-6 col-xs-12">
                            <input type="checkbox" name="laundry_room" class="">
                        </label>

                    </label>

                </label><!--col-md-8-->

                <label class="col-md-5 col-sm-6 col-xs-12 post-add-box-form-font mt20">Pavimenti in cotto</label>
                <label class="col-md-1 col-sm-6 col-xs-12">
                    <label class="col-md-12  col-sm-12 col-xs-12 mt20 row">
                        <label class="col-md-6  col-sm-6 col-xs-12">
                            <input type="checkbox" name="tiled_floors" class="">
                        </label>

                    </label>

                </label><!--col-md-8-->

                <label class="col-md-5 col-sm-6 col-xs-12 post-add-box-form-font mt20">Pavimento in Parquet</label>
                <label class="col-md-1 col-sm-6 col-xs-12">
                    <label class="col-md-12  col-sm-12 col-xs-12 mt20 row">
                        <label class="col-md-6  col-sm-6 col-xs-12">
                            <input type="checkbox" name="parquet_floor" class="">
                        </label>

                    </label>

                </label><!--col-md-8-->

                <label class="col-md-5 col-sm-6 col-xs-12 post-add-box-form-font mt20">Riscaldamento a Pavimento</label>
                <label class="col-md-1 col-sm-6 col-xs-12">
                    <label class="col-md-12  col-sm-12 col-xs-12 mt20 row">
                        <label class="col-md-6  col-sm-6 col-xs-12">
                            <input type="checkbox" name="underfloor_heating" class="">
                        </label>

                    </label>

                </label><!--col-md-8-->

                <label class="col-md-5 col-sm-6 col-xs-12 post-add-box-form-font mt20">Stufa a Gas</label>
                <label class="col-md-1 col-sm-6 col-xs-12">
                    <label class="col-md-12  col-sm-12 col-xs-12 mt20 row">
                        <label class="col-md-6  col-sm-6 col-xs-12">
                            <input type="checkbox" name="gas_stove" class="">
                        </label>

                    </label>

                </label><!--col-md-8-->

            </div>

            <div class="col-md-12 col-sm-12 col-xs-12"><span class="blackhead"><br>Posizione immobile</span></div><!--col-md-12-->
            <div class="col-md-12 col-sm-12 col-xs-12">

                <label class="col-md-5 col-sm-6 col-xs-12 post-add-box-form-font mt20">Accessibile da imbarcazione</label>
                <label class="col-md-1 col-sm-6 col-xs-12">
                    <label class="col-md-12  col-sm-12 col-xs-12 mt20 row">
                        <label class="col-md-6  col-sm-6 col-xs-12">
                            <input type="checkbox" name="accessible_by_boat" class="">
                        </label>

                    </label>

                </label><!--col-md-8-->

                <label class="col-md-5 col-sm-6 col-xs-12 post-add-box-form-font mt20">Centro citt&aacute;</label>
                <label class="col-md-1 col-sm-6 col-xs-12">
                    <label class="col-md-12  col-sm-12 col-xs-12 mt20 row">
                        <label class="col-md-6  col-sm-6 col-xs-12">
                            <input type="checkbox" name="town_center" class="">
                        </label>

                    </label>

                </label><!--col-md-8-->

                <label class="col-md-5 col-sm-6 col-xs-12 post-add-box-form-font mt20">Centro d'affari</label>
                <label class="col-md-1 col-sm-6 col-xs-12">
                    <label class="col-md-12  col-sm-12 col-xs-12 mt20 row">
                        <label class="col-md-6  col-sm-6 col-xs-12">
                            <input type="checkbox" name="business_center" class="">
                        </label>

                    </label>

                </label><!--col-md-8-->

                <label class="col-md-5 col-sm-6 col-xs-12 post-add-box-form-font mt20">Centro storico</label>
                <label class="col-md-1 col-sm-6 col-xs-12">
                    <label class="col-md-12  col-sm-12 col-xs-12 mt20 row">
                        <label class="col-md-6  col-sm-6 col-xs-12">
                            <input type="checkbox" name="old_town" class="">
                        </label>

                    </label>

                </label><!--col-md-8-->

                <label class="col-md-5 col-sm-6 col-xs-12 post-add-box-form-font mt20">Circondato da spiagge</label>
                <label class="col-md-1 col-sm-6 col-xs-12">
                    <label class="col-md-12  col-sm-12 col-xs-12 mt20 row">
                        <label class="col-md-6  col-sm-6 col-xs-12">
                            <input type="checkbox" name="surrounded_by_beaches" class="">
                        </label>

                    </label>

                </label><!--col-md-8-->

                <label class="col-md-5 col-sm-6 col-xs-12 post-add-box-form-font mt20">Facilmente raggiungibile in auto</label>
                <label class="col-md-1 col-sm-6 col-xs-12">
                    <label class="col-md-12  col-sm-12 col-xs-12 mt20 row">
                        <label class="col-md-6  col-sm-6 col-xs-12">
                            <input type="checkbox" name="easily_accessible_by_car" class="">
                        </label>

                    </label>

                </label><!--col-md-8-->

                <label class="col-md-5 col-sm-6 col-xs-12 post-add-box-form-font mt20">Fronte laguna</label>
                <label class="col-md-1 col-sm-6 col-xs-12">
                    <label class="col-md-12  col-sm-12 col-xs-12 mt20 row">
                        <label class="col-md-6  col-sm-6 col-xs-12">
                            <input type="checkbox" name="lagoon_front" class="">
                        </label>

                    </label>

                </label><!--col-md-8-->

                <label class="col-md-5 col-sm-6 col-xs-12 post-add-box-form-font mt20">In campagna</label>
                <label class="col-md-1 col-sm-6 col-xs-12">
                    <label class="col-md-12  col-sm-12 col-xs-12 mt20 row">
                        <label class="col-md-6  col-sm-6 col-xs-12">
                            <input type="checkbox" name="country_side" class="">
                        </label>

                    </label>

                </label><!--col-md-8-->

                <label class="col-md-5 col-sm-6 col-xs-12 post-add-box-form-font mt20">Insediamento</label>
                <label class="col-md-1 col-sm-6 col-xs-12">
                    <label class="col-md-12  col-sm-12 col-xs-12 mt20 row">
                        <label class="col-md-6  col-sm-6 col-xs-12">
                            <input type="checkbox" name="settlement" class="">
                        </label>

                    </label>

                </label><!--col-md-8-->

                <label class="col-md-5 col-sm-6 col-xs-12 post-add-box-form-font mt20">Isolato</label>
                <label class="col-md-1 col-sm-6 col-xs-12">
                    <label class="col-md-12  col-sm-12 col-xs-12 mt20 row">
                        <label class="col-md-6  col-sm-6 col-xs-12">
                            <input type="checkbox" name="isolated" class="">
                        </label>

                    </label>

                </label><!--col-md-8-->

                <label class="col-md-5 col-sm-6 col-xs-12 post-add-box-form-font mt20">Isolata/distante da insediamenti</label>
                <label class="col-md-1 col-sm-6 col-xs-12">
                    <label class="col-md-12  col-sm-12 col-xs-12 mt20 row">
                        <label class="col-md-6  col-sm-6 col-xs-12">
                            <input type="checkbox" name="isolated_far_from_settlements" class="">
                        </label>

                    </label>

                </label><!--col-md-8-->

                <label class="col-md-5 col-sm-6 col-xs-12 post-add-box-form-font mt20">Margine della foresta</label>
                <label class="col-md-1 col-sm-6 col-xs-12">
                    <label class="col-md-12  col-sm-12 col-xs-12 mt20 row">
                        <label class="col-md-6  col-sm-6 col-xs-12">
                            <input type="checkbox" name="forest_edge" class="">
                        </label>

                    </label>

                </label><!--col-md-8-->

                <label class="col-md-5 col-sm-6 col-xs-12 post-add-box-form-font mt20">Posizione isolata</label>
                <label class="col-md-1 col-sm-6 col-xs-12">
                    <label class="col-md-12  col-sm-12 col-xs-12 mt20 row">
                        <label class="col-md-6  col-sm-6 col-xs-12">
                            <input type="checkbox" name="isolated_location" class="">
                        </label>

                    </label>

                </label><!--col-md-8-->

                <label class="col-md-5 col-sm-6 col-xs-12 post-add-box-form-font mt20">Presso campo da golf</label>
                <label class="col-md-1 col-sm-6 col-xs-12">
                    <label class="col-md-12  col-sm-12 col-xs-12 mt20 row">
                        <label class="col-md-6  col-sm-6 col-xs-12">
                            <input type="checkbox" name="near_golf_course" class="">
                        </label>

                    </label>

                </label><!--col-md-8-->

                <label class="col-md-5 col-sm-6 col-xs-12 post-add-box-form-font mt20">Prima periferia</label>
                <label class="col-md-1 col-sm-6 col-xs-12">
                    <label class="col-md-12  col-sm-12 col-xs-12 mt20 row">
                        <label class="col-md-6  col-sm-6 col-xs-12">
                            <input type="checkbox" name="outskirts" class="">
                        </label>

                    </label>

                </label><!--col-md-8-->

                <label class="col-md-5 col-sm-6 col-xs-12 post-add-box-form-font mt20">Privato - Localit&aacute; riservata</label>
                <label class="col-md-1 col-sm-6 col-xs-12">
                    <label class="col-md-12  col-sm-12 col-xs-12 mt20 row">
                        <label class="col-md-6  col-sm-6 col-xs-12">
                            <input type="checkbox" name="private_location" class="">
                        </label>

                    </label>

                </label><!--col-md-8-->

                <label class="col-md-5 col-sm-6 col-xs-12 post-add-box-form-font mt20">Su strada tranquilla</label>
                <label class="col-md-1 col-sm-6 col-xs-12">
                    <label class="col-md-12  col-sm-12 col-xs-12 mt20 row">
                        <label class="col-md-6  col-sm-6 col-xs-12">
                            <input type="checkbox" name="quiet_street" class="">
                        </label>

                    </label>

                </label><!--col-md-8-->

                <label class="col-md-5 col-sm-6 col-xs-12 post-add-box-form-font mt20">Sul mare</label>
                <label class="col-md-1 col-sm-6 col-xs-12">
                    <label class="col-md-12  col-sm-12 col-xs-12 mt20 row">
                        <label class="col-md-6  col-sm-6 col-xs-12">
                            <input type="checkbox" name="on_the_sea" class="">
                        </label>

                    </label>

                </label><!--col-md-8-->

                <label class="col-md-5 col-sm-6 col-xs-12 post-add-box-form-font mt20">Sulla spiaggia</label>
                <label class="col-md-1 col-sm-6 col-xs-12">
                    <label class="col-md-12  col-sm-12 col-xs-12 mt20 row">
                        <label class="col-md-6  col-sm-6 col-xs-12">
                            <input type="checkbox" name="on_the_beach" class="">
                        </label>

                    </label>

                </label><!--col-md-8-->

                <label class="col-md-5 col-sm-6 col-xs-12 post-add-box-form-font mt20">Vicinanze Aereoporto</label>
                <label class="col-md-1 col-sm-6 col-xs-12">
                    <label class="col-md-12  col-sm-12 col-xs-12 mt20 row">
                        <label class="col-md-6  col-sm-6 col-xs-12">
                            <input type="checkbox" name="airport_nearby" class="">
                        </label>

                    </label>

                </label><!--col-md-8-->

                <label class="col-md-5 col-sm-6 col-xs-12 post-add-box-form-font mt20">Vicinanze Bosco</label>
                <label class="col-md-1 col-sm-6 col-xs-12">
                    <label class="col-md-12  col-sm-12 col-xs-12 mt20 row">
                        <label class="col-md-6  col-sm-6 col-xs-12">
                            <input type="checkbox" name="forest_nearby" class="">
                        </label>

                    </label>

                </label><!--col-md-8-->

                <label class="col-md-5 col-sm-6 col-xs-12 post-add-box-form-font mt20">Vicinanze Canale</label>
                <label class="col-md-1 col-sm-6 col-xs-12">
                    <label class="col-md-12  col-sm-12 col-xs-12 mt20 row">
                        <label class="col-md-6  col-sm-6 col-xs-12">
                            <input type="checkbox" name="channel_nearby" class="">
                        </label>

                    </label>

                </label><!--col-md-8-->

                <label class="col-md-5 col-sm-6 col-xs-12 post-add-box-form-font mt20">Vicinanze Centro Congressuale</label>
                <label class="col-md-1 col-sm-6 col-xs-12">
                    <label class="col-md-12  col-sm-12 col-xs-12 mt20 row">
                        <label class="col-md-6  col-sm-6 col-xs-12">
                            <input type="checkbox" name="near_congress_center" class="">
                        </label>

                    </label>

                </label><!--col-md-8-->

                <label class="col-md-5 col-sm-6 col-xs-12 post-add-box-form-font mt20">Vicinanze Chiesa</label>
                <label class="col-md-1 col-sm-6 col-xs-12">
                    <label class="col-md-12  col-sm-12 col-xs-12 mt20 row">
                        <label class="col-md-6  col-sm-6 col-xs-12">
                            <input type="checkbox" name="near_church" class="">
                        </label>

                    </label>

                </label><!--col-md-8-->

                <label class="col-md-5 col-sm-6 col-xs-12 post-add-box-form-font mt20">Vicinanze Fermata Autobus</label>
                <label class="col-md-1 col-sm-6 col-xs-12">
                    <label class="col-md-12  col-sm-12 col-xs-12 mt20 row">
                        <label class="col-md-6  col-sm-6 col-xs-12">
                            <input type="checkbox" name="near_bus" class="">
                        </label>

                    </label>

                </label><!--col-md-8-->

                <label class="col-md-5 col-sm-6 col-xs-12 post-add-box-form-font mt20">Vicinanze Fermata Scuolabus</label>
                <label class="col-md-1 col-sm-6 col-xs-12">
                    <label class="col-md-12  col-sm-12 col-xs-12 mt20 row">
                        <label class="col-md-6  col-sm-6 col-xs-12">
                            <input type="checkbox" name="school_bus_stop_nearby" class="">
                        </label>

                    </label>

                </label><!--col-md-8-->

                <label class="col-md-5 col-sm-6 col-xs-12 post-add-box-form-font mt20">Vicinanze Lago</label>
                <label class="col-md-1 col-sm-6 col-xs-12">
                    <label class="col-md-12  col-sm-12 col-xs-12 mt20 row">
                        <label class="col-md-6  col-sm-6 col-xs-12">
                            <input type="checkbox" name="near_lake" class="">
                        </label>

                    </label>

                </label><!--col-md-8-->

                <label class="col-md-5 col-sm-6 col-xs-12 post-add-box-form-font mt20">Vicinanze Mare</label>
                <label class="col-md-1 col-sm-6 col-xs-12">
                    <label class="col-md-12  col-sm-12 col-xs-12 mt20 row">
                        <label class="col-md-6  col-sm-6 col-xs-12">
                            <input type="checkbox" name="near_sea" class="">
                        </label>

                    </label>

                </label><!--col-md-8-->

                <label class="col-md-5 col-sm-6 col-xs-12 post-add-box-form-font mt20">Vicinanze Metropolitana</label>
                <label class="col-md-1 col-sm-6 col-xs-12">
                    <label class="col-md-12  col-sm-12 col-xs-12 mt20 row">
                        <label class="col-md-6  col-sm-6 col-xs-12">
                            <input type="checkbox" name="near_subway" class="">
                        </label>

                    </label>

                </label><!--col-md-8-->

                <label class="col-md-5 col-sm-6 col-xs-12 post-add-box-form-font mt20">Vicinanze Montagna/Impianti da Sci</label>
                <label class="col-md-1 col-sm-6 col-xs-12">
                    <label class="col-md-12  col-sm-12 col-xs-12 mt20 row">
                        <label class="col-md-6  col-sm-6 col-xs-12">
                            <input type="checkbox" name="near_mountain" class="">
                        </label>

                    </label>

                </label><!--col-md-8-->

                <label class="col-md-5 col-sm-6 col-xs-12 post-add-box-form-font mt20">Vicinanze Negozi</label>
                <label class="col-md-1 col-sm-6 col-xs-12">
                    <label class="col-md-12  col-sm-12 col-xs-12 mt20 row">
                        <label class="col-md-6  col-sm-6 col-xs-12">
                            <input type="checkbox" name="shops_nearby" class="">
                        </label>

                    </label>

                </label><!--col-md-8-->

                <label class="col-md-5 col-sm-6 col-xs-12 post-add-box-form-font mt20">Vicinanze Ospedale</label>
                <label class="col-md-1 col-sm-6 col-xs-12">
                    <label class="col-md-12  col-sm-12 col-xs-12 mt20 row">
                        <label class="col-md-6  col-sm-6 col-xs-12">
                            <input type="checkbox" name="near_hospital" class="">
                        </label>

                    </label>

                </label><!--col-md-8-->

                <label class="col-md-5 col-sm-6 col-xs-12 post-add-box-form-font mt20">Vicinanze Palestra/Centro Fitness</label>
                <label class="col-md-1 col-sm-6 col-xs-12">
                    <label class="col-md-12  col-sm-12 col-xs-12 mt20 row">
                        <label class="col-md-6  col-sm-6 col-xs-12">
                            <input type="checkbox" name="near_gym" class="">
                        </label>

                    </label>

                </label><!--col-md-8-->

                <label class="col-md-5 col-sm-6 col-xs-12 post-add-box-form-font mt20">Vicinanze Parco</label>
                <label class="col-md-1 col-sm-6 col-xs-12">
                    <label class="col-md-12  col-sm-12 col-xs-12 mt20 row">
                        <label class="col-md-6  col-sm-6 col-xs-12">
                            <input type="checkbox" name="near_park" class="">
                        </label>

                    </label>

                </label><!--col-md-8-->

                <label class="col-md-5 col-sm-6 col-xs-12 post-add-box-form-font mt20">Vicinanze Passeggiate</label>
                <label class="col-md-1 col-sm-6 col-xs-12">
                    <label class="col-md-12  col-sm-12 col-xs-12 mt20 row">
                        <label class="col-md-6  col-sm-6 col-xs-12">
                            <input type="checkbox" name="walking_nearby" class="">
                        </label>

                    </label>

                </label><!--col-md-8-->

                <label class="col-md-5 col-sm-6 col-xs-12 post-add-box-form-font mt20">Vicinanze Pineta</label>
                <label class="col-md-1 col-sm-6 col-xs-12">
                    <label class="col-md-12  col-sm-12 col-xs-12 mt20 row">
                        <label class="col-md-6  col-sm-6 col-xs-12">
                            <input type="checkbox" name="near_wood" class="">
                        </label>

                    </label>

                </label><!--col-md-8-->

                <label class="col-md-5 col-sm-6 col-xs-12 post-add-box-form-font mt20">Vicinanze Scuole</label>
                <label class="col-md-1 col-sm-6 col-xs-12">
                    <label class="col-md-12  col-sm-12 col-xs-12 mt20 row">
                        <label class="col-md-6  col-sm-6 col-xs-12">
                            <input type="checkbox" name="near_school" class="">
                        </label>

                    </label>

                </label><!--col-md-8-->

                <label class="col-md-5 col-sm-6 col-xs-12 post-add-box-form-font mt20">Vicinanze Spiaggia</label>
                <label class="col-md-1 col-sm-6 col-xs-12">
                    <label class="col-md-12  col-sm-12 col-xs-12 mt20 row">
                        <label class="col-md-6  col-sm-6 col-xs-12">
                            <input type="checkbox" name="near_beach" class="">
                        </label>

                    </label>

                </label><!--col-md-8-->

                <label class="col-md-5 col-sm-6 col-xs-12 post-add-box-form-font mt20">Vicinanze Stazione Ferroviaria</label>
                <label class="col-md-1 col-sm-6 col-xs-12">
                    <label class="col-md-12  col-sm-12 col-xs-12 mt20 row">
                        <label class="col-md-6  col-sm-6 col-xs-12">
                            <input type="checkbox" name="near_train_station" class="">
                        </label>

                    </label>

                </label><!--col-md-8-->

                <label class="col-md-5 col-sm-6 col-xs-12 post-add-box-form-font mt20">Vicinanze Tangenziale</label>
                <label class="col-md-1 col-sm-6 col-xs-12">
                    <label class="col-md-12  col-sm-12 col-xs-12 mt20 row">
                        <label class="col-md-6  col-sm-6 col-xs-12">
                            <input type="checkbox" name="near_tangential" class="">
                        </label>

                    </label>

                </label><!--col-md-8-->

                <label class="col-md-5 col-sm-6 col-xs-12 post-add-box-form-font mt20">Vista Canale</label>
                <label class="col-md-1 col-sm-6 col-xs-12">
                    <label class="col-md-12  col-sm-12 col-xs-12 mt20 row">
                        <label class="col-md-6  col-sm-6 col-xs-12">
                            <input type="checkbox" name="canal_view" class="">
                        </label>

                    </label>

                </label><!--col-md-8-->

                <label class="col-md-5 col-sm-6 col-xs-12 post-add-box-form-font mt20">Vista Lago</label>
                <label class="col-md-1 col-sm-6 col-xs-12">
                    <label class="col-md-12  col-sm-12 col-xs-12 mt20 row">
                        <label class="col-md-6  col-sm-6 col-xs-12">
                            <input type="checkbox" name="lake_view" class="">
                        </label>

                    </label>

                </label><!--col-md-8-->

                <label class="col-md-5 col-sm-6 col-xs-12 post-add-box-form-font mt20">Vista Mare</label>
                <label class="col-md-1 col-sm-6 col-xs-12">
                    <label class="col-md-12  col-sm-12 col-xs-12 mt20 row">
                        <label class="col-md-6  col-sm-6 col-xs-12">
                            <input type="checkbox" name="sea_view" class="">
                        </label>

                    </label>

                </label><!--col-md-8-->

                <label class="col-md-5 col-sm-6 col-xs-12 post-add-box-form-font mt20">Vista Montagne</label>
                <label class="col-md-1 col-sm-6 col-xs-12">
                    <label class="col-md-12  col-sm-12 col-xs-12 mt20 row">
                        <label class="col-md-6  col-sm-6 col-xs-12">
                            <input type="checkbox" name="mountain_view" class="">
                        </label>

                    </label>

                </label><!--col-md-8-->

                <label class="col-md-5 col-sm-6 col-xs-12 post-add-box-form-font mt20">Vista panoramica citt&aacute;</label>
                <label class="col-md-1 col-sm-6 col-xs-12">
                    <label class="col-md-12  col-sm-12 col-xs-12 mt20 row">
                        <label class="col-md-6  col-sm-6 col-xs-12">
                            <input type="checkbox" name="city_view" class="">
                        </label>

                    </label>

                </label><!--col-md-8-->

                <label class="col-md-5 col-sm-6 col-xs-12 post-add-box-form-font mt20">Vista panoramica natura</label>
                <label class="col-md-1 col-sm-6 col-xs-12">
                    <label class="col-md-12  col-sm-12 col-xs-12 mt20 row">
                        <label class="col-md-6  col-sm-6 col-xs-12">
                            <input type="checkbox" name="nature_view" class="">
                        </label>

                    </label>

                </label><!--col-md-8-->

                <label class="col-md-5 col-sm-6 col-xs-12 post-add-box-form-font mt20">Vista spiagge</label>
                <label class="col-md-1 col-sm-6 col-xs-12">
                    <label class="col-md-12  col-sm-12 col-xs-12 mt20 row">
                        <label class="col-md-6  col-sm-6 col-xs-12">
                            <input type="checkbox" name="beach_view" class="">
                        </label>

                    </label>

                </label><!--col-md-8-->

            </div>

            <div class="col-md-12 col-sm-12 col-xs-12"><span class="blackhead"><br>Esposizione immobile</span></div><!--col-md-12-->
            <div class="col-md-12 col-sm-12 col-xs-12">

                <label class="col-md-5 col-sm-6 col-xs-12 post-add-box-form-font mt20">Nord</label>
                <label class="col-md-1 col-sm-6 col-xs-12">
                    <label class="col-md-12  col-sm-12 col-xs-12 mt20 row">
                        <label class="col-md-6  col-sm-6 col-xs-12">
                            <input type="checkbox" name="nord" class="">
                        </label>

                    </label>

                </label><!--col-md-8-->

                <label class="col-md-5 col-sm-6 col-xs-12 post-add-box-form-font mt20">Nord-Est</label>
                <label class="col-md-1 col-sm-6 col-xs-12">
                    <label class="col-md-12  col-sm-12 col-xs-12 mt20 row">
                        <label class="col-md-6  col-sm-6 col-xs-12">
                            <input type="checkbox" name="nord_est" class="">
                        </label>

                    </label>

                </label><!--col-md-8-->

                <label class="col-md-5 col-sm-6 col-xs-12 post-add-box-form-font mt20">Est</label>
                <label class="col-md-1 col-sm-6 col-xs-12">
                    <label class="col-md-12  col-sm-12 col-xs-12 mt20 row">
                        <label class="col-md-6  col-sm-6 col-xs-12">
                            <input type="checkbox" name="est" class="">
                        </label>

                    </label>

                </label><!--col-md-8-->

                <label class="col-md-5 col-sm-6 col-xs-12 post-add-box-form-font mt20">Sud-Est</label>
                <label class="col-md-1 col-sm-6 col-xs-12">
                    <label class="col-md-12  col-sm-12 col-xs-12 mt20 row">
                        <label class="col-md-6  col-sm-6 col-xs-12">
                            <input type="checkbox" name="sud_est" class="">
                        </label>

                    </label>

                </label><!--col-md-8-->

                <label class="col-md-5 col-sm-6 col-xs-12 post-add-box-form-font mt20">Sud</label>
                <label class="col-md-1 col-sm-6 col-xs-12">
                    <label class="col-md-12  col-sm-12 col-xs-12 mt20 row">
                        <label class="col-md-6  col-sm-6 col-xs-12">
                            <input type="checkbox" name="sud" class="">
                        </label>

                    </label>

                </label><!--col-md-8-->

                <label class="col-md-5 col-sm-6 col-xs-12 post-add-box-form-font mt20">Sud-Ovest</label>
                <label class="col-md-1 col-sm-6 col-xs-12">
                    <label class="col-md-12  col-sm-12 col-xs-12 mt20 row">
                        <label class="col-md-6  col-sm-6 col-xs-12">
                            <input type="checkbox" name="sud_ovest" class="">
                        </label>

                    </label>

                </label><!--col-md-8-->

                <label class="col-md-5 col-sm-6 col-xs-12 post-add-box-form-font mt20">Ovest</label>
                <label class="col-md-1 col-sm-6 col-xs-12">
                    <label class="col-md-12  col-sm-12 col-xs-12 mt20 row">
                        <label class="col-md-6  col-sm-6 col-xs-12">
                            <input type="checkbox" name="ovest" class="">
                        </label>

                    </label>

                </label><!--col-md-8-->

                <label class="col-md-5 col-sm-6 col-xs-12 post-add-box-form-font mt20">Nord-Ovest</label>
                <label class="col-md-1 col-sm-6 col-xs-12">
                    <label class="col-md-12  col-sm-12 col-xs-12 mt20 row">
                        <label class="col-md-6  col-sm-6 col-xs-12">
                            <input type="checkbox" name="nord_ovest" class="">
                        </label>

                    </label>

                </label><!--col-md-8-->

            </div>

            <div class="col-md-12 col-sm-12 col-xs-12"><span class="blackhead"><br>Stile Architettonico</span></div><!--col-md-12-->
            <div class="col-md-12 col-sm-12 col-xs-12">

                <label class="col-md-5 col-sm-6 col-xs-12 post-add-box-form-font mt20">Antico</label>
                <label class="col-md-1 col-sm-6 col-xs-12">
                    <label class="col-md-12  col-sm-12 col-xs-12 mt20 row">
                        <label class="col-md-6  col-sm-6 col-xs-12">
                            <input type="checkbox" name="ancient" class="">
                        </label>

                    </label>

                </label><!--col-md-8-->

                <label class="col-md-5 col-sm-6 col-xs-12 post-add-box-form-font mt20">Art Deco</label>
                <label class="col-md-1 col-sm-6 col-xs-12">
                    <label class="col-md-12  col-sm-12 col-xs-12 mt20 row">
                        <label class="col-md-6  col-sm-6 col-xs-12">
                            <input type="checkbox" name="art_deco" class="">
                        </label>

                    </label>

                </label><!--col-md-8-->

                <label class="col-md-5 col-sm-6 col-xs-12 post-add-box-form-font mt20">Art Nouveau</label>
                <label class="col-md-1 col-sm-6 col-xs-12">
                    <label class="col-md-12  col-sm-12 col-xs-12 mt20 row">
                        <label class="col-md-6  col-sm-6 col-xs-12">
                            <input type="checkbox" name="art_nouveau" class="">
                        </label>

                    </label>

                </label><!--col-md-8-->

                <label class="col-md-5 col-sm-6 col-xs-12 post-add-box-form-font mt20">Barocco</label>
                <label class="col-md-1 col-sm-6 col-xs-12">
                    <label class="col-md-12  col-sm-12 col-xs-12 mt20 row">
                        <label class="col-md-6  col-sm-6 col-xs-12">
                            <input type="checkbox" name="barocco" class="">
                        </label>

                    </label>

                </label><!--col-md-8-->

                <label class="col-md-5 col-sm-6 col-xs-12 post-add-box-form-font mt20">Biedermeier</label>
                <label class="col-md-1 col-sm-6 col-xs-12">
                    <label class="col-md-12  col-sm-12 col-xs-12 mt20 row">
                        <label class="col-md-6  col-sm-6 col-xs-12">
                            <input type="checkbox" name="biedermeier" class="">
                        </label>

                    </label>

                </label><!--col-md-8-->

                <label class="col-md-5 col-sm-6 col-xs-12 post-add-box-form-font mt20">Britannico</label>
                <label class="col-md-1 col-sm-6 col-xs-12">
                    <label class="col-md-12  col-sm-12 col-xs-12 mt20 row">
                        <label class="col-md-6  col-sm-6 col-xs-12">
                            <input type="checkbox" name="british" class="">
                        </label>

                    </label>

                </label><!--col-md-8-->

                <label class="col-md-5 col-sm-6 col-xs-12 post-add-box-form-font mt20">Casa con locali nell'attico</label>
                <label class="col-md-1 col-sm-6 col-xs-12">
                    <label class="col-md-12  col-sm-12 col-xs-12 mt20 row">
                        <label class="col-md-6  col-sm-6 col-xs-12">
                            <input type="checkbox" name="attic_rooms" class="">
                        </label>

                    </label>

                </label><!--col-md-8-->

                <label class="col-md-5 col-sm-6 col-xs-12 post-add-box-form-font mt20">Casa secolare</label>
                <label class="col-md-1 col-sm-6 col-xs-12">
                    <label class="col-md-12  col-sm-12 col-xs-12 mt20 row">
                        <label class="col-md-6  col-sm-6 col-xs-12">
                            <input type="checkbox" name="century_home" class="">
                        </label>

                    </label>

                </label><!--col-md-8-->

                <label class="col-md-5 col-sm-6 col-xs-12 post-add-box-form-font mt20">Colonnato</label>
                <label class="col-md-1 col-sm-6 col-xs-12">
                    <label class="col-md-12  col-sm-12 col-xs-12 mt20 row">
                        <label class="col-md-6  col-sm-6 col-xs-12">
                            <input type="checkbox" name="colonnade" class="">
                        </label>

                    </label>

                </label><!--col-md-8-->

                <label class="col-md-5 col-sm-6 col-xs-12 post-add-box-form-font mt20">Contemporaneo</label>
                <label class="col-md-1 col-sm-6 col-xs-12">
                    <label class="col-md-12  col-sm-12 col-xs-12 mt20 row">
                        <label class="col-md-6  col-sm-6 col-xs-12">
                            <input type="checkbox" name="contemporary" class="">
                        </label>

                    </label>

                </label><!--col-md-8-->

                <label class="col-md-5 col-sm-6 col-xs-12 post-add-box-form-font mt20">Edoardiano</label>
                <label class="col-md-1 col-sm-6 col-xs-12">
                    <label class="col-md-12  col-sm-12 col-xs-12 mt20 row">
                        <label class="col-md-6  col-sm-6 col-xs-12">
                            <input type="checkbox" name="edwardian" class="">
                        </label>

                    </label>

                </label><!--col-md-8-->

                <label class="col-md-5 col-sm-6 col-xs-12 post-add-box-form-font mt20">Elisabettiano</label>
                <label class="col-md-1 col-sm-6 col-xs-12">
                    <label class="col-md-12  col-sm-12 col-xs-12 mt20 row">
                        <label class="col-md-6  col-sm-6 col-xs-12">
                            <input type="checkbox" name="elizabethan" class="">
                        </label>

                    </label>

                </label><!--col-md-8-->

                <label class="col-md-5 col-sm-6 col-xs-12 post-add-box-form-font mt20">Francese</label>
                <label class="col-md-1 col-sm-6 col-xs-12">
                    <label class="col-md-12  col-sm-12 col-xs-12 mt20 row">
                        <label class="col-md-6  col-sm-6 col-xs-12">
                            <input type="checkbox" name="french" class="">
                        </label>

                    </label>

                </label><!--col-md-8-->

                <label class="col-md-5 col-sm-6 col-xs-12 post-add-box-form-font mt20">Gotico</label>
                <label class="col-md-1 col-sm-6 col-xs-12">
                    <label class="col-md-12  col-sm-12 col-xs-12 mt20 row">
                        <label class="col-md-6  col-sm-6 col-xs-12">
                            <input type="checkbox" name="gothic" class="">
                        </label>

                    </label>

                </label><!--col-md-8-->

                <label class="col-md-5 col-sm-6 col-xs-12 post-add-box-form-font mt20">Inglese</label>
                <label class="col-md-1 col-sm-6 col-xs-12">
                    <label class="col-md-12  col-sm-12 col-xs-12 mt20 row">
                        <label class="col-md-6  col-sm-6 col-xs-12">
                            <input type="checkbox" name="english" class="">
                        </label>

                    </label>

                </label><!--col-md-8-->

                <label class="col-md-5 col-sm-6 col-xs-12 post-add-box-form-font mt20">Liberty</label>
                <label class="col-md-1 col-sm-6 col-xs-12">
                    <label class="col-md-12  col-sm-12 col-xs-12 mt20 row">
                        <label class="col-md-6  col-sm-6 col-xs-12">
                            <input type="checkbox" name="liberty" class="">
                        </label>

                    </label>

                </label><!--col-md-8-->

                <label class="col-md-5 col-sm-6 col-xs-12 post-add-box-form-font mt20">Mediterranea</label>
                <label class="col-md-1 col-sm-6 col-xs-12">
                    <label class="col-md-12  col-sm-12 col-xs-12 mt20 row">
                        <label class="col-md-6  col-sm-6 col-xs-12">
                            <input type="checkbox" name="mediterranean" class="">
                        </label>

                    </label>

                </label><!--col-md-8-->

                <label class="col-md-5 col-sm-6 col-xs-12 post-add-box-form-font mt20">Moderno</label>
                <label class="col-md-1 col-sm-6 col-xs-12">
                    <label class="col-md-12  col-sm-12 col-xs-12 mt20 row">
                        <label class="col-md-6  col-sm-6 col-xs-12">
                            <input type="checkbox" name="modern" class="">
                        </label>

                    </label>

                </label><!--col-md-8-->

                <label class="col-md-5 col-sm-6 col-xs-12 post-add-box-form-font mt20">Neoclassico</label>
                <label class="col-md-1 col-sm-6 col-xs-12">
                    <label class="col-md-12  col-sm-12 col-xs-12 mt20 row">
                        <label class="col-md-6  col-sm-6 col-xs-12">
                            <input type="checkbox" name="neoclassic" class="">
                        </label>

                    </label>

                </label><!--col-md-8-->

                <label class="col-md-5 col-sm-6 col-xs-12 post-add-box-form-font mt20">Protetto Belle Arti (Storico)</label>
                <label class="col-md-1 col-sm-6 col-xs-12">
                    <label class="col-md-12  col-sm-12 col-xs-12 mt20 row">
                        <label class="col-md-6  col-sm-6 col-xs-12">
                            <input type="checkbox" name="fine_arts" class="">
                        </label>

                    </label>

                </label><!--col-md-8-->

                <label class="col-md-5 col-sm-6 col-xs-12 post-add-box-form-font mt20">Regency</label>
                <label class="col-md-1 col-sm-6 col-xs-12">
                    <label class="col-md-12  col-sm-12 col-xs-12 mt20 row">
                        <label class="col-md-6  col-sm-6 col-xs-12">
                            <input type="checkbox" name="regency" class="">
                        </label>

                    </label>

                </label><!--col-md-8-->

                <label class="col-md-5 col-sm-6 col-xs-12 post-add-box-form-font mt20">Rinascimentale</label>
                <label class="col-md-1 col-sm-6 col-xs-12">
                    <label class="col-md-12  col-sm-12 col-xs-12 mt20 row">
                        <label class="col-md-6  col-sm-6 col-xs-12">
                            <input type="checkbox" name="renaissance" class="">
                        </label>

                    </label>

                </label><!--col-md-8-->

                <label class="col-md-5 col-sm-6 col-xs-12 post-add-box-form-font mt20">Romano</label>
                <label class="col-md-1 col-sm-6 col-xs-12">
                    <label class="col-md-12  col-sm-12 col-xs-12 mt20 row">
                        <label class="col-md-6  col-sm-6 col-xs-12">
                            <input type="checkbox" name="roman" class="">
                        </label>

                    </label>

                </label><!--col-md-8-->

                <label class="col-md-5 col-sm-6 col-xs-12 post-add-box-form-font mt20">Spagnolo</label>
                <label class="col-md-1 col-sm-6 col-xs-12">
                    <label class="col-md-12  col-sm-12 col-xs-12 mt20 row">
                        <label class="col-md-6  col-sm-6 col-xs-12">
                            <input type="checkbox" name="spanish" class="">
                        </label>

                    </label>

                </label><!--col-md-8-->

                <label class="col-md-5 col-sm-6 col-xs-12 post-add-box-form-font mt20">Stile 1200</label>
                <label class="col-md-1 col-sm-6 col-xs-12">
                    <label class="col-md-12  col-sm-12 col-xs-12 mt20 row">
                        <label class="col-md-6  col-sm-6 col-xs-12">
                            <input type="checkbox" name="style_1200" class="">
                        </label>

                    </label>

                </label><!--col-md-8-->

                <label class="col-md-5 col-sm-6 col-xs-12 post-add-box-form-font mt20">Stile 1300</label>
                <label class="col-md-1 col-sm-6 col-xs-12">
                    <label class="col-md-12  col-sm-12 col-xs-12 mt20 row">
                        <label class="col-md-6  col-sm-6 col-xs-12">
                            <input type="checkbox" name="style_1300" class="">
                        </label>

                    </label>

                </label><!--col-md-8-->

                <label class="col-md-5 col-sm-6 col-xs-12 post-add-box-form-font mt20">Stile 1400</label>
                <label class="col-md-1 col-sm-6 col-xs-12">
                    <label class="col-md-12  col-sm-12 col-xs-12 mt20 row">
                        <label class="col-md-6  col-sm-6 col-xs-12">
                            <input type="checkbox" name="style_1400" class="">
                        </label>

                    </label>

                </label><!--col-md-8-->

                <label class="col-md-5 col-sm-6 col-xs-12 post-add-box-form-font mt20">Stile 1500</label>
                <label class="col-md-1 col-sm-6 col-xs-12">
                    <label class="col-md-12  col-sm-12 col-xs-12 mt20 row">
                        <label class="col-md-6  col-sm-6 col-xs-12">
                            <input type="checkbox" name="style_1500" class="">
                        </label>

                    </label>

                </label><!--col-md-8-->

                <label class="col-md-5 col-sm-6 col-xs-12 post-add-box-form-font mt20">Stile 1600</label>
                <label class="col-md-1 col-sm-6 col-xs-12">
                    <label class="col-md-12  col-sm-12 col-xs-12 mt20 row">
                        <label class="col-md-6  col-sm-6 col-xs-12">
                            <input type="checkbox" name="style_1600" class="">
                        </label>

                    </label>

                </label><!--col-md-8-->

                <label class="col-md-5 col-sm-6 col-xs-12 post-add-box-form-font mt20">Stile 1700</label>
                <label class="col-md-1 col-sm-6 col-xs-12">
                    <label class="col-md-12  col-sm-12 col-xs-12 mt20 row">
                        <label class="col-md-6  col-sm-6 col-xs-12">
                            <input type="checkbox" name="style_1700" class="">
                        </label>

                    </label>

                </label><!--col-md-8-->

                <label class="col-md-5 col-sm-6 col-xs-12 post-add-box-form-font mt20">Stile 1800</label>
                <label class="col-md-1 col-sm-6 col-xs-12">
                    <label class="col-md-12  col-sm-12 col-xs-12 mt20 row">
                        <label class="col-md-6  col-sm-6 col-xs-12">
                            <input type="checkbox" name="style_1800" class="">
                        </label>

                    </label>

                </label><!--col-md-8-->

                <label class="col-md-5 col-sm-6 col-xs-12 post-add-box-form-font mt20">Stile anni 60-70</label>
                <label class="col-md-1 col-sm-6 col-xs-12">
                    <label class="col-md-12  col-sm-12 col-xs-12 mt20 row">
                        <label class="col-md-6  col-sm-6 col-xs-12">
                            <input type="checkbox" name="style_60_70" class="">
                        </label>

                    </label>

                </label><!--col-md-8-->

                <label class="col-md-5 col-sm-6 col-xs-12 post-add-box-form-font mt20">Stile Inizio 900</label>
                <label class="col-md-1 col-sm-6 col-xs-12">
                    <label class="col-md-12  col-sm-12 col-xs-12 mt20 row">
                        <label class="col-md-6  col-sm-6 col-xs-12">
                            <input type="checkbox" name="style_900" class="">
                        </label>

                    </label>

                </label><!--col-md-8-->

                <label class="col-md-5 col-sm-6 col-xs-12 post-add-box-form-font mt20">Tudor</label>
                <label class="col-md-1 col-sm-6 col-xs-12">
                    <label class="col-md-12  col-sm-12 col-xs-12 mt20 row">
                        <label class="col-md-6  col-sm-6 col-xs-12">
                            <input type="checkbox" name="tudor" class="">
                        </label>

                    </label>

                </label><!--col-md-8-->

                <label class="col-md-5 col-sm-6 col-xs-12 post-add-box-form-font mt20">Vittoriano</label>
                <label class="col-md-1 col-sm-6 col-xs-12">
                    <label class="col-md-12  col-sm-12 col-xs-12 mt20 row">
                        <label class="col-md-6  col-sm-6 col-xs-12">
                            <input type="checkbox" name="victorian" class="">
                        </label>

                    </label>

                </label><!--col-md-8-->

            </div>

            <div class="col-md-12 col-sm-12 col-xs-12"><span class="blackhead"><br>Servizi immobile</span></div><!--col-md-12-->
            <div class="col-md-12 col-sm-12 col-xs-12">

                <label class="col-md-5 col-sm-6 col-xs-12 post-add-box-form-font mt20">Acqua Corrente</label>
                <label class="col-md-1 col-sm-6 col-xs-12">
                    <label class="col-md-12  col-sm-12 col-xs-12 mt20 row">
                        <label class="col-md-6  col-sm-6 col-xs-12">
                            <input type="checkbox" name="running_water" class="">
                        </label>

                    </label>

                </label><!--col-md-8-->

                <label class="col-md-5 col-sm-6 col-xs-12 post-add-box-form-font mt20">Camino/Caminetto</label>
                <label class="col-md-1 col-sm-6 col-xs-12">
                    <label class="col-md-12  col-sm-12 col-xs-12 mt20 row">
                        <label class="col-md-6  col-sm-6 col-xs-12">
                            <input type="checkbox" name="fireplace_chimney" class="">
                        </label>

                    </label>

                </label><!--col-md-8-->

                <label class="col-md-5 col-sm-6 col-xs-12 post-add-box-form-font mt20">Cisterna d'Acqua</label>
                <label class="col-md-1 col-sm-6 col-xs-12">
                    <label class="col-md-12  col-sm-12 col-xs-12 mt20 row">
                        <label class="col-md-6  col-sm-6 col-xs-12">
                            <input type="checkbox" name="water_tank" class="">
                        </label>

                    </label>

                </label><!--col-md-8-->

                <label class="col-md-5 col-sm-6 col-xs-12 post-add-box-form-font mt20">Collettore - Solare</label>
                <label class="col-md-1 col-sm-6 col-xs-12">
                    <label class="col-md-12  col-sm-12 col-xs-12 mt20 row">
                        <label class="col-md-6  col-sm-6 col-xs-12">
                            <input type="checkbox" name="solar_collectors" class="">
                        </label>

                    </label>

                </label><!--col-md-8-->

                <label class="col-md-5 col-sm-6 col-xs-12 post-add-box-form-font mt20">Elettricit&aacute;</label>
                <label class="col-md-1 col-sm-6 col-xs-12">
                    <label class="col-md-12  col-sm-12 col-xs-12 mt20 row">
                        <label class="col-md-6  col-sm-6 col-xs-12">
                            <input type="checkbox" name="electricity" class="">
                        </label>

                    </label>

                </label><!--col-md-8-->

                <label class="col-md-5 col-sm-6 col-xs-12 post-add-box-form-font mt20">Energia geotermica</label>
                <label class="col-md-1 col-sm-6 col-xs-12">
                    <label class="col-md-12  col-sm-12 col-xs-12 mt20 row">
                        <label class="col-md-6  col-sm-6 col-xs-12">
                            <input type="checkbox" name="geothermal_energy" class="">
                        </label>

                    </label>

                </label><!--col-md-8-->

                <label class="col-md-5 col-sm-6 col-xs-12 post-add-box-form-font mt20">Fognature</label>
                <label class="col-md-1 col-sm-6 col-xs-12">
                    <label class="col-md-12  col-sm-12 col-xs-12 mt20 row">
                        <label class="col-md-6  col-sm-6 col-xs-12">
                            <input type="checkbox" name="sanitation" class="">
                        </label>

                    </label>

                </label><!--col-md-8-->

                <label class="col-md-5 col-sm-6 col-xs-12 post-add-box-form-font mt20">Fonte/Sorgente d'acqua propria</label>
                <label class="col-md-1 col-sm-6 col-xs-12">
                    <label class="col-md-12  col-sm-12 col-xs-12 mt20 row">
                        <label class="col-md-6  col-sm-6 col-xs-12">
                            <input type="checkbox" name="source_of_water" class="">
                        </label>

                    </label>

                </label><!--col-md-8-->

                <label class="col-md-5 col-sm-6 col-xs-12 post-add-box-form-font mt20">Gas</label>
                <label class="col-md-1 col-sm-6 col-xs-12">
                    <label class="col-md-12  col-sm-12 col-xs-12 mt20 row">
                        <label class="col-md-6  col-sm-6 col-xs-12">
                            <input type="checkbox" name="gas" class="">
                        </label>

                    </label>

                </label><!--col-md-8-->

                <label class="col-md-5 col-sm-6 col-xs-12 post-add-box-form-font mt20">Gas - GPL</label>
                <label class="col-md-1 col-sm-6 col-xs-12">
                    <label class="col-md-12  col-sm-12 col-xs-12 mt20 row">
                        <label class="col-md-6  col-sm-6 col-xs-12">
                            <input type="checkbox" name="gas_gpl" class="">
                        </label>

                    </label>

                </label><!--col-md-8-->

                <label class="col-md-5 col-sm-6 col-xs-12 post-add-box-form-font mt20">Gas - Metano</label>
                <label class="col-md-1 col-sm-6 col-xs-12">
                    <label class="col-md-12  col-sm-12 col-xs-12 mt20 row">
                        <label class="col-md-6  col-sm-6 col-xs-12">
                            <input type="checkbox" name="methane_gas" class="">
                        </label>

                    </label>

                </label><!--col-md-8-->

                <label class="col-md-5 col-sm-6 col-xs-12 post-add-box-form-font mt20">Gas - Naturale</label>
                <label class="col-md-1 col-sm-6 col-xs-12">
                    <label class="col-md-12  col-sm-12 col-xs-12 mt20 row">
                        <label class="col-md-6  col-sm-6 col-xs-12">
                            <input type="checkbox" name="natural_gas" class="">
                        </label>

                    </label>

                </label><!--col-md-8-->

                <label class="col-md-5 col-sm-6 col-xs-12 post-add-box-form-font mt20">Gruppo elettrogeno di continuit&aacute;</label>
                <label class="col-md-1 col-sm-6 col-xs-12">
                    <label class="col-md-12  col-sm-12 col-xs-12 mt20 row">
                        <label class="col-md-6  col-sm-6 col-xs-12">
                            <input type="checkbox" name="ups_generator" class="">
                        </label>

                    </label>

                </label><!--col-md-8-->

                <label class="col-md-5 col-sm-6 col-xs-12 post-add-box-form-font mt20">Linea ADSL</label>
                <label class="col-md-1 col-sm-6 col-xs-12">
                    <label class="col-md-12  col-sm-12 col-xs-12 mt20 row">
                        <label class="col-md-6  col-sm-6 col-xs-12">
                            <input type="checkbox" name="adsl_line" class="">
                        </label>

                    </label>

                </label><!--col-md-8-->

                <label class="col-md-5 col-sm-6 col-xs-12 post-add-box-form-font mt20">Pompa di calore</label>
                <label class="col-md-1 col-sm-6 col-xs-12">
                    <label class="col-md-12  col-sm-12 col-xs-12 mt20 row">
                        <label class="col-md-6  col-sm-6 col-xs-12">
                            <input type="checkbox" name="heat_pump" class="">
                        </label>

                    </label>

                </label><!--col-md-8-->

                <label class="col-md-5 col-sm-6 col-xs-12 post-add-box-form-font mt20">Predisposizione Camino</label>
                <label class="col-md-1 col-sm-6 col-xs-12">
                    <label class="col-md-12  col-sm-12 col-xs-12 mt20 row">
                        <label class="col-md-6  col-sm-6 col-xs-12">
                            <input type="checkbox" name="fireplace_predisposition" class="">
                        </label>

                    </label>

                </label><!--col-md-8-->

                <label class="col-md-5 col-sm-6 col-xs-12 post-add-box-form-font mt20">Rete Informatica</label>
                <label class="col-md-1 col-sm-6 col-xs-12">
                    <label class="col-md-12  col-sm-12 col-xs-12 mt20 row">
                        <label class="col-md-6  col-sm-6 col-xs-12">
                            <input type="checkbox" name="network_computing" class="">
                        </label>

                    </label>

                </label><!--col-md-8-->

                <label class="col-md-5 col-sm-6 col-xs-12 post-add-box-form-font mt20">Riscaldamento - Aria Calda</label>
                <label class="col-md-1 col-sm-6 col-xs-12">
                    <label class="col-md-12  col-sm-12 col-xs-12 mt20 row">
                        <label class="col-md-6  col-sm-6 col-xs-12">
                            <input type="checkbox" name="heating_hot_air" class="">
                        </label>

                    </label>

                </label><!--col-md-8-->

                <label class="col-md-5 col-sm-6 col-xs-12 post-add-box-form-font mt20">Riscaldamento - Assente</label>
                <label class="col-md-1 col-sm-6 col-xs-12">
                    <label class="col-md-12  col-sm-12 col-xs-12 mt20 row">
                        <label class="col-md-6  col-sm-6 col-xs-12">
                            <input type="checkbox" name="heating_none" class="">
                        </label>

                    </label>

                </label><!--col-md-8-->

                <label class="col-md-5 col-sm-6 col-xs-12 post-add-box-form-font mt20">Riscaldamento - Autonomo</label>
                <label class="col-md-1 col-sm-6 col-xs-12">
                    <label class="col-md-12  col-sm-12 col-xs-12 mt20 row">
                        <label class="col-md-6  col-sm-6 col-xs-12">
                            <input type="checkbox" name="autonomous_heating" class="">
                        </label>

                    </label>

                </label><!--col-md-8-->

                <label class="col-md-5 col-sm-6 col-xs-12 post-add-box-form-font mt20">Riscaldamento - Boiler Centrale</label>
                <label class="col-md-1 col-sm-6 col-xs-12">
                    <label class="col-md-12  col-sm-12 col-xs-12 mt20 row">
                        <label class="col-md-6  col-sm-6 col-xs-12">
                            <input type="checkbox" name="heating_central_boiler" class="">
                        </label>

                    </label>

                </label><!--col-md-8-->

                <label class="col-md-5 col-sm-6 col-xs-12 post-add-box-form-font mt20">Riscaldamento - Centralizzato</label>
                <label class="col-md-1 col-sm-6 col-xs-12">
                    <label class="col-md-12  col-sm-12 col-xs-12 mt20 row">
                        <label class="col-md-6  col-sm-6 col-xs-12">
                            <input type="checkbox" name="centralized_warming" class="">
                        </label>

                    </label>

                </label><!--col-md-8-->

                <label class="col-md-5 col-sm-6 col-xs-12 post-add-box-form-font mt20">Riscaldamento - Combustibile Solido</label>
                <label class="col-md-1 col-sm-6 col-xs-12">
                    <label class="col-md-12  col-sm-12 col-xs-12 mt20 row">
                        <label class="col-md-6  col-sm-6 col-xs-12">
                            <input type="checkbox" name="heating_solid_fuel" class="">
                        </label>

                    </label>

                </label><!--col-md-8-->

                <label class="col-md-5 col-sm-6 col-xs-12 post-add-box-form-font mt20">Riscaldamento - Elettrico</label>
                <label class="col-md-1 col-sm-6 col-xs-12">
                    <label class="col-md-12  col-sm-12 col-xs-12 mt20 row">
                        <label class="col-md-6  col-sm-6 col-xs-12">
                            <input type="checkbox" name="electric_heating" class="">
                        </label>

                    </label>

                </label><!--col-md-8-->

                <label class="col-md-5 col-sm-6 col-xs-12 post-add-box-form-font mt20">Riscaldamento - Gas GPL</label>
                <label class="col-md-1 col-sm-6 col-xs-12">
                    <label class="col-md-12  col-sm-12 col-xs-12 mt20 row">
                        <label class="col-md-6  col-sm-6 col-xs-12">
                            <input type="checkbox" name="heating_gas_gpl" class="">
                        </label>

                    </label>

                </label><!--col-md-8-->

                <label class="col-md-5 col-sm-6 col-xs-12 post-add-box-form-font mt20">Riscaldamento - Gasolio</label>
                <label class="col-md-1 col-sm-6 col-xs-12">
                    <label class="col-md-12  col-sm-12 col-xs-12 mt20 row">
                        <label class="col-md-6  col-sm-6 col-xs-12">
                            <input type="checkbox" name="heating_oil" class="">
                        </label>

                    </label>

                </label><!--col-md-8-->

                <label class="col-md-5 col-sm-6 col-xs-12 post-add-box-form-font mt20">Riscaldamento - Solare</label>
                <label class="col-md-1 col-sm-6 col-xs-12">
                    <label class="col-md-12  col-sm-12 col-xs-12 mt20 row">
                        <label class="col-md-6  col-sm-6 col-xs-12">
                            <input type="checkbox" name="heating_solar" class="">
                        </label>

                    </label>

                </label><!--col-md-8-->

                <label class="col-md-5 col-sm-6 col-xs-12 post-add-box-form-font mt20">Riscaldamento - Teleriscaldamento</label>
                <label class="col-md-1 col-sm-6 col-xs-12">
                    <label class="col-md-12  col-sm-12 col-xs-12 mt20 row">
                        <label class="col-md-6  col-sm-6 col-xs-12">
                            <input type="checkbox" name="heating_district_heating" class="">
                        </label>

                    </label>

                </label><!--col-md-8-->

                <label class="col-md-5 col-sm-6 col-xs-12 post-add-box-form-font mt20">Satellite</label>
                <label class="col-md-1 col-sm-6 col-xs-12">
                    <label class="col-md-12  col-sm-12 col-xs-12 mt20 row">
                        <label class="col-md-6  col-sm-6 col-xs-12">
                            <input type="checkbox" name="satellite" class="">
                        </label>

                    </label>

                </label><!--col-md-8-->

                <label class="col-md-5 col-sm-6 col-xs-12 post-add-box-form-font mt20">TV via cavo</label>
                <label class="col-md-1 col-sm-6 col-xs-12">
                    <label class="col-md-12  col-sm-12 col-xs-12 mt20 row">
                        <label class="col-md-6  col-sm-6 col-xs-12">
                            <input type="checkbox" name="cable_tv" class="">
                        </label>

                    </label>

                </label><!--col-md-8-->

                <label class="col-md-4 col-sm-6 col-xs-12 post-add-box-form-font">&nbsp;</label>

            </div>

        </div>
    </div><!--TAB end-->

    <div class="tab-pane" id="financial"><!--TAB begin-->
        <div class="col-md-9 col-sm-12 col-xs-12 mt5 row">
            <div class="col-md-12 col-sm-12 col-xs-12"><span class="blackhead"><br>Situazione finanziaria</span></div><!--col-md-12-->

            <div class="col-md-12 col-sm-12 col-xs-12 mt5 row">
                <div class="col-md-12 col-sm-12 col-xs-12"><span class="blackhead"><br>Mutuo</span></div><!--col-md-12-->
                <div class="col-md-12 col-sm-12 col-xs-12">

                    <label class="col-md-4 col-sm-6 col-xs-12 post-add-box-form-font mt20">Attuale</label>
                    <label class="col-md-8  col-sm-6 col-xs-12 mt20">
                        <label class="col-md-12  col-sm-12 col-xs-12">
                            <input type="text" name="actual_mortgage" class="post-add-form-control" placeholder="Inserisci mutuo attuale" value="">
                        </label>
                    </label>

                    <label class="col-md-4 col-sm-6 col-xs-12 post-add-box-form-font mt20">Differenza a saldo</label>
                    <label class="col-md-8  col-sm-6 col-xs-12 mt20">
                        <label class="col-md-12  col-sm-12 col-xs-12">
                            <input type="text" name="balance_difference" class="post-add-form-control" placeholder="Inserisci differenza a saldo" value="">
                        </label>
                    </label>

                    <label class="col-md-4 col-sm-6 col-xs-12 post-add-box-form-font mt20">Tipo</label>
                    <label class="col-md-8  col-sm-6 col-xs-12 mt20">
                        <label class="col-md-12 col-sm-12 col-xs-12">
                            <select name="rate_type" class="post-add-selectbox">
                                <option value="">Seleziona tipo</option>
                                <option value="fisso">Fisso</option>
                                <option value="misto">Misto</option>
                                <option value="variabile">Variabile</option>
                                <option value="variabile-con-opzione">Variabile con opzione</option>
                                <option value="variabile-con-rata-costante">Variabile con rata costante</option>
                                <option value="variabile-con-rimborso-flessibile">Variabile con rimborso flessibile</option>
                            </select>
                        </label>
                    </label>

                    <label class="col-md-4 col-sm-6 col-xs-12 post-add-box-form-font mt20">Residuo mutuo</label>
                    <label class="col-md-8  col-sm-6 col-xs-12 mt20">
                        <label class="col-md-12  col-sm-12 col-xs-12">
                            <input type="text" name="remain_loan" class="post-add-form-control" placeholder="Inserisci residuo mutuo" value="">
                        </label>
                    </label>

                    <label class="col-md-4 col-sm-6 col-xs-12 post-add-box-form-font mt20">Residuo anni</label>
                    <label class="col-md-8  col-sm-6 col-xs-12 mt20">
                        <label class="col-md-12  col-sm-12 col-xs-12">
                            <input type="text" name="remain_years" class="post-add-form-control" placeholder="Inserisci residuo anni" value="">
                        </label>
                    </label>

                    <label class="col-md-4 col-sm-6 col-xs-12 post-add-box-form-font mt20">Periodicit&aacute; rata</label>
                    <label class="col-md-8  col-sm-6 col-xs-12 mt20">
                        <label class="col-md-12 col-sm-12 col-xs-12">
                            <select name="periodicity_installment" class="post-add-selectbox">
                                <option value="">Seleziona tipo</option>
                                <option value="annuale">Annuale</option>
                                <option value="mensile">Mensile</option>
                                <option value="semestrale">Semestrale</option>
                                <option value="settimanale">Settimanale</option>
                            </select>
                        </label>
                    </label>

                    <label class="col-md-4 col-sm-6 col-xs-12 post-add-box-form-font mt20">Pagamento</label>
                    <label class="col-md-8  col-sm-6 col-xs-12 mt20">
                        <label class="col-md-12  col-sm-12 col-xs-12">
                            <input type="text" name="payment" class="post-add-form-control" placeholder="Inserisci pagamento" value="">
                        </label>
                    </label>

                    <label class="col-md-4 col-sm-6 col-xs-12 post-add-box-form-font mt20">Banca</label>
                    <label class="col-md-8  col-sm-6 col-xs-12 mt20">
                        <label class="col-md-12  col-sm-12 col-xs-12">
                            <input type="text" name="bank" class="post-add-form-control" placeholder="Inserisci banca" value="">
                        </label>
                    </label>

                    <label class="col-md-4 col-sm-6 col-xs-12 post-add-box-form-font">&nbsp;</label>

                </div>

            </div>
       </div>
    </div><!--TAB end-->

        <div class="tab-pane" id="pics"><!--TAB begin-->
            <div class="col-md-9 col-sm-12 col-xs-12 mt5 row">
                <div class="col-md-12 col-sm-12 col-xs-12">

                    <label class="col-md-4 col-sm-6 col-xs-12 post-add-box-form-font mt20">Video immobile</label>
                    <label class="col-md-8  col-sm-6 col-xs-12 mt20">
                        <label class="col-md-12  col-sm-12 col-xs-12">
                            <input type="text" name="video" class="post-add-form-control" placeholder="Inserisci url video YouTube" value="">
                        </label>
                    </label>

                    <label class="col-md-4 col-sm-6 col-xs-12 post-add-box-form-font mt20"><strong>Foto immobile</strong> <span class="post-add-box-form-font-redfont">*</span></label>
                    <label class="col-md-12 col-sm-12 col-xs-12 mt20 mb10">
                        <div class="file-area mb10">
                            <input type="file" name="file[]" required="required" multiple="multiple" id="fileUpload">
                            <div class="file-dummy">
                                <span class="success"><i class="fa fa-check fa-20x" aria-hidden="true"></i><br>Complimenti, Le foto sono state caricate con successo!</span>
                                <span class="default"><i class="fa fa-upload fa-20x" aria-hidden="true"></i><br>Seleziona o trascina delle foto da caricare.</span>
                            </div>
                        </div>
                        <div id="image-holder"></div>
                        <br><span>&bull; L'immagine deve essere grande almeno 500x350 pixel!</span><br><br><span>&bull; Puoi caricare fino a 25 immagini!</span>
                    </label>

                    <div class="col-md-12 col-sm-6 col-xs-12 mt20">
                        <input type="submit" name="p_ad" value="Salva immobile!" class="btn-post-add pull-right">
                    </div>

                </div>

            </div>
        </div><!--TAB end-->

</form>				 
				  

             </div><!--col-md-12 col-sm-12 col-xs-12 profile-brdr-->
         </div><!--col-md-9 col-sm-12 col-xs-12-->
    </div><!--row-->
</div> <!--container-->

<?
include "footer.php";
if(isset($_SESSION['ptper'])) {
	echo "<script>swal('Errore', 'Formato di immagine non riconosciuto, prova caricando una foto con formato jpg o png!', 'error');</script>";
	unset($_SESSION['ptper']);
}
else if(isset($_SESSION['szerr'])) {
	echo "<script>swal('Errore', 'L\'immagine deve essere grande almeno 500x350 pixel!', 'error');</script>";
	unset($_SESSION['szerr']);
}
else if(isset($_SESSION['ab5'])) {
	echo "<script>swal('Errore:', 'Non puoi caricare più di 25 immagini!', 'error');</script>";
	unset($_SESSION['ab5']);
}
?>