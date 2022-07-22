<?php

namespace App\Http\Controllers;

use App\Models\Ad;
use App\Models\Category;
use Illuminate\Http\Request;

class AdvertisementController extends Controller
{
    /**
     * Get Ads with category and tag filters
     *
     * @param Request $request
     *
     * @return array
     */
    public function showAdsWithCriteria(Request $request)
    {
        $categoryFilter = $request->get('category') ?? null;
        $tagFilter = $request->get('tag') ?? null;

        $category = Category::where('name', $categoryFilter)->first();
        $categoryId = $category ? $category->id : null;

        $ads = [];
        $advertisements = null;
        if($categoryId) {
            $advertisements = Ad::where('category', $categoryId);
        }

        if($tagFilter) {
            $advertisements = $advertisements
                ? $advertisements->where('tags', 'LIKE', '%' . $tagFilter . '%')
                : Ad::where('tags', 'LIKE', '%' . $tagFilter . '%');
        }

        if(!$advertisements) {
            $advertisements = Ad::all();
        } else {
            $advertisements = $advertisements->get();
        }

        foreach ($advertisements as $advertisement) {
            $ads[] = $advertisement;
        }

        return $ads;
    }
}
