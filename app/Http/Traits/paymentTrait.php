<?php
namespace App\Http\Traits;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Mail;
use App\Models\Payment;

trait paymentTrait {

    public $email;
    public $amount;
    public $cost;
    public $shipping;

    public function triggerPayment(Request $request)
    {
        //Set Email
        $this->email = $request->email;

        //Get shipping by date
        $this->getShippingByDate();

        //Set Amount and Details for paystack
        if($this->shipping == 0){
            $this->freeShipping($request->book, $request->quantity, $request->location);
        }
        else{
            $this->noFreeShipping($request->book, $request->quantity, $request->location);
        }

        //Pre-Store Payment Data
        $this->storePayment($request->name, $request->address, $request->quantity, $request->location, $request->book);

        //Make Payment
        return $this->makePayment();
    }

    public function noFreeShipping($book, $quantity, $location)
    {
        // Process after free shipping date
        //Continue with standard shipping per category
        if($book == "Your_Bussiness_Legal_Companion")
        {
            $bookCost = ((int)$quantity * (int)config('app.book1_cost'));
            $this->cost = (int)config('app.book1_cost');

            //For Book 1
            switch ($location)
            {
                case "Lagos":
                    $this->amount = $bookCost + (int)config('app.book1_lagos_cost');
                    $this->shipping = (int)config('app.book1_lagos_cost');
                    break;
                default:
                    $this->amount = $bookCost + (int)config('app.book1_not_lagos_cost');
                    $this->shipping = (int)config('app.book1_not_lagos_cost');
                    break;
            }
        }
        elseif($book == "all_books")
        {
            $bookCost = ((int)$quantity * (int)config('app.book_all_cost'));
            $this->cost = (int)config('app.book_all_cost');

            //For Book 1
            switch ($location)
            {
                case "Lagos":
                    $this->amount = $bookCost + (int)config('app.book_all_lagos_cost');
                    $this->shipping = (int)config('app.book_all_lagos_cost');
                    break;
                default:
                    $this->amount = $bookCost + (int)config('app.book_all_not_lagos_cost');
                    $this->shipping = (int)config('app.book_all_not_lagos_cost');
                    break;
            }
        }
        else
        {
            $bookCost = ((int)$quantity * (int)config('app.book2_cost'));
            $this->cost = (int)config('app.book2_cost');

            //For Book 2
            switch ($location)
            {
                case "Lagos":
                    $this->amount = $bookCost + (int)config('app.book2_lagos_cost');
                    $this->shipping = (int)config('app.book2_lagos_cost');
                    break;
                default:
                    $this->amount = $bookCost + (int)config('app.book2_not_lagos_cost');
                    $this->shipping = (int)config('app.book2_not_lagos_cost');
                    break;
            }
        }
    }

    public function freeShipping($book, $quantity, $location)
    {
        //Process for free shipping for Lagos delivery
        if($book == "Your_Bussiness_Legal_Companion")
        {
            $bookCost = ((int)$quantity * (int)config('app.book1_cost'));
            $this->cost = (int)config('app.book1_cost');

            //For Book 1
            switch ($location)
            {
                case "Lagos":
                    $this->amount = $bookCost + 0;
                    $this->shipping = 0;
                    break;
                default:
                    $this->amount = $bookCost + (int)config('app.book1_not_lagos_cost');
                    $this->shipping = (int)config('app.book1_not_lagos_cost');
                    break;
            }
        }
        elseif($book == "all_books")
        {
            $bookCost = ((int)$quantity * (int)config('app.book_all_cost'));
            $this->cost = (int)config('app.book_all_cost');

            //For Book 1
            switch ($location)
            {
                case "Lagos":
                    $this->amount = $bookCost + 0;
                    $this->shipping = 0;
                    break;
                default:
                    $this->amount = $bookCost + (int)config('app.book_all_not_lagos_cost');
                    $this->shipping = (int)config('app.book_all_not_lagos_cost');
                    break;
            }
        }
        else
        {
            $bookCost = ((int)$quantity * (int)config('app.book2_cost'));
            $this->cost = (int)config('app.book2_cost');

            //For Book 2
            switch ($location)
            {
                case "Lagos":
                    $this->amount = $bookCost + 0;
                    $this->shipping = 0;
                    break;
                default:
                    $this->amount = $bookCost + (int)config('app.book2_not_lagos_cost');
                    $this->shipping = (int)config('app.book2_not_lagos_cost');
                    break;
            }
        }
    }

    public function getShippingByDate()
    {
        if(date_create("2021-08-22") < date_create("2021-09-10"))
        {
            $this->shipping = 0;
        }
        else{
            $this->shipping = 1;
        }
    }

    public function storePayment($name, $address, $quantity, $location, $item)
    {
        Payment::create(
            [
            'name' => $name,
            'email' => $this->email,
            'address' => $address,
            'quantity' => $quantity,
            'location' => $location,
            'amount' => $this->amount,
            'item' => $item,
            'cost' => $this->cost,
            'shipping' => $this->shipping,
        ]);
    }

    public function makePayment()
    {
        //Check if payment link exist
        $payment_exist = Payment::where('email', $this->email)->where('status', 0)->first();

        if(!$payment_exist)
        {
            $code = 404;
            $source = "Payment Data Error";
            return view('pages.payment.paymentfailed', compact('code', 'source'));
        }

        return $this->callPaystack($payment_exist->id);
    }

    public function callPaystack($id)
    {
        //Use paystack to pay
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => env('PAYSTACK_INITIALIZE'),
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS => json_encode([
                'amount'=>$this->amount*100,
                'email'=>$this->email,
            ]),
            CURLOPT_HTTPHEADER => [
                "authorization: ".env('PAYSTACK_BEARER_TOKEN'),
                "content-type: application/json",
                "cache-control: no-cache"
            ],
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        if($err){
            // there was an error contacting the Paystack API
            die('Curl returned error: ' . $err);
        }

        $tranx = json_decode($response, true); //true:associative array
        
        if(!$tranx)
        {
            print_r('API returned error: Incomplete data object received');
            exit();
        }

        if(!$tranx['status']){
            // there was an error from the API
            print_r('API returned error: ' . $tranx['message']);
            exit();
        }

        $authorization_url = $tranx['data']['authorization_url'];
        $access_code = $tranx['data']['access_code'];
        $this->reference = $tranx['data']['reference'];

        if(!$tranx['status']){
            // there was an error from the API
            print_r('API returned error: ' . $tranx['message']);
        }

        $this->updatePaymentEntry($id, $this->email, $this->reference, $this->amount, 0);

        header('Location: ' . $tranx['data']['authorization_url']);
        exit();
    }

    public function updatePaymentEntry($id, $email, $reference, $amount, $status)
    {
        Payment::where('id', $id)->update(['email' => $email, 'reference' => $reference, 'amount' => $amount, 'status' => $status]);
    }

    public function paystackcallback(Request $request)
    {
        $curl = curl_init();
        $reference = $request->get('reference');

        curl_setopt_array($curl, array(
            CURLOPT_URL => env('PAYSTACK_CALLBACK'). rawurlencode($reference),
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_HTTPHEADER => [
                "accept: application/json",
                "authorization: ".env('PAYSTACK_BEARER_TOKEN'),
                "cache-control: no-cache"
            ],
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        if($err){
            // there was an error contacting the Paystack API
            die('Curl returned error: ' . $err);
        }

        $tranx = json_decode($response);

        if(!$tranx->status){
            // there was an error from the API
            die('API returned error: ' . $tranx->message);
        }

        if('success' == $tranx->data->status){
            //Final update
            $Paystackamount = $tranx->data->amount/100;

            //check if updated
            $checkUpdated = Payment::where('reference', $request->get('reference'))->first();
            if($checkUpdated->amount == $Paystackamount){
                //Update payment to confirmed
                $this->updatePaymentEntry($checkUpdated->id, $checkUpdated->email, $checkUpdated->reference, $checkUpdated->amount, 1);

                //Return User Data Invoice
                $invoice = Payment::where('reference', $request->get('reference'))->first();

                //Return View
                return view('pages.payment.paymentsuccess', compact('invoice'));
            }
            else{
                return redirect()->route('paymentfailed');
            }
        }
    }

    public function paymentsuccess()
    {
        return view('pages.payment.paymentsuccess');
    }    

    public function paymentfailed()
    {
        return view('pages.payment.paymentfailed');
    }

}
