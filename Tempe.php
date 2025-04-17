<?php

class Tempe {

    public $section = [];
    public $currentSection;
    public $extendView;

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
        include_once(__DIR__ . '/' . $this->extendView . '.php');
    }

    public function extend($f)
    {
        $this->extendView = $f;
    }

}
