<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Property;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PropertyController extends Controller
{
    public function add_property(Request $request){
        $validator = Validator::make($request->all(), [
            'building_name' => 'required',
            'address' => 'required',
            'tower_name' => 'required',
            'floor_number' => 'required|integer',
            'flat_number' => 'required',
            'flat_type' => 'required|in:2bhk,3bhk,4bhk',
            'size' => 'required',
            'status' => 'required|in:soldout,unsold',
        ]);

        if ($validator->fails()) {
            $response = [
                'success' => false,
                'message' => $validator->errors()
            ];
            return response()->json($response, 400);
        }

        $input = $request->all();
        $property = Property::create($input);
        $response = [
            'success' => true,
            'data' => $property,
            'message' => 'User registered successfully'
        ];
        return response()->json($property, 200);
    }

    public function get_data_property(Request $request){
        $status = $request->input('status');

        if (!in_array($status, ['soldout', 'unsold'])) {
            return response()->json([
                'success' => false,
                'message' => 'Invalid status. Status must be either "soldout" or "unsold".'
            ], 400);
        }

        $flats = Property::where('status', $status)->get();

        return response()->json([
            'success' => true,
            'data' => $flats,
            'message' => "List of flats with status: $status"
        ], 200);
    }
}
