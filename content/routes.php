<?php
use RealHero\Content\Models\Advert;

function imgPathToUrl(string $path) {
    return url(\Twig::parse("{{ '" . $path . "'|media }}"));
}

/**
 * Random advert.
 */
Route::get('randomadvert/{orientation}/placement/{placement}', function ($orientation, $placement) {
    // return $orientation . ' ' . $type;
    $advert = Advert::inRandomOrder()
        ->where('orientation', $orientation)
        ->where('placement', $placement)
        ->select('desktop_img', 'mobile_img', 'url')
        ->first();

    if (!empty($advert)) {
        $advert = $advert->toArray();

        return Response::json([
            'desktop_img'   => imgPathToUrl($advert['desktop_img']),
            'mobile_img'    => imgPathToUrl($advert['mobile_img']),
            'url'           => $advert['url'],
        ]);
    } else {
        return Response::json(['error' => 'true'], 404);
    }
});

/**
 * Specific advert by id advert.
 */
Route::get('advert/{id}', function ($id) {
    // return $orientation . ' ' . $type;
    $advert = Advert::where('id', $id)
        ->select('desktop_img', 'mobile_img', 'url')
        ->first();

    if (!empty($advert)) {
        $advert = $advert->toArray();
        
        return Response::json([
            'desktop_img'   => imgPathToUrl($advert['desktop_img']),
            'mobile_img'    => imgPathToUrl($advert['mobile_img']),
            'url'           => $advert['url'],
        ]);
    } else {
        return Response::json(['error' => 'true'], 404);
    }
});