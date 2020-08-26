<?php

function session_true()
{
    $ci = &get_instance();
    $session_result = $ci->session->userdata('id');
    if ($session_result) {
        redirect('admin/index');
    }
}
function session_false()
{
    $ci = &get_instance();
    $session_result = $ci->session->userdata('id');
    if (!$session_result) {
        redirect('auth/login');
    }
}
function rupiah($value)
{
    $result = "Rp " . number_format($value, 0, ',', '.');
    return $result;
}
