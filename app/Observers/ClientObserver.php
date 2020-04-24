<?php

namespace App\Observers;

use Illuminate\Support\Str;
use App\Models\Client;

class ClientObserver
{
    /**
     * Handle the client "creating" event.
     *
     * @param  \App\Models\Client  $client
     * @return void
     */
    public function creating(Client $client)
    {
        $client->uuid = Str::uuid();
    }
}
