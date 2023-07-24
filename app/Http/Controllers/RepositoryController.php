<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Http;

class RepositoryController extends Controller
{
    public function index() {
        $response = Http::get('https://api.github.com/search/repositories?q=git');
        $data = json_decode($response->body(), true);
        $repositories = $data['items'] ?? [];
        $repositoryCollection = Collection::make($repositories);
        return view('admin.repository.index')->with([
            'data' => $repositoryCollection
        ]);
    }
}
