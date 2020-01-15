<?php

namespace App\Http\Controllers\Site;

use Cart;
use Stripe\Stripe;
use Stripe\Customer;
use Stripe\Charge;
use App\Models\Order;
use Illuminate\Http\Request;
use App\Services\PayPalService;
use App\Contracts\OrderContract;
use App\Http\Controllers\Controller;

class CheckoutController extends Controller
{
    protected $payPal;

    protected $orderRepository;

    public function __construct(OrderContract $orderRepository, PayPalService $payPal)
    {
        $this->payPal = $payPal;
        $this->orderRepository = $orderRepository;
    }

    public function getStripe()
    {
        return view('site.pages.checkout.stripe');
    }

    public function placeStripe(Request $request)
    {

        // Before storing the order we should implement the
        // request validation which I leave it to you
        $order = $this->orderRepository->storeOrderDetails($request->all());

        // You can add more control here to handle if the order is not stored properly
      
              try {
         Stripe::setApiKey(env('STRIPE_SECRET'));

          $customer = Customer::create(array(
        'email' => $request->stripeEmail,
        'source' => $request->stripeToken
    ));

    $charge = Charge::create(array(
        'customer' => $customer->id,
        'amount' => Cart::getSubTotal() * 100,
        'currency' => 'eur'
    ));

    Cart::clear();

    return redirect()->route('checkout.cart')->with('message','votre payement est accepté merci pour votre achat, un mail est envoyé');

  } catch (\Exception $ex) {
    return $ex->getMessage();

}
    }

    public function getCheckout()
    {
        return view('site.pages.checkout');
    }

    public function placeOrder(Request $request)
    {
        // Before storing the order we should implement the
        // request validation which I leave it to you
        $order = $this->orderRepository->storeOrderDetails($request->all());

        // You can add more control here to handle if the order is not stored properly
        if ($order) {
            $this->payPal->processPayment($order);
        }

        return redirect()->back()->with('message','Order not placed');
    }

    public function complete(Request $request)
    {
        $paymentId = $request->input('paymentId');
        $payerId = $request->input('PayerID');

        $status = $this->payPal->completePayment($paymentId, $payerId);

        $order = Order::where('order_number', $status['invoiceId'])->first();
        $order->status = 'processing';
        $order->payment_status = 1;
        $order->payment_method = 'PayPal -'.$status['salesId'];
        $order->save();

        Cart::clear();
        return view('site.pages.success', compact('order'));
    }
}
