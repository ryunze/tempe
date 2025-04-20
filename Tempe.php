<?php

ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

class Tempe {

    public $section = [];
    public $currentSection;
    public $extend = [];

    public function render($s)
    {
        return $this->section[$s];
    }

    public function section($s)
    {
        $this->currentSection = $s;
        ob_start();
        ob_flush();
    }

    public function endsection()
    {
        $currentSection = $this->currentSection;
        $this->section[$currentSection] = ob_get_contents();
        ob_end_clean();
        extract($this->extend['data']);
        include_once(__DIR__ . '/../views/' . $this->extend['view'] . '.php');
    }

    public function extend($f, $data = [])
    {
        $this->extend['view'] = $f;
        $this->extend['data'] = $data;
    }

}
