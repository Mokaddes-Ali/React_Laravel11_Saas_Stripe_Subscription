<?php

namespace App\Http\Controllers;

use App\Models\Feature;
use Illuminate\Http\Request;

class Feature1Controller extends Controller
{
    public ?Feature $feature = null;

    public function __construct(Feature $feature)
    {
        $this->feature = Feature::where("route_name", "feature1.index")
            ->where("active", true)
            ->firstOrFail();
    }

    public function index()
    {
        return inertia('Feature1/Index', [
            'feature' => $this->feature,
        ]);
    }

    public function calculate(Request $request)
    {
        $feature = $this->feature->find($request->feature_id);
        $credits = $request->credits;
        $required_credits = $feature->required_credits;
        $result = $credits - $required_credits;
        return response()->json(['result' => $result]);
    }





}
