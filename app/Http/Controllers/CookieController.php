<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Str;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

use function PHPSTORM_META\map;

class CookieController extends Controller
{
    readonly string $COOKIE_NAME;

    public function __construct()
    {
        $this->COOKIE_NAME = 'PRODUCT_COOKIE';
    }

    private function build_cart_str($id): string
    {
        $cookie_str = Cookie::get($this->COOKIE_NAME);
        $cookie_str_arr = explode(',', $cookie_str);
        if (!in_array($id, $cookie_str_arr) && count($cookie_str_arr) > 0 && $cookie_str) {
            $cookie_str_arr[] = $id;
            return implode(',', $cookie_str_arr);
        }

        return $id;
    }

    private function remove_from_cart($id_to_remove): string
    {
        $cookie_str = Cookie::get($this->COOKIE_NAME);
        $cookie_str_arr = explode(',', $cookie_str);
        $cookie_str_arr = array_filter($cookie_str_arr, function ($id) use ($id_to_remove) {
            return $id !== $id_to_remove;
        });
        return implode(',', $cookie_str_arr);
    }

    public function add_product_to_cart($id)
    {
        return redirect()->route(
            'post-by-id',
            ['id' => $id, 'added-to-card' => true]
        )->cookie($this->COOKIE_NAME, $this->build_cart_str($id));
    }

    public function remove_product_from_cart($id)
    {
        return redirect()->route(
            'post-by-id',
            ['id' => $id, 'removed-from-card' => true]
        )->cookie($this->COOKIE_NAME, $this->remove_from_cart($id));
    }

    public function see_products_in_cart()
    {
        $cookie_str = Cookie::get($this->COOKIE_NAME);
        $cookie_str_arr = explode(',', $cookie_str);
        // return $cookie_str_arr;

        return view('posts', [
            'posts' => DB::table('posts')->whereIn('id', array_map('intval', $cookie_str_arr))->paginate(10),
            'cart_posts' => true
        ]);
    }
}
