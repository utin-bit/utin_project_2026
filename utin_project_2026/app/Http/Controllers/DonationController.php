<?php

namespace App\Http\Controllers;

use App\Models\Donation;
use App\Models\Campaign;   // ← tambah ini!
use Illuminate\Http\Request;

class DonationController extends Controller
{
    public function index()
    {
        $donations = Donation::with('campaign')->get();
        return view('donation.index', compact('donations'));
    }

    public function create()
    {
        $campaigns = Campaign::all();
        return view('donation.create', compact('campaigns'));
    }

    public function store(Request $request)
    {
        Donation::create([
            'campaign_id' => $request->campaign_id,
            'donor_name'  => $request->donor_name,
            'amount'      => $request->amount,
            'message'     => $request->message,
        ]);

        return redirect('/donation')->with('success', 'Donasi berhasil dikirim!');
    }

    // sisanya biarin kosong dulu
    public function show(Donation $donation) {}
    public function edit(Donation $donation) {}
    public function update(Request $request, Donation $donation) {}
    public function destroy(Donation $donation) {}
}