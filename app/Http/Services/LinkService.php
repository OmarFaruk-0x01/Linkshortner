<?php

namespace App\Http\Services;

use App\Models\Link;

class LinkService
{
    public static function getLinks(?int $userId = null, ?bool $isPaginate = false)
    {
        $query = Link::query();
        if (!is_null($userId)) {
            $query->where('user_id', $userId)->orderBy('created_at', 'desc');
        }

        if ($isPaginate) {
            return $query->paginate();
        }

        return $query->get();
    }

    public static function getLinkByLongUrl(string $longUrl, int $userId)
    {
        return Link::where('long_url', trim($longUrl))
            ->where('user_id', $userId)
            ->first();
    }

    public static function createLink(string $longUrl, int $userId, ?int $hashCount = 4, ?string $customHash = null)
    {
        $hash = $customHash ?? str()->random($hashCount);
        $link = Link::create([
            'long_url' => trim($longUrl),
            'hash' => $hash,
            'user_id' => $userId,
        ]);
        return $link;
    }

    public static function visitLink(string $hash)
    {
        $link = Link::where('hash', $hash)->first();
        $link->increment('clicks');
        return $link;
    }

    public static function deleteLink(int $id): bool
    {
        Link::find($id)->delete();
        return true;
    }

}
