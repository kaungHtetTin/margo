<?php

if (!function_exists('storage_url')) {
    /**
     * Generate a storage URL using STORAGE_LINK from .env
     *
     * @param string|null $path
     * @return string
     */
    function storage_url($path = null)
    {
        if (empty($path)) {
            return env('STORAGE_LINK', '');
        }

        $storageLink = env('STORAGE_LINK', '');
        
        // Remove trailing slash from STORAGE_LINK if exists
        $storageLink = rtrim($storageLink, '/');
        
        // Remove leading slash from path if exists
        $path = ltrim($path, '/');
        
        return $storageLink . '/' . $path;
    }
}
