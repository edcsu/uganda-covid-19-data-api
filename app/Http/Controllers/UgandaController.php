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
        $uganda_data->new_cases = $request->newCases;
        $uganda_data->total_cases = $request->totalCases;
        $uganda_data->new_deaths = $request->newDeaths;
        $uganda_data->total_deaths = $request->totalDeaths;
        $uganda_data->new_recoveries = $request->newRecoveries;
        $uganda_data->total_recoveries = $request->totalRecoveries;
        $uganda_data->new_tests = $request->newTests;
        $uganda_data->total_tests = $request->totalTests;
        $uganda_data->total_cases = $request->totalCases;
        $uganda_data->date_for = $request->dateFor;
        $uganda_data->save();

        return response()->json([
            "message" => "Record created"
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
            $uganda_data = UgandaData::find($id);
            $uganda_data->new_cases = is_null($request->newCases) ? $uganda_data->new_cases : $request->newCases;
            $uganda_data->total_cases = is_null($request->totalCases) ? $uganda_data->total_cases : $request->totalCases;
            $uganda_data->new_deaths = is_null($request->newDeaths) ? $uganda_data->new_deaths : $request->newDeaths;
            $uganda_data->total_deaths = is_null($request->totalDeaths) ? $uganda_data->total_deaths : $request->totalDeaths;
            $uganda_data->new_recoveries = is_null($request->newRecoveries) ? $uganda_data->new_recoveries : $request->newRecoveries;
            $uganda_data->total_recoveries = is_null($request->totalRecoveries) ? $uganda_data->total_recoveries : $request->totalRecoveries;
            $uganda_data->new_tests = is_null($request->newTests) ? $uganda_data->new_tests : $request->newTests;
            $uganda_data->total_tests = is_null($request->totalTests) ? $uganda_data->total_tests : $request->totalTests;
            $uganda_data->total_cases = is_null($request->totalCases) ? $uganda_data->total_cases : $request->totalCases;
            $uganda_data->date_for = is_null($request->dateFor) ? $uganda_data->date_for : $request->dateFor;
            $uganda_data->save();

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
