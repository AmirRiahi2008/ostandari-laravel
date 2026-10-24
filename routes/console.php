<?php

use App\Models\OtpChallenge;
use Illuminate\Support\Facades\Schedule;
use Laravel\Sanctum\PersonalAccessToken;

Schedule::call(function () {
    OtpChallenge::where('expires_at', '<', now()->subDay())->delete();
    PersonalAccessToken::where('expires_at', '<', now()->subDay())->delete();
})->daily()->name('portal-prune-auth');
