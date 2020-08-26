<?php

function session_true()
{
    $ci = &get_instance();
    $session_result = $ci->session->userdata('user_id');
    if ($session_result) {
        redirect('home/index');
    }
}
function session_false()
{
    $ci = &get_instance();
    $session_result = $ci->session->userdata('user_id');
    if (!$session_result) {
        redirect('auth/login');
    }
}
function point($value)
{
    $result = number_format($value, 0, ',', '.');
    return $result;
}
