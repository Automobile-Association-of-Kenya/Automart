<?php

namespace App\Http\Controllers;

use App\Models\Feature;
use App\Models\Services;
use App\Models\Type;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
        // // return $vehicles;
        // $data = collect();
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

        //     if (is_array($value->images)) {
        //         // $data->push($value);
        //         // foreach ($value->images as $item) {
        //         //     DB::table('table_vehicle_images')->insert(['vehicle_id'=>$value->id,'image'=>$item]);
        //         // }
        //     } else {
        //         $images = json_decode($value->images,true);
        //         if (is_array($images)) {
        //             foreach ($images as $item) {
        //                 DB::table('table_vehicle_images')->insert(['vehicle_id' => $value->id, 'image' => $item]);
        //             }
        //         } else {
        //             // $images = json_decode("$images", true);
        //             // if (is_array($images)) {
        //                 foreach ($value->images as $key => $val) {
        //                     DB::table('table_vehicle_images')->insert(['vehicle_id' => $value->id, 'image' => $val]);
        //                 }
        //             // // }else {
        //             // //     $data->push($images);
        //             // // }
        //             $data->push($value);
        //         }
        //     }
        // }
        $users = collect();
        $values = collect();
        $vehicles = DB::table('caronsells')->get();
        foreach ($vehicles as $key => $value) {
            $user = User::where('id', $value->user_id)->first();
            // if (is_null($user)) {
            //     $values->push(['firstname' => $value->firstname, 'lastname' => $value->lastname, 'email' => $value->email, 'phone' => $value->phone]);
            //     $user = User::where('email', $value->email)->orWhere('phone', $value->phone)->first();
            //     // $users->push($user);
            //     DB::table('caronsells')->update(['user_id' => $user->id]);
            // } else {
            // }

            // DB::table('caronsells')->where('id',$value->id)->update(['dealer_id'=>$user->dealer_id]);
            $type = Type::where('type', $value->vehicle_type)->first();

            DB::table('vehicles')->insert([
                'id' => $value->id,
                'user_id' => $value->user_id,
                'dealer_id' => $value->dealer_id,
                'type_id' => $type?->id,
                'make_id' => $value->make,
                'vehicle_model_id' => $value->model,
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
        }
        return $users->count();
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
