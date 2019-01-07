<?php
function mime_content_type($filename)
{
    $idx = explode('.', $filename);
    $count_explode = count($idx);
    $idx = strtolower($idx[$count_explode - 1]);

    $mimet = array(

        // images
        'png' => 'image/png',
        'jpe' => 'image/jpeg',
        'jpeg' => 'image/jpeg',
        'jpg' => 'image/jpeg',
        'gif' => 'image/gif',
        'bmp' => 'image/bmp',
        'ico' => 'image/vnd.microsoft.icon',
        'tiff' => 'image/tiff',
        'tif' => 'image/tiff',
        'svg' => 'image/svg+xml',
        'svgz' => 'image/svg+xml',

        // audio/video
        'mp3' => 'audio/mpeg',
        'qt' => 'video/quicktime',
        'mov' => 'video/quicktime',
        'mp4' => 'video/mp4',
        'flv' => 'video/x-flv',

    );

    if (isset($mimet[$idx])) {
        return $mimet[$idx];
    } else {
        return 'application/octet-stream';
    }
}