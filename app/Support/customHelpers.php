<?php

use Illuminate\Support\HtmlString;

if (! function_exists('mixOptional')) {
    /**
     * Get the path to a versioned Mix file.
     *
     * @param  string  $path
     * @param  string  $manifestDirectory
     * @return \Illuminate\Support\HtmlString
     */
    function mixOptional(string $path, $manifestDirectory = ''): string
    {
        try {
            return mix($path, $manifestDirectory);
        } catch (Exception $e) {
        }

        return new HtmlString("");
    }

}
