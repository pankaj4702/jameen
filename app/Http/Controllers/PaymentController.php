<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PayPalHttp\HttpException;
use PayPalCheckoutSdk\Subscriptions\SubscriptionsGetRequest;
use PayPalCheckoutSdk\Subscriptions\SubscriptionsPatchRequest;
use PayPal\Core\SandboxEnvironment as sandboxEnvironment;
use PayPalHttp\HttpClient as PayPalHttpClient;
use Illuminate\Support\Facades\Http;
use Srmklive\PayPal\Services\ExpressCheckout;
use Srmklive\PayPal\Services\PayPal as PayPalClient;
use App\Models\Subscriber;
use Session;

class PaymentController extends Controller
{
    public function getToken()
    {
            $clientId = 'Ad7FmonAEv6O7YQmD4cepFlG96Pa4GbLRMZQgeFTnkOxAGqIpBxTVHESPwfDTghXEKwcS-wqMfnOKD_U';
        $clientSecret = 'EKptyALZbJNvqoUJ5xawV443pG9B4a1YELF0nxiXRjUBnf83JLHMvsrkBqqz4v0ZWqMQlDb7E7cCiFQe';

        $accessTokenResponse = Http::withBasicAuth($clientId, $clientSecret)
        ->asForm()
        ->post('https://api-m.sandbox.paypal.com/v1/oauth2/token', [
            'grant_type' => 'client_credentials',
        ]);
        $accessTokenData = json_decode($accessTokenResponse, true);
        $expiresIn = $accessTokenData['expires_in'];

        $expirationTime = time() + $expiresIn;

        if (isset($accessTokenData['access_token'])) {
        $accessToken = $accessTokenData['access_token'];
        return $accessToken ;
        }

    }

    public function createProduct(){

                $accessToken = $this->getToken();
                $products = [
                    [
                        'name' => '500/Mo Plan Product',
                        'description' => 'Product for 500 per month plan',
                        'type' => 'SERVICE',
                        'category' => 'SOFTWARE',
                        'image_url' => 'https://example.com/streaming1.jpg',
                        'home_url' => 'https://example.com/home1',
                    ],
                    [
                        'name' => '1000/Mo Plan Product',
                        'description' => 'Product for 1000 per month plan',
                        'type' => 'SERVICE',
                        'category' => 'SOFTWARE',
                        'image_url' => 'https://example.com/streaming2.jpg',
                        'home_url' => 'https://example.com/home2',
                    ],
                    [
                        'name' => '1500/Mo Plan Product',
                        'description' => 'Product for 1500 per month plan',
                        'type' => 'SERVICE',
                        'category' => 'SOFTWARE',
                        'image_url' => 'https://example.com/streaming2.jpg',
                        'home_url' => 'https://example.com/home2',
                    ],
                    // Add more products as needed
                ];
                foreach ($products as $key =>$product) {
                    $key++;
                $response = Http::withHeaders([
                    'Content-Type' => 'application/json',
                    'Accept' => 'application/json',
                    'PayPal-Request-Id' => 'CREATE-PRODUCTS-18062019-001'.$key,
                    'Prefer' => 'return=representation',
                ])->withToken($accessToken)
                ->post('https://api-m.sandbox.paypal.com/v1/catalogs/products', $product);

                  if ($response->failed()) {
                    $errorDetails = $response->json();
                    return response()->json(['error' => $errorDetails], 500);
                }
            }

               return response()->json($response->json());

    }

    public function deleteProduct()
    {
        $planId = 'P-53L02922DA911915SMWXY6OQ';
        $accessToken = $this->getToken();

        $response = Http::withHeaders([
            'Content-Type' => 'application/json',
            'Accept' => 'application/json',
            'Authorization' => 'Bearer ' . $accessToken,
            'PayPal-Request-Id' => 'DELETE-PLAN-18062019-001',
        ])->delete("https://api-m.sandbox.paypal.com/v1/billing/plans/$planId");

        if ($response->failed()) {
            // Handle the error response
            $errorDetails = $response->json();
            // Log or return the error details for further investigation
            return response()->json(['error' => $errorDetails], 500);
        }

        // Handle the successful response for plan deletion, if needed
        $successDetails = $response->json();
        // Log or use $successDetails as needed

        // If the plan is deleted successfully, you can return a success response or do additional processing
        return response()->json(['message' => 'Plan deleted successfully']);
    }



    public function getProductList()
{
    $accessToken = $this->getToken();

    $response = Http::withHeaders([
        'Content-Type' => 'application/json',
        'Accept' => 'application/json',
        'Authorization' => 'Bearer ' . $accessToken,
        'PayPal-Request-Id' => 'GET-PRODUCTS-18062019-001',
        'Prefer' => 'return=representation',
    ])->get('https://api-m.sandbox.paypal.com/v1/catalogs/products');

    if ($response->failed()) {
        // Handle the error response
        $errorDetails = $response->json();
        // Log or return the error details for further investigation
        return response()->json(['error' => $errorDetails], 500);
    }

    // Handle the successful response, for example, return the list of products
    $products = $response->json();
    return response()->json(['products' => $products]);
}


        public function createPlan()
        {
            // return view('frontend.subscribe');
            $accessToken = $this->getToken();
            $plans = [
                [
                    'product_id' => 'PROD-0WM61910YC561171V',
                    'name' => '500/mo',
                    'description' => '500/mo Subscription Plan',
                    'status' => 'ACTIVE',
                    'billing_cycles' => [
                        [
                            'frequency' => [
                                'interval_unit' => 'MONTH',
                                'interval_count' => 1,
                            ],
                            'tenure_type' => 'REGULAR',
                            'sequence' => 1,
                            'total_cycles' => 12,
                            'pricing_scheme' => [
                                'fixed_price' => [
                                    'value' => '500',
                                    'currency_code' => 'USD',
                                ],
                            ],
                        ],
                    ],
                    'payment_preferences' => [
                        'auto_bill_outstanding' => true,
                        'setup_fee' => [
                            'value' => '0',
                            'currency_code' => 'USD',
                        ],
                        'setup_fee_failure_action' => 'CONTINUE',
                        'payment_failure_threshold' => 3,
                    ],
                    'taxes' => [
                        'percentage' => '0',
                        'inclusive' => false,
                    ],
                ],
                [
                    'product_id' => 'PROD-3FA81337UL159181H',
                    'name' => '1000/mo',
                    'description' => '1000/mo Subscription Plan',
                    'status' => 'ACTIVE',
                    'billing_cycles' => [
                        [
                            'frequency' => [
                                'interval_unit' => 'MONTH',
                                'interval_count' => 1,
                            ],
                            'tenure_type' => 'REGULAR',
                            'sequence' => 1,
                            'total_cycles' => 12,
                            'pricing_scheme' => [
                                'fixed_price' => [
                                    'value' => '1000',
                                    'currency_code' => 'USD',
                                ],
                            ],
                        ],
                    ],
                    'payment_preferences' => [
                        'auto_bill_outstanding' => true,
                        'setup_fee' => [
                            'value' => '0',
                            'currency_code' => 'USD',
                        ],
                        'setup_fee_failure_action' => 'CONTINUE',
                        'payment_failure_threshold' => 3,
                    ],
                    'taxes' => [
                        'percentage' => '0',
                        'inclusive' => false,
                    ],
                ],
                [
                    'product_id' => 'PROD-1XR96562PL324131F',
                    'name' => '1500/mo',
                    'description' => '1500/mo Subscription Plan',
                    'status' => 'ACTIVE',
                    'billing_cycles' => [
                        [
                            'frequency' => [
                                'interval_unit' => 'MONTH',
                                'interval_count' => 1,
                            ],
                            'tenure_type' => 'REGULAR',
                            'sequence' => 1,
                            'total_cycles' => 12,
                            'pricing_scheme' => [
                                'fixed_price' => [
                                    'value' => '1500',
                                    'currency_code' => 'USD',
                                ],
                            ],
                        ],
                    ],
                    'payment_preferences' => [
                        'auto_bill_outstanding' => true,
                        'setup_fee' => [
                            'value' => '0',
                            'currency_code' => 'USD',
                        ],
                        'setup_fee_failure_action' => 'CONTINUE',
                        'payment_failure_threshold' => 3,
                    ],
                    'taxes' => [
                        'percentage' => '0',
                        'inclusive' => false,
                    ],
                ],
                // Add more plans as needed
            ];
            foreach ($plans as $key=> $plan) {
                $key++;
                $response = Http::withHeaders([
                    'Content-Type' => 'application/json',
                    'Accept' => 'application/json',
                    'PayPal-Request-Id' => 'CREATE-PLANS-18062019-001'.$key,
                    'Prefer' => 'return=representation',
                ])->withToken($accessToken)
                  ->post('https://api-m.sandbox.paypal.com/v1/billing/plans', $plan);

                  if ($response->failed()) {
                    // Handle the error response
                    $errorDetails = $response->json();
                    // Log or return the error details for further investigation
                    return response()->json(['error' => $errorDetails], 500);
                }
            }
                // Handle the response, for example, return it or process further

                return response()->json($response->json());
        }

        public function firstPlan(){
              return view('frontend.subscribe');
        }

        public function payment_store(Request $req){
            $user_id = Session::get('user_id');
            $property = Subscriber::create([
                'user_id'=>$user_id,
                'order_id'=>$req->orderId,
                'subscription_id'=>$req->subscriptionId,
                'status'=>1,
            ]);
            if($property){
                return response()->json(['status'=> 1,'success'=>'successful']);
              }

        }

}
