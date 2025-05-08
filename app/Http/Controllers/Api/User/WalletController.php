<?php

namespace App\Http\Controllers\Api\User;

use App\Http\Controllers\Controller;
use App\Models\Transaction;
use App\Models\Wallet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class WalletController extends Controller
{
    /**
     * Fetches wallet transactions for a user.
     * 
     * @param int $user_id The ID of the user
     * @return \Illuminate\Http\Response
     */
    public function walletTransactions($user_id) 
    {
        // Fetch all wallet transactions for the user
        $transactions = Transaction::with(['fromUser' => function ($query) {
            $query->select('id', 'email', 'name');
        }, 'toUser' => function ($query) {
            $query->select('id', 'email', 'name');
        }])->where('from_user_id', $user_id)->latest()->get();
        // Fetch the wallet balance for the user
        $walletBalance = Wallet::where('user_id', $user_id)->first();
        // Return a JSON response with wallet information including transactions and balance
        return $this->rtrResponse(200, 'wallet info', [$transactions, $walletBalance]);
    }

    /**
     * Validates the request data.
     * 
     * @param mixed $request The request data
     * @param array $validationInputs The validation rules
     * @param array $validationError The custom error messages
     * @return \Illuminate\Http\Response|null
     */
    public function validation($request, $validationInputs, $validationError=[]) 
    {
        // Validate the request data using Laravel Validator
        $validation = Validator::make($request->all(), $validationInputs, $validationError);
        // If validation fails, return a JSON response with validation errors
        if ($validation->fails()) {
            return $this->rtrResponse(400, 'Validation failed', $validation->errors());
        }
        // Return null if validation passes
        return null;
    }

    /**
     * Constructs a JSON response.
     * 
     * @param int|null $code The status code
     * @param string|null $message The message
     * @param mixed|null $data The data
     * @return \Illuminate\Http\JsonResponse
     */
    public function rtrResponse($code=null, $message=null, $data=null) 
    {
        // Construct a JSON response with status code, message, and data
        $response = [
            'code' => $code,
            'message' => $message,
            'data' => $data,
        ];
        // Return the JSON response
        return response()->json($response, $code);
    }
}
