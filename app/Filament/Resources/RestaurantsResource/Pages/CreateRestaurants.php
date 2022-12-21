<?php

namespace App\Filament\Resources\RestaurantsResource\Pages;

use App\Filament\Resources\RestaurantsResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Database\Eloquent\Model;
use App\Models\Restaurants;
use App\Models\ResturantMenus;
use App\Models\Documents;
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
    // dd($data);
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
         //create a resturant time
         $this->saveResturantTiming($resturant_id,$data);
         //create a resturant Menus
         if(isset($data['menus'])){
            $this->saveResturantMenus($resturant_id,$data['menus']);
         }
         //create a resturant photos
         if(isset($data['photo_Items'])){
            $this->saveResturantPhotos($resturant_id,$data['photo_Items']);
         }
         //create a resturants sukhari favriute
         if(isset($data['fav_Items'])){
            $this->saveResturantSkriFav($resturant_id,$data['fav_Items']);
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
function saveResturantTiming($resturant_id,$data){
   $times = [];
   $days = ['Sunday','Monday','Tuseday','Wednesday','Thursday','Friday','Saturday'];
   try{
    foreach($days as $day){
        $open_time = strtolower($day).'_from';
        $close_time = strtolower($day).'_to';
        $times[] = array(
           'day'=>$day,
           'restaurant_id'=>$resturant_id,
           'open_time'=>$data[$open_time],
           'close_time'=>$data[$close_time],
           'status'=>$data[$day]
        );
      }
      return DB::table('restaurant_timing')->insert($times);
   }catch(\Exception $e){
    return $e->getMessage();
   }

}
function saveResturantMenus($resturant_id,$menus){
    try{
        foreach($menus as $menu){
            $resto_menu = new ResturantMenus;
            $resto_menu->name = $menu['menu_name'];
            $resto_menu->link = $menu['menu_url'];
            $resto_menu->restaurant_id = $resturant_id;
            $resto_menu->save();
           if(count($menu['images'])>0){
            foreach($menu['images'] as $image){
            $document = new Documents;
            $document->url = $image;
            $resto_menu->documents()->save($document);
         }
        }
    }
      return true;
    }catch(\Exception $e){
        return $e->getMessage();
    }

}
function saveResturantPhotos($resturant_id,$photos){
    try{
        $resto_photos = [];
        foreach($photos as $photo){
            $cusinies_ids = $categories_ids = null;
            if(count($photo['photo_cuisines_ids']) > 0)
            $cusinies_ids = implode (",", $photo['photo_cuisines_ids']);
            if(count($photo['photo_occassions'])>0)
            $categories_ids = implode (",", $photo['photo_occassions']);
            $resto_photos[] = array(
                'item_name_en'=>$photo['name_en'],
                'item_name_ar'=>$photo['name_ar'],
                'item_price'=>$photo['price'],
                'cuisines_ids'=>$cusinies_ids,
                'restaurant_id'=>$resturant_id,
                'image'=>$photo['images'],
                'categories_ids'=>$categories_ids
            );
          return DB::table('restaurant_photos')->insert($resto_photos);
        }
    }catch(\Exception $e){
        dd($e->getMessage());
        return $e->getMessage();
    }

}
function saveResturantSkriFav($resturant_id,$items){
    try{
        $resto_items = [];
        foreach($items as $item){
            $resto_items[] = array(
                'item_name_en'=>$item['name_en'],
                'item_price'=>$item['price'],
                'restaurant_id'=>$resturant_id,
                'image'=>$item['images'],
            );
          return DB::table('restaurant_favourties')->insert($resto_items);
        }
    }catch(\Exception $e){
        dd($e->getMessage());
        return $e->getMessage();
    }

}
protected function getRedirectUrl(): string
{
    return $this->getResource()::getUrl('index');
}
protected function mutateAfterCreate(array $data): array
{
     return $data;
}

}
