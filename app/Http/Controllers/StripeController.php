<?php
  
namespace App\Http\Controllers;
  
use Illuminate\Http\Request;
use Stripe;
use Stripe\Charge;
use Stripe\Stripe as StripeStripe;

class StripeController extends Controller
{
    public function showPaymentForm()
    {
        return view('payment.payment');
    }
      
    public function processPayment(Request $request)
    {
        StripeStripe::setApiKey(env('STRIPE_SECRET'));

        try {
            Charge::create([
                "amount" => $request->amount,
                "currency" => "usd",
                "source" => $request->stripeToken,
                "description" => "Payment for services",
            ]);

            return redirect()->route('payment.success');
        } catch (\Stripe\Exception\CardException $e) {
            // Handle card errors
            $error = $e->getError();
            $message = $error['message'];
        } catch (\Stripe\Exception\RateLimitException $e) {
            // Handle rate limit errors
            $message = "Too many requests made to the API too quickly.";
        } catch (\Stripe\Exception\InvalidRequestException $e) {
            // Handle invalid request errors
            $message = "Invalid parameters were supplied to Stripe's API.";
        } catch (\Stripe\Exception\AuthenticationException $e) {
            // Handle authentication errors
            $message = "Authentication with Stripe's API failed.";
        } catch (\Stripe\Exception\ApiConnectionException $e) {
            // Handle API connection errors
            $message = "Network communication with Stripe failed.";
        } catch (\Stripe\Exception\ApiErrorException $e) {
            // Handle generic Stripe errors
            $message = "An error occurred while processing your payment.";
        }

        return redirect()->route('payment.failure')->with('error', $message);
    }
}