<?php

use App\Notifications\SendTweetEmail;
use App\Tweet;
use Illuminate\Foundation\Inspiring;

/*
|--------------------------------------------------------------------------
| Console Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of your Closure based console
| commands. Each Closure is bound to a command instance allowing a
| simple approach to interacting with each command's IO methods.
|
 */

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->describe('Display an inspiring quote');

Artisan::command('tweet {title} {body}', function () {
    Auth::loginUsingId(1);

    $tweet = new Tweet();

    $tweet->title = $this->argument("title");
    $tweet->body = $this->argument("body");

    $tweet->save();

    $email = new SendTweetEmail($tweet);

    Auth::user()->notify($email);
})->describe('Send Email Notification on new Tweet');
