<?php

namespace App\Http\Middleware;

use Closure;

class Localization
{

    /**
     * @param null|string $acceptLanguage
     * @return null|string
     */
    private function getLocale(?string $acceptLanguage): string
    {
        if (!empty($acceptLanguage)) {
            [$fullLocale, $locale] = preg_split('/,|;/', $acceptLanguage);
        } else {
            $locale = config('locale');
        }

        return $locale;
    }

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $locale = $this->getLocale($request->header('Accept-Language'));

        app()->setLocale($locale);

        return $next($request);
    }
}
