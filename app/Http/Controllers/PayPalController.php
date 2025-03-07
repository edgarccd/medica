<?php

namespace App\Http\Controllers;

use PayPal\Auth\OAuthTokenCredential;
use PayPal\Rest\ApiContext;
use PayPal\Api\Payer;
use PayPal\Api\Item;
use PayPal\Api\ItemList;
use PayPal\Api\Amount;
use PayPal\Api\Transaction;
use PayPal\Api\RedirectUrls;
use PayPal\Api\Payment;
use PayPal\Api\PaymentExecution;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class PayPalController extends Controller
{
    private $apiContext;

    public function __construct()
    {
        $this->apiContext = new ApiContext(
            new OAuthTokenCredential(
                config('services.paypal.client_id'),
                config('services.paypal.secret')
            )
        );
        $this->apiContext->setConfig(config('services.paypal.settings'));
    }

    public function payWithPayPal()
    {
        $payer = new Payer();
        $payer->setPaymentMethod("paypal");

        $item = new Item();
        $item->setName('Producto de prueba')
            ->setCurrency('USD')
            ->setQuantity(1)
            ->setPrice(10);

        $itemList = new ItemList();
        $itemList->setItems([$item]);

        $amount = new Amount();
        $amount->setCurrency("USD")
            ->setTotal(10);

        $transaction = new Transaction();
        $transaction->setAmount($amount)
            ->setItemList($itemList)
            ->setDescription("Pago de prueba en Laravel con PayPal");

        $redirectUrls = new RedirectUrls();
        $redirectUrls->setReturnUrl(route('paypal.success'))
            ->setCancelUrl(route('paypal.cancel'));

        $payment = new Payment();
        $payment->setIntent("sale")
            ->setPayer($payer)
            ->setRedirectUrls($redirectUrls)
            ->setTransactions([$transaction]);

        try {
            $payment->create($this->apiContext);
            return redirect($payment->getApprovalLink());
        } catch (\Exception $ex) {
            return back()->withError("Hubo un error al procesar el pago.");
        }
    }

    public function successPayPal(Request $request)
    {
        if (empty($request->input('PayerID')) || empty($request->input('paymentId'))) {
            return redirect()->route('home')->withError('El pago fue cancelado.');
        }

        $payment = Payment::get($request->input('paymentId'), $this->apiContext);

        $execution = new PaymentExecution();
        $execution->setPayerId($request->input('PayerID'));

        try {
            $result = $payment->execute($execution, $this->apiContext);
            return redirect()->route('home')->withSuccess('Pago realizado correctamente.');
        } catch (\Exception $ex) {
            return redirect()->route('home')->withError('Hubo un error al procesar el pago.');
        }
    }

    public function cancelPayPal()
    {
        return redirect()->route('home')->withError('El pago fue cancelado.');
    }
}
