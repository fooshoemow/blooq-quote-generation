<?php

namespace App\Http\Controllers;

use App\Http\Requests\QuoteAddLineItemRequest;
use App\Http\Requests\QuoteDeleteRequest;
use App\Http\Requests\QuoteUpdateRequest;
use App\Http\Requests\StoreQuoteRequest;
use App\Models\Client;
use App\Models\LineItem;
use App\Models\Quote;
use App\Models\User;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;
use Symfony\Component\HttpFoundation\Request;

class ApiController extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    public function quoteCreateSubmit(StoreQuoteRequest $request) {
        $quoteDetails = $request->all();

        $client = Client::query()
            ->where('name', $quoteDetails['client_name'])
            ->where('contact_name', $quoteDetails['contact_name'])
            ->where('contact_email', $quoteDetails['contact_email'])
            ->firstOrCreate([
                'name' => $quoteDetails['client_name'],
                'contact_name' => $quoteDetails['contact_name'],
                'contact_email' => $quoteDetails['contact_email'],
            ]);
        $client->save();

        $quoteDetails['client_id'] = $client->id;
        $quoteDetails['status_id'] = 1;

        $quote = new Quote($quoteDetails);
        $quote->save();

        return redirect()->route('quote-view')->with('message', 'Quote Created Successfully');
    }


    public function quoteUpdate(QuoteUpdateRequest $request)
    {
        $quote = Quote::findOrFail($request->id);
        $quote->update($request->validated());
        return response()->json($quote);
    }

    public function quoteDelete(QuoteDeleteRequest $request)
    {
        $quote = Quote::findOrFail($request->id);
        $quote->delete();
        return response()->json(null, 204);
    }

    public function quoteAddLineItem(QuoteAddLineItemRequest $request)
    {
        $lineItem = LineItem::create($request->validated());
        return response()->json($lineItem, 201);
    }
}
