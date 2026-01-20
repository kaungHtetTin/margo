<?php

if (!function_exists('localized_route')) {
    /**
     * Generate a localized route URL.
     *
     * @param string $name
     * @param array $parameters
     * @param string|null $locale
     * @return string
     */
    function localized_route($name, $parameters = [], $locale = null)
    {
        $locale = $locale ?? app()->getLocale();
        
        // Ensure locale is in parameters
        if (!isset($parameters['locale'])) {
            $parameters = array_merge(['locale' => $locale], $parameters);
        } else {
            $parameters['locale'] = $locale;
        }
        
        return route($name, $parameters);
    }
}
