<?php

function flashBack($message = "با <b>موفقیت</b> انجام شد.", $route = null)
{
    session()->flash('flash', $message);
    if ($route) {
        return redirect()->route($route);
    }
    return back();
}

function toRial($price)
{
    return $price * 10;
}