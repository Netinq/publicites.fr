<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Intervention\Image\Facades\Image;
use App\Annonce;

class ImageController extends Controller
{
    function fetch_image($id)
    {
        $annonce = Annonce::where('id', $id)->first();
        $image = $annonce->image;
        $image_file = Image::make($image);
        $response = Response::make($image_file->encode('jpeg'));
        $response->header('Content-Type', 'image/jpeg');

        return $response;
    }
}
