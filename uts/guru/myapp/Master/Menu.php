<?php

namespace Master;

class Menu
{
    public function topMenu()
    {
        $base = "http://localhost/absensi/myapp/index.php?target=";
        $data = [
            array('text' => 'Home', 'link' => $base . 'home'),
            array('text' => 'Admin', 'link' => $base . 'Admin'),
            array('text' => 'guru', 'link' => $base . 'guru'),
            array('text' => 'SIAbsensi', 'link' => $base . 'SiAbsensi')
        ];
        return $data;
    }
}
