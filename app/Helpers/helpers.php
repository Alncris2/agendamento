<?php

function noCache(string $fileDir): string
{
    $dir = public_path().$fileDir;

    if (file_exists($dir)) {
        return $fileDir.'?v'.filesize($dir);
    }

    return $fileDir;
}
