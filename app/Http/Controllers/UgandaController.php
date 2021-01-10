<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\UgandaData;

class UgandaController extends Controller
{
    public function getAllUgandaResults() {
        $uganda_data = UgandaData::get()->toJson(JSON_PRETTY_PRINT);
        return response($uganda_data, 200);
      }

      public function createUgandaResults(Request $request) {
        $uganda_data = new UgandaData;
        $uganda_data->name = $request->name;
        $uganda_data->course = $request->course;
        $uganda_data->save();

        return response()->json([
            "message" => "student record created"
        ], 201);
      }

      public function getUgandaResult($id) {
        if (UgandaData::where('id', $id)->exists()) {
            $uganda_data = UgandaData::where('id', $id)->get()->toJson(JSON_PRETTY_PRINT);
            return response($uganda_data, 200);
          } else {
            return response()->json([
              "message" => "Record not found"
            ], 404);
          }
      }

      public function updateUgandaResults(Request $request, $id) {
        if (UgandaData::where('id', $id)->exists()) {
            $student = UgandaData::find($id);
            $student->name = is_null($request->name) ? $student->name : $request->name;
            $student->course = is_null($request->course) ? $student->course : $request->course;
            $student->save();

            return response()->json([
                "message" => "records updated successfully"
            ], 200);
            } else {
            return response()->json([
                "message" => "Record not found"
            ], 404);
        }
      }

      public function deleteUgandaResults ($id) {
        if(UgandaData::where('id', $id)->exists()) {
            $uganda_data = UgandaData::find($id);
            $uganda_data->delete();

            return response()->json([
              "message" => "record deleted"
            ], 202);
          } else {
            return response()->json([
              "message" => "Uganda data not found"
            ], 404);
          }
      }
}
