<?php

namespace App\Http\Controllers;

use App\Models\Feature;
use App\Models\UsedFeature;
use Illuminate\Http\Request;
use App\Http\Resources\FeatureResource;

class Feature2Controller extends Controller
{
    public ?Feature $feature = null;

    public function __construct(Feature $feature)
    {
        $this->feature = Feature::where("route_name", "feature2.index")
            ->where("active", true)
            ->firstOrFail();
    }

    public function index()
    {
        return inertia('Feature2/Index', [
            'feature' =>new FeatureResource($this->feature),
            'answer' => session('answer')
        ]);
    }

    public function calculate(Request $request)
    {
        $user = $request->user();
        if($user->available_credits < $this->feature->required_credits){
            return redirect()->back()->with('answer', 'You do not have enough credits to access this feature');
        }
        $data = $request->validate([
            'number1' => ['required','numeric'],
            'number2' => ['required','numeric'],
        ]);
        $number1 = (float) $data['number1'];
        $number2 = (float) $data['number2'];

        $user-> decreaseCredits($this->feature->required_credits);

        UsedFeature::create([
            'user_id' => $user->id,
            'feature_id' => $this->feature->id,
            'credits' => $this->feature->required_credits,
            'data' => $data
        ]);

        return to_route('feature2.index')->with('answer', 'The difference of the two numbers is: '.($number1 - $number2));
    }

}
