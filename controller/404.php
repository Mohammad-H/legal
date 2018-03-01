<?php
class _404 extends Controller {

    public static function index()
    {
        header('HTTP/1.1 404 Not Found');
        header("Status: 404 Not Found");

        $data = array();
        parent::view('page404/index', $data);
    }
}