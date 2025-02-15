<?php

namespace App\Http\Controllers;

use Stripe\Stripe;
use App\Models\User;
use App\Models\Feature;
use App\Models\Package;
use Stripe\StripeClient;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Stripe\Checkout\Session;
use Illuminate\Support\Facades\Auth;
use App\Http\Resources\FeatureResource;
use App\Http\Resources\PackageResource;

class CreditController extends Controller
{
    public function index()
    {
        $packages = Package::all();
        $features = Feature::where('active', true)->get();

        return inertia("Credit/Index", [
            'packages' => PackageResource::collection($packages),
            'features' => FeatureResource::collection($features),
            'success' => session('success'),
            'error' => session('error')
        ]);
    }

    public function buyCredits(Package $package)
    {
        $stripe = new StripeClient(env('STRIPE_SECRET_KEY'));

        try {
            $checkout_session = $stripe->checkout->sessions->create([
                'line_items' => [
                    [
                    'price_data' => [
                        'currency' => 'usd',
                        'product_data' => [
                            'name' => $package->name .' - ' .
                            $package->credits . 'credits',

                        ],
                        'unit_amount' => $package->price * 100,
                    ],
                    'quantity' => 1,
                ]],
                'mode' => 'payment',
                'success_url' => route('credits.success', [], true),
                'cancel_url' => route('credits.cancel', [], true),
            ]);

            Transaction::create([
                'status' => 'pending',
                'price' => $package->price,
                'credits' => $package->credits,
                'session_id' => $checkout_session->id,
                'user_id' => Auth::id(),
                'package_id' => $package->id,

            ]);

            return redirect($checkout_session ->url);
        } catch (\Exception $e) {
            return back()->with('error', $e->getMessage());
        }
    }

    public function success()
    {
        return to_route('credit.index')
        ->with('success', 'You Have Successfully bought new credits.');

    }

    public function cancel()
    {
        return to_route('credit.index')
        ->with('error', 'There was an error in payment process, Please try again');
    }

//     public function webhook(Request $request)
//     {
//         $endpoint_secret = env('STRIPE_WEBHOOK_KEY');
//         $payload = @file_get_contents('php://input');
//         $sig_header = $_SERVER['HTTP_STRIPE_SIGNATURE'] ?? '';

//         try {
//             $event = \Stripe\Webhook::constructEvent(
//                 $payload,
//                 $sig_header,
//                 $endpoint_secret
//             );
//         } catch (\UnexpectedValueException $e) {
//             return response()->json(['error' => 'Invalid payload'], 400);
//         } catch (\Stripe\Exception\SignatureVerificationException $e) {
//             return response()->json(['error' => 'Invalid signature'], 400);
//         }


//         switch ($event->type){

//         case 'checkout.session.completed':

//             $session = $event->data->object;

//             $transition = Transaction::where('session_id',
//             $session->id)->first();
//             if($transition && $transition->status === 'pending'){
//                 $transition->status = 'paid';
//                 $transition->save();
//                 $transition->user->available_credits += $transition->credits;
//                 $transition->user->save();
//                 $user = $transition->user;
// $user->available_credits = $user->available_credits + $transition->credits;
// $user->save();
//             }

//             default:
//             echo 'Received unknown event type' . $event->type;

//         }

//         return response()->json(['status' => 'success']);
//     }
// }

public function webhook(Request $request)
    {
        $endpoint_secret = env('STRIPE_WEBHOOK_KEY');
        $payload = @file_get_contents('php://input');
        $sig_header = $_SERVER['HTTP_STRIPE_SIGNATURE'] ?? '';

        try {
            $event = Webhook::constructEvent(
                $payload,
                $sig_header,
                $endpoint_secret
            );
        } catch (\UnexpectedValueException $e) {
            return response()->json(['error' => 'Invalid payload'], 400);
        } catch (\Stripe\Exception\SignatureVerificationException $e) {
            return response()->json(['error' => 'Invalid signature'], 400);
        }

        if ($event->type === 'checkout.session.completed') {
            $session = $event->data->object;

            $transaction = Transaction::where('session_id', $session->id)->first();

            if ($transaction && $transaction->status === 'pending') {
                // Update transaction status
                $transaction->status = 'paid';
                $transaction->save();

                // Update user credits
                $user = $transaction->user;
                if ($user) {
                    $user->increment('available_credits', $transaction->credits);
                }
            }
        }

        return response()->json(['status' => 'success']);
    }
}
