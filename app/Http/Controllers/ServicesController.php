<?php

namespace App\Http\Controllers;

use App\Models\Feature;
use App\Models\Services;
use App\Models\Type;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ServicesController extends Controller
{
    public function __construct()
    {
        $this->service = new Services();
    }

    public function services($id = null)
    {
        $query = $this->service->query();
        if (!is_null($id)) {
            $query->where('id', $id);
        }
        $services = $query->select('id', 'service', 'description', 'caret')->get();

        return json_encode($services);
    }

    public function index()
    {
        $services = $this->service->get();
        return view('services.index', compact('services'));
    }


    public function store(Request $request)
    {
        $validated = $request->validate([
            'service_id' => ['nullable', 'exists:services,id'],
            'service' => ['required', 'max:70', 'unique:services,service,' . $request->service_id],
            'description' => ['required', 'max:255'],
            'caret' => ['nullable', 'max:50']
        ]);
        if (is_null($validated["service_id"])) {
            $this->service->create($validated);
            $message = "Service updated successfully";
        } else {
            $service = $this->service->find($validated["service_id"]);
            $service->update($validated);
            $message = "Service updated successfully";
        }

        return json_encode(['status' => 'success', 'message' => $message]);
    }

    function processvehicles()
    {
        // $vehicles = DB::table('caronsells')->whereIn('id',[183, 186, 200, 209, 242, 243])->get();
        $vehicles = DB::table('caronsells')->get();

        $data = collect();
        // foreach ($vehicles as $key => $value) {
        //     // $features = json_decode($value->features, true);
        //     // if (is_array($features)) {
        //     //     foreach ($features as $item) {
        //     //         $feature = Feature::where('feature', $item)->first();
        //     //         if (!is_null($feature)) {
        //     //             $new = DB::table('table_cars_features')->insert(['vehicle_id' => $value->id, 'feature_id' => $feature->id]);
        //     //         } else {
        //     //             $feature =  Feature::create(['feature'=>$item]);
        //     //             $new = DB::table('table_cars_features')->insert(['vehicle_id' => $value->id, 'feature_id'=>$feature->id, 'feature' => $item]);
        //     //         }
        //     //         $data->push($new);
        //     //     }
        //     // } else {
        //     //     $data->push($features);
        //     // }
        //     // DB::table('table_vehicle_images')->insert(['vehicle_id' => $value->id, 'image' => $value->cover_photo]);
        //     // if ($value->cover_photo !== "" && !is_null($value->cover_photo)) {
        //     //     DB::table('final_images_migration')->insert(['vehicle_id'=>$value->id,'image'=>$value->cover_photo]);
        //     // }else {
        //     //     $data->push($value);
        //     // }

        //     if (is_array($value->images)) {
        //         // $data->push($value);
        //         // foreach ($value->images as $item) {
        //         //     DB::table('table_vehicle_images')->insert(['vehicle_id'=>$value->id,'image'=>$item]);
        //         // }
        //     } else {
        //         $images = json_decode($value->images,true);
        //         if (is_array($images)) {
        //             // $data->push($value);
        //             foreach ($images as $item) {
        //                 $data->push($item);
        //                 if ($item !== $value->cover_photo) {
        //                     DB::table('final_images')->insert(['vehicle_id' => $value->id, 'image' => $item]);
        //                 }else{
        //                     $data->push($item);
        //                 }
        //             }
        //         } else {

        //             // $images = json_decode("$images", true);
        //             // // if (is_array($images)) {
        //             // //     foreach ($value->images as $key => $val) {
        //             // //         DB::table('table_vehicle_images')->insert(['vehicle_id' => $value->id, 'image' => $val]);
        //             // //     }
        //             // // }else {
        //             // //     $data->push($images);
        //             // // }
        //             // $data->push($value);
        //         }
        //     }
        // }

        // return $data->count();

        // return $data->count();
        // $users = collect();
        $values = collect();
        // $vehicles = DB::table('caronsells')->get();
        // // return $vehicles;
        foreach ($vehicles as $key => $value) {
            $type = Type::where('type', $value->vehicle_type)->first();
            $make = DB::table('car_makes')->where('car_make_id',intval($value->make))->first();
            $makegh = DB::table('makes')->where('id',$value->make)->first();
            // return $makegh;
            if (!is_null($make)) {
                $make = DB::table('makes')->where('make',$make->car_make_name)->first();
            }else {
                $make = DB::table('makes')->where('id', intval($value->make))->first();
            }
            $model = DB::table('car_models')->where('car_model_id',$value->model)->first();
            if (!is_null($model)) {
                $model = DB::table('vehicle_models')->where('model', $model->car_model_name)->first();
            } else {
                $model = DB::table('vehicle_models')->where('id', $value->model)->first();
            }
            if ($value->user_id !== 0 && !is_null($value->user_id)) {
                DB::table('vehicles')->insert([
                    'id' => $value->id,
                    'user_id' => $value->user_id,
                    'vehicle_no' => strtoupper(Str::random(8)),
                    'type_id' => $type?->id,
                    'make_id' => $make->id,
                    'vehicle_model_id' => $model->id,
                    'year' => $value->year,
                    'price' => $value->price,
                    // 'location' => $value->location,
                    'color' => $value->exterior,
                    'mileage' => $value->miles,
                    'enginecc' => $value->enginecc,
                    'interior' => $value->interior,
                    'fuel_type' => $value->fuel_type,
                    'transmission' => $value->transmission,
                    'description' => $value->description,
                    'usage' => $value->usage,
                    'views' => $value->views,
                    'created_at' => $value->created_at,
                ]);
            } else {
                $user = User::where('email', $value->email)->orWhere('phone', $value->phone)->first();
                DB::table('vehicles')->insert([
                    'id' => $value->id,
                    'user_id' => $user->id,
                    'vehicle_no' => strtoupper(Str::random(8)),
                    'type_id' => $type?->id,
                    'make_id' => $make->id,
                    'vehicle_model_id' => $model->id,
                    'year' => $value->year,
                    'price' => $value->price,
                    // 'location' => $value->location,
                    'color' => $value->exterior,
                    'mileage' => $value->miles,
                    'enginecc' => $value->enginecc,
                    'interior' => $value->interior,
                    'fuel_type' => $value->fuel_type,
                    'transmission' => $value->transmission,
                    'description' => $value->description,
                    'usage' => $value->usage,
                    'views' => $value->views,
                    'created_at' => $value->created_at,
                    'updated_at' => $value->created_at
                ]);
             }
        }
        return $values;
        // return $users->count();
        // return $vehicles;
        // return $data;
        // $modelsnon = collect();
        // $makes = DB::table('makes')->pluck('id');
        // $models = DB::table('vehicle_models')->pluck('id');
        // $vehicles = DB::table('caronsells')->whereNotIn('make',$makes)->get();

        // foreach ($vehicles as $key => $value) {
        //     DB::table('caronsells')->where('id',$value->id)->update(['make'=>51]);
        //     // $value->update(['make'=>51]);
        //     // $model = DB::table('car_models')->where('car_model_id',$value->model)->first();
        //     // $modelsnon->push($model);
        // }

        // return $vehicles;
    }
}
