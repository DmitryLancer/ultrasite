<?php

namespace controller;

class Controller
{
    public function cleanParameters($value)
    {
        if (empty($_POST[$value])) {
            return false;
        }
        return filter_var(trim($_POST[$value]), FILTER_SANITIZE_STRING);
    }
}