<?php

namespace Master;

use Config\Query_builder;

class absensi
{
    private $db;

    public function __construct($con)
    {
        $this->db = new Query_builder($con);
    }

    public function index()
    {
        $absensi = $this->db->table('absensi')->get()->resultArray();
        $res = ' <a href="?target=absensi&act=tambah_absensi" class="btn btn-info btn-sm">Tambah absensi</a>
    <br><br>

    <div class="table-responsive">
        <table class="table table-striped">
            <thead class="table-primary">
                <tr>
                    <th>no</th>
                    <th>nama</th>
                    <th>ttl</th>
                    <th>jk</th>
                    <th>tmt</th>
                    <th>act</th>
                </tr>
            </thead>
            <tbody>';
        $no = 1;
        foreach ($absensi as $r) {
            $res .= '<tr>
                    <td width="300">' . $no . '</td>
                    <td width="200">' . $r['nama'] . '</td>
                    <td>' . $r['ttl'] . '</td>
                    <td>' . $r['jk'] . '</td>
                    <td>' . $r['tmt'] . '</td>
                    <td width="150">
                        <a href="?target=absensi&act=edit_absensi&id=' . $r['nama'] . '" class="btn btn-success btn-sm">
                            Edit
                        </a>
                        <a href="?target=absensi&act=delete_absensi&id=' . $r['nama'] . '" class="btn btn-danger btn-sm">
                            Hapus
                        </a>
                    </td>
                </tr>';
            $no++;
        }
        $res .= '</tbody></table></div>';
        return $res;
    }

    public function tambah()
    {
        $res = '<a href="?target=absensi" class="btn btn-danger btn-sm">Kembali</a><br><br>';
        $res .= '<form action="?target=absensi&act=simpan_absensi" method="post">
                    <div class="mb-3">
                        <label for="nama" class="form-label">nama</label>
                        <input type="text" class="form-control" id="nama" name="nama">
                    </div>
                    <div class="mb-3">
                        <label for="ttl" class="form-label">ttl</label>
                        <input type="text" class="form-control" id="ttl" name="ttl">
                    </div>
                    <div class="mb-3">
                            <label for="jk" class="form-label">jk</label>
                            <br>
                            <div class="form-check-inline">
                                <input type="radio" class="form-check-input" name="jk" id="alamat1" value="1">
                                <label for="jk1" class="form-check-label">
                                    L
                                </label>
                            </div>
                            <div class="form-check-inline">
                                <input type="radio" class="form-check-input" name="jk" id="jk0" value="0">
                                <label for="jk0" class="form-check-label">
                                    P
                                </label>
                            </div>
                        </div>
                    <div class="mb-3">
                        <label for="tmt" class="form-label">tmt</label>
                        <input type="text" class="form-control" id="tmt" name="tmt">
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </form>';
        return $res;
    }

    public function simpan()
    {
        $nama= $_POST['nama'];
        $ttl = $_POST['ttl'];
        $jk = $_POST['jk'];
        $tmt = $_POST['tmt'];

        $absensi = array(
            'nama' => $nama,
            'ttl' => $ttl,
            'jk' => $jk,
            'tmt' => $tmt,
        );
        return $this->db->table('absensi')->insert($absensi);
    }

    public function edit($id)
    {
        $r = $this->db->table('absensi')->where("nama='$id'")->get()->rowArray();

        $res = '<a href="?target=absensi" class="btn btn-danger btn-sm">Kembali</a><br><br>';
        $res .= '<form action="?target=absensi&act=simpan_absensi" method="post">
                    <div class="mb-3">
                        <label for="nama" class="form-label">nama</label>
                        <input type="text" class="form-control" id="nama" name="nama">
                    </div>
                    <div class="mb-3">
                        <label for="ttl" class="form-label">ttl</label>
                        <input type="text" class="form-control" id="ttl" name="ttl">
                    </div>
                    <div class="mb-3">
                    <label for="jk" class="form-label">jk</label>
                    <br>
                    <div class="form-check-inline">
                        <input type="radio" class="form-check-input" name="jk" id="alamat1" value="1">
                        <label for="jk1" class="form-check-label">
                            L
                        </label>
                    </div>
                    <div class="form-check-inline">
                        <input type="radio" class="form-check-input" name="jk" id="jk0" value="0">
                        <label for="jk0" class="form-check-label">
                            P
                        </label>
                    </div>
                </div>
            <div class="mb-3">
                <label for="tmt" class="form-label">tmt</label>
                <input type="text" class="form-control" id="tmt" name="tmt">
                </div>
            </div>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </form>';
        return $res;
    }
    public function cekRadio($val1, $val2)
    {
        if ($val1 == $val2) {
            return "checked";
        }
        return "";
    }

    public function update()
    {
        $param = $_POST['param'];
        $nama = $_POST['nama'];
        $ttl = $_POST['ttl'];
        $jk = $_POST['jk'];
        $tmt = $_POST['tmt'];


        $absensi = array(
            'nama' => $nama,
            'ttl' => $ttl,
            'jk' => $jk,
            'tmt' => $tmt,
        );

        return $this->db->table('absensi')->where("id='$param'")->update($absensi);
    }

    public function delete($id)
    {

        return $this->db->table('absensi')->where("absensi='$id'")->delete();
    }
}
