<?php

namespace App\Classes;

use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Spatie\MediaLibrary\Support\PathGenerator\DefaultPathGenerator;
use Spatie\MediaLibrary\Support\PathGenerator\PathGenerator;

class SpatiePathGenerator extends DefaultPathGenerator implements PathGenerator
{
    protected function getBasePath(Media $media): string
    {
        $prefix = config('media-library.prefix', '');

        if ($prefix !== '') {
            return $prefix . '/' . $media->collection_name . '/' . $media->getKey();
        }

        return $media->collection_name . '/' . $media->getKey();
    }
}
