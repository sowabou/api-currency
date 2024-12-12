<?php

// app/Http/Controllers/OperationController.php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Models\Operation;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;

class OperationController extends Controller
{
    // Add a new operation
    public function addOperation(Request $request)
    {
        // Validate the request input
        $validator = Validator::make($request->all(), [
            'nom_prenom' => 'required|string|max:255',
            'npp_nni' => 'required|string|max:50',
            'nationalite' => 'required|string|max:100',
            'destination' => 'required|string|max:100',
            'motif_voyage' => 'nullable|string|max:255',
            'num_billet' => 'nullable|numeric',
            'residence' => 'required|string|max:255',
            'devise_code' => 'required|numeric',
            'nature' => 'required|string|max:50',
            'montant' => 'required|numeric',
            'cours' => 'required|numeric',
            'cv_en_num' => 'required|numeric',
            'commission' => 'required|numeric',
            'net_a_payer' => 'required|numeric',
            'date_operation' => 'required|date',
        ]);

        if ($validator->fails()) {
            return response()->json(['status' => 'error', 'errors' => $validator->errors()], 400);
        }

        // Create a new operation
        $operation = Operation::create($request->all());

        return response()->json(['status' => 'success', 'operation' => $operation], 201);
    }

    // Get all operations
    public function getAllOperations()
    {
        $operations = Operation::all();

        return response()->json(['status' => 'success', 'operations' => $operations], 200);
    }

    // Get operation by ID
    public function getOperationById($id)
    {
        $operation = Operation::find($id);

        if (!$operation) {
            return response()->json(['status' => 'error', 'message' => 'Operation not found'], 404);
        }

        return response()->json(['status' => 'success', 'operation' => $operation], 200);
    }
}
