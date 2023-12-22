<?php

namespace App\Http\Controllers\Api;

use App\Exceptions\LinkAlreadyExistsException;
use App\Http\Controllers\Controller;
use App\Http\Requests\AddLinkRequest;
use App\Http\Services\LinkService;
use App\Models\Link;
use Illuminate\Http\Request;

class LinkController extends Controller
{

    public function index(Request $request)
    {
        $links = LinkService::getLinks($request->user()->id);

        return $links;
    }

    public function store(AddLinkRequest $request)
    {
        $longUrl = $request->validated('longUrl');

        $oldLink = LinkService::getLinkByLongUrl($longUrl, $request->user()->id);

        if (!is_null($oldLink)) {
            throw (new LinkAlreadyExistsException());
        }

        $link = LinkService::createLink($longUrl, $request->user()->id);
        return [
            'status' => 'success',
            'shortUrl' => route('links.show', ['link' => $link]),
            'link' => $link,
        ];
    }

    public function remove(Link $link)
    {
        LinkService::deleteLink($link->id);
        return [
            'status' => 'success',
            'message' => 'Short link is deleted',
        ];
    }

}
