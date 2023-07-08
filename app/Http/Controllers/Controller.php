<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreQuoteRequest;
use App\Models\Client;
use App\Models\Quote;
use App\Models\User;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;
use Symfony\Component\HttpFoundation\Request;

class Controller extends BaseController
{
//    TODO: Properly manage the currencies like in the spec
    use AuthorizesRequests, ValidatesRequests;

    public function welcome() {
        return Inertia::render('Index');
    }

    public function login(Request $request) {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->intended('');
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }

    public function logout() {
        Auth::logout();

        return redirect()->to(url('home'));
    }

    public function home() {
        return Inertia::render('Main', ['user' => Auth::user()]);
    }

    public function quoteView() {
        $quotes = Quote::with('client', 'status')
            ->orderBy('created_at', 'desc')
            ->get()
            ->map(function ($quote) {
                return [
                    'id' => $quote->id,
                    'number' => $quote->number,
                    'title' => $quote->title,
                    'client_name' => $quote->client->name,
                    'contact_name' => $quote->client->contact_name,
                    'total' => $quote->lineItems->sum('total'),
                    'currency' => $quote->currency,
                    'status' => $quote->status->name,
                    'created_at' => $quote->created_at->format('M d, Y'),
                ];
            });

        return Inertia::render('Quote-View', [
            'quotes' => $quotes,
        ]);
    }

    public function quoteCreate() {
        return Inertia::render('Quote-Creation', [
            'user' => Auth::user(),
            'currencies' => collect(config('currencies'))->pluck('code')->toArray(),
        ]);
    }

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

    public function quoteEdit($id) {
        return Inertia::render('Quote-Edit', [
            'user' => Auth::user(),
            'quote' => Quote::query()->with('client', 'status', 'lineItems')->find($id),
            'currencies' => collect(config('currencies'))->pluck('code')->toArray(),
        ]);
    }
}
