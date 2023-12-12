<?php

namespace Master;

class Menu
{
    public function topMenu()
    {
        $base = "http://localhost/guru/myappupdate/index.php?target=";
        $data = [
            array('text' => 'Home', 'link' => $base . 'home'),
            array('text' => 'Data', 'link' => $base . 'data'),
            array('text' => 'Admin', 'link' => $base . 'admin'),
            array('text' => 'Absensi', 'link' => $base . 'absensi')
        ];
        return $data;
    }
}
