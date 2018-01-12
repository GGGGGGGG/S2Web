<?php

namespace App\Http\Controllers;

use App\Server;
use Illuminate\Http\Request;

class ServerController extends Controller
{
    public function show(Server $server)
    {
        return view('server.show')->with('server', $server);
    }

    public function index()
    {
        $servers = Server::all();
        return view('server.index')->with('servers', $servers);
    }
}
