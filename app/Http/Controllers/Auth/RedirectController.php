<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class RedirectController extends Controller
{
    public function dashboard()
    {
        $role = auth()->user()->role;

        return match ($role) {
            'admin'    => redirect()->route('admin.index'),
            'afiliado' => redirect()->route('afiliado.index'),
            default    => redirect()->route('cliente.index'),
        };
    }
}