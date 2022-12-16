<?php

namespace App\Filament\Resources\RestaurantsResource\Pages;

use App\Filament\Resources\RestaurantsResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Database\Eloquent\Model;
use App\Models\Restaurants;
use DB;

class CreateRestaurants extends CreateRecord
{
    protected static string $resource = RestaurantsResource::class;
    protected function mutateFormDataBeforeCreate(array $data): array
{
    // dd($data);
    // $data['user_id'] = auth()->id();

     return $data;
}
//function is used to save record
protected function handleRecordCreation(array $data): Model
{
     $resturants = array();
     $resturants['title_en'] = $data['title_en'];
     $resturants['title_ar'] = $data['title_ar'];
     $resturants['price_en'] = $data['price_en'];
     $resturants['price_ar'] = $data['price_ar'];
     $resturants['new_in_town'] = $data['new_in_town'];
     $resturants['additional_price_en'] = $data['additional_price_en'];
     $resturants['additional_price_ar'] = $data['additional_price_ar'];
     $resturants['phone_country_code'] = $data['phone_country_code'];
     $resturants['phone'] = $data['phone'];
     $resturants['intsa_handle'] = $data['instagram_handle'];
     $resturants['res_description_en'] = $data['res_description_en'];
     $resturants['res_description_ar'] = $data['res_description_ar'];
     $resturants['meat_poultry_source_en'] = $data['meat_poultry_source_en'];
     $resturants['meat_poultry_source_ar'] = $data['meat_poultry_source_ar'];
     if($data['status'])
     $status = 'Active';
     else
     $status = 'Inactive';
     $resturants['status'] = $status;
     $result = Restaurants::create($resturants);
     if(isset($result->id)){
         $resturant_id = $result->id;
        //create a resturant cuisions
        if(isset($data['cusinies_id'])){
          $this->saveResturantCuision($resturant_id,$data['cusinies_id']);
        }
        //create a resturant categories
        if(isset($data['occassions'])){
            $this->saveResturantCategories($resturant_id,$data['occassions']);
         }
         //create a resturant locations
         if(isset($data['locations'])){
            $this->saveResturantLocations($resturant_id,$data['locations']);
         }
         //create a resturant food trucks
         if(isset($data['food_trucks'])){
            $this->saveResturantfoodTrucks($resturant_id,$data['food_trucks']);
         }
         //create a resturant Amenities
         if(isset($data['amenities'])){
            $this->saveResturantAmenities($resturant_id,$data['amenities']);
         }
         //create a resturant delivery options
         if(isset($data['amenities'])){
            $this->saveResturantDeliveryOptions($resturant_id,$data['delivery_options']);
         }
     }else{
        dd('Error in resutrant creation');
     }
    // /  $this->getRedirectUrl();
     return $result;
}
function saveResturantCuision($resturant_id,array $cusinies_ids){
        $resturants_cuisions = array();
        try{
            foreach($cusinies_ids as $cusinies_id){
                $resturants_cuisions[] = array(
                    'cuisine_id'=>$cusinies_id,
                    'restaurant_id'=>$resturant_id
                );
            }
          return DB::table('restaurant_cuisines')->insert($resturants_cuisions);
        }catch(\Exception $e){
            return $e->getMessage();
        }
}
function saveResturantCategories($resturant_id,array $categories_ids){
    $resturants_categories = array();
            try{
                foreach($categories_ids as $category_id){
                    $resturants_categories[] = array(
                        'category_id'=>$category_id,
                        'restaurant_id'=>$resturant_id
                    );
                }
               return DB::table('restaurant_categories')->insert($resturants_categories);
            }catch(\Exception $e){
                return $e->getMessage();
        }
}
function saveResturantLocations($resturant_id,array $locations){
    $resturants_locations = array();
            try{
                foreach($locations as $location){
                    $resturants_locations[] = array(
                        'name'=>$location['location_name'],
                        'location_url'=>$location['location_url'],
                        'restaurant_id'=>$resturant_id
                    );
                }
               return DB::table('restaurant_locations')->insert($resturants_locations);
            }catch(\Exception $e){
                return $e->getMessage();
        }
}
function saveResturantfoodTrucks($resturant_id,array $foodTrucks){
    $resturants_foodTrucks = array();
            try{
                foreach($foodTrucks as $truck){
                    $resturants_foodTrucks[] = array(
                        'name'=>$truck['location_name'],
                        'location_url'=>$truck['location_url'],
                        'restaurant_id'=>$resturant_id
                    );
                }
               return DB::table('restaurant_foods_truck')->insert($resturants_foodTrucks);
            }catch(\Exception $e){
                return $e->getMessage();
        }
}
function saveResturantAmenities($resturant_id,array $amenities_ids){
    $resturants_amenities = array();
    try{
        foreach($amenities_ids as $amenities_id){
            $resturants_amenities[] = array(
                'amenity_id'=>$amenities_id,
                'restaurant_id'=>$resturant_id
            );
        }
      return DB::table('restaurant_amenities')->insert($resturants_amenities);
    }catch(\Exception $e){
        return $e->getMessage();
    }
}
function saveResturantDeliveryOptions($resturant_id,array $deliveryOptions_ids){
    $resturants_deliveryOptions = array();
    try{
        foreach($deliveryOptions_ids as $deliveryOptions_id){
            $resturants_deliveryOptions[] = array(
                'delivery_option_id'=>$deliveryOptions_id,
                'restaurant_id'=>$resturant_id
            );
        }
      return DB::table('restaurant_deliveries_options')->insert($resturants_deliveryOptions);
    }catch(\Exception $e){
        return $e->getMessage();
    }
}
protected function getRedirectUrl(): string
{
    return $this->getResource()::getUrl('index');
}
protected function mutateAfterCreate(array $data): array
{
    dd($data);
    // $data['user_id'] = auth()->id();

     return $data;
}
}
