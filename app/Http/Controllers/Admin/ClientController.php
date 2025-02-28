<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Order;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $clients = User::latest()->paginate(8);
        return view('dashboard.clients.index', compact('clients'));
    }


    public function show(string $id)
    {
        $client = User::with('orders')->find($id);
        if (!$client) {
            return abort(404, 'User not found');
        }
        $orders = $client->orders; // Get all orders of this user
      

        return view('dashboard.clients.show', compact('client', 'orders'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
