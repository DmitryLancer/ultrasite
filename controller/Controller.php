<?php

namespace controller;

class Controller
{
    public function cleanParameters($value)
    {
        return filter_var(trim($_POST[$value]), FILTER_SANITIZE_STRING);
    }
}