<?php

use App\Services\CartService;

if (!function_exists('calcpercent')){
    function calcpercent(int|float $totalPrice, int|float $discountAmount): int
    {
        return $discountAmount / $totalPrice * 100;
    }
}

if (!function_exists('activeSort')){
    function activeSort(string $type): ?string
    {
        $request = request();

        $default = 'newest';

        if (!$request->filled('sort')){

            if ($type == $default){
                return 'text-blue-500';
            }

            return 'text-gray-400';

        }

        return $request->input('sort') == $type ? 'text-blue-500' : 'text-gray-400';
    }
}

if (!function_exists('generateSortRouteParameter')){
    function generateSortRouteParameter(string $type): ?array
    {
        $request = request();

        $queries = $request->all();

        $queries['sort'] = $type;

        return $queries;
    }
}

if (!function_exists('getUserFullName')){
    function getUserFullName(): string
    {
        return auth()->user()->first_name . ' ' . auth()->user()->last_name;
    }
}

if (!function_exists('activeAccountSidebar')){
    function activeAccountSidebar(string $routeName): string
    {
        if (\Illuminate\Support\Facades\Route::currentRouteName() == $routeName){
            return 'bg-blue-500/10 text-blue-500';
        }

        return 'hover:text-blue-500';
    }
}

if (!function_exists('getUserCartCount')){
    function getUserCartCount(): int
    {
        return CartService::getCount();
    }
}
