<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Models\Currency;
use App\Http\Controllers\Controller;

class CurrencyController extends Controller
{
    /**
     * Store or update a currency.
     */
    public function storeOrUpdate(Request $request)
    {
        // Validate the incoming data
        $validated = $request->validate([
            'name'     => 'required|string|max:255',
            'code'     => 'required|string|max:10|unique:currencies,code,' . $request->id,
            'rate'     => 'required|numeric|min:0',
            'quantity' => 'required|integer|min:1',
        ]);

        // Check if an ID is provided for updating
        if ($request->id) {
            // Update the existing currency
            $currency = Currency::find($request->id);

            if (!$currency) {
                return response()->json(['message' => 'Currency not found'], 404);
            }

            $currency->update($validated);
            return response()->json(['message' => 'Currency updated successfully', 'currency' => $currency], 200);
        }

        // Create a new currency
        $currency = Currency::create($validated);

        return response()->json(['message' => 'Currency added successfully', 'currency' => $currency], 201);
    }

    /**
     * Get all currencies.
     */
    public function getAllCurrency()
    {
        $currencies = Currency::all();

        if ($currencies->isEmpty()) {
            return response()->json(['message' => 'No currencies found'], 404);
        }

        return response()->json(['currencies' => $currencies], 200);
    }

    /**
     * Get a specific currency by code.
     */
    public function getCurrencyByCode($code)
    {
        $currency = Currency::where('code', $code)->first();

        if (!$currency) {
            return response()->json(['message' => 'Currency not found'], 404);
        }

        return response()->json(['currency' => $currency], 200);
    }
}

