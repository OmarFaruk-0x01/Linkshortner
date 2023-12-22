<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Http\Requests\AddLinkRequest;
use App\Http\Services\LinkService;
use App\Models\Link;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class LinkController extends Controller
{

    public function index(Request $request)
    {
        if (auth()->check()) {
            $links = LinkService::getLinks($request->user()->id);
        } else {
            $links = [];
        }

        return view('pages.index', compact('links'));
    }

    public function store(AddLinkRequest $request)
    {
        $longUrl = $request->validated('longUrl');
        $link = LinkService::createLink($longUrl, $request->user()->id);

        $shortUrl = route('links.show', ['link' => $link]);

        return back()->withInput(['shortUrl' => $shortUrl]);
    }

    public function show(Link $link)
    {
        $link = LinkService::visitLink($link->hash);
        return Redirect::to($link->long_url);
    }

    public function remove(int $id)
    {
        LinkService::deleteLink($id);
        return back();
    }

}
