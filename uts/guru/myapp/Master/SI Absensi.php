<?php

namespace Master;

use Config\Query_builder;

class SIAbsensi
{
    private $db;
    public function __construct($con)
    {
        $this->db = new query_builder($con);
    }
    public function index()
    {
        return $data = $this->db->table('SIAbsensi')->get()->resultArray();
    }
}