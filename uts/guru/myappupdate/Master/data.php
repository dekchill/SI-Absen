<?php

namespace Master;

use Config\Query_builder;

class data
{
    private $db;

    public function __construct($con)
    {
        $this->db = new Query_builder($con);
    }

    public function index()
    {
        $data = $this->db->table('data')->get()->resultArray();
        $res = ' <a href="?target=data&act=tambah_data" class="btn btn-info btn-sm">Tambah data</a>
    <br><br>

    <div class="table-responsive">
        <table class="table table-striped">
            <thead class="table-primary">
                <tr>
                    <th>no</th>
                    <th>id_data</th>
                    <th>nip</th>
                    <th>nama</th>
                    <th>alamat</th>
                    <th>telp</th>
                    <th>tanggal_lahir</th>
                    <th>jk</th>
                    <th>Act</th>
                </tr>
            </thead>
            <tbody>';
        $no = 1;
        foreach ($data as $r) {
            $res .= '<tr>
                    <td widt="10">' . $no . '</td>
                    <td width="150">' . $r['id_data'] . '</td>
                    <td width="150">' . $r['nip'] . '</td>
                    <td width="150">' . $r['nama'] . '</td>
                    <td width="150">' . $r['alamat'] . '</td>
                    <td width="200">' . $r['telp'] . '</td>
                    <td width="150">' . $r['tanggal_lahir'] . '</td>
                    <td width="150">' . $r['jk'] . '</td>
                    <td width="150">
                        <a href="?target=data&act=edit_data&id=' . $r['id_data'] . '" class="btn btn-success btn-sm">
                            Edit
                        </a>
                        <a href="?target=data&act=delete_data&id=' . $r['id_data'] . '" class="btn btn-danger btn-sm">
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
        $res = '<a href="?target=data" class="btn btn-danger btn-sm">Kembali</a><br><br>';
        $res .= '<form action="?target=data&act=simpan_data" method="post">
                    <div class="mb-3">
                        <label for="id_data" class="form-label">id_data</label>
                        <input type="text" class="form-control" id="id_data" name="id_data">
                    </div>
                    <div class="mb-3">
                        <label for="nip" class="form-label">nip</label>
                        <input type="text" class="form-control" id="nip" name="nip">
                    </div>
                    <div class="mb-3">
                        <label for="nama" class="form-label">nama</label>
                        <input type="text" class="form-control" id="nama" name="nama">
                    </div>
                    <div class="mb-3">
                        <label for="alamat" class="form-label">alamat</label>
                        <input type="text" class="form-control" id="alamat" name="alamat">
                    </div>
                    <div class="mb-3">
                        <label for="telp" class="form-label">telp</label>
                        <input type="text" class="form-control" id="telp" name="telp">
                    </div>
                    <div class="mb-3">
                        <label for="tanggal_lahir" class="form-label">tanggal_lahir</label>
                        <input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir">
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
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </form>';
        return $res;
    }

    public function simpan()
    {
        $id_data= $_POST['id_data'];
        $nip = $_POST['nip'];
        $nama = $_POST['nama'];
        $alamat = $_POST['alamat'];
        $telp = $_POST['telp'];
        $tanggal_lahir = $_POST['tanggal_lahir'];
        $jk = $_POST['jk'];
        $Act = $_POST['Act'];

        $data = array(
            'id_data' => $id_data,
            'nip' => $nip,
            'nama' => $nama,
            'alamat' => $alamat,
            'telp' => $telp,
            'tanggal_lahir' => $tanggal_lahir,
            'jk' => $jk,
        );
        return $this->db->table('data')->insert($data);
    }

    public function edit($id)
    {
        $r = $this->db->table('data')->where("nip='$id'")->get()->rowArray();

        $res = '<a href="?target=data" class="btn btn-danger btn-sm">Kembali</a><br><br>';
        $res .= '<form action="?target=data&act=simpan_data" method="post">
        <div class="mb-3">
        <label for="id_data" class="form-label">id_data</label>
        <input type="text" class="form-control" id="id_data" name="id_data">
    </div>
    <div class="mb-3">
        <label for="nip" class="form-label">nip</label>
        <input type="text" class="form-control" id="nip" name="nip">
    </div>
    <div class="mb-3">
        <label for="nama" class="form-label">nama</label>
        <input type="text" class="form-control" id="nama" name="nama">
    </div>
    <div class="mb-3">
        <label for="alamat" class="form-label">alamat</label>
        <input type="text" class="form-control" id="alamat" name="alamat">
    </div>
    <div class="mb-3">
        <label for="telp" class="form-label">telp</label>
        <input type="text" class="form-control" id="telp" name="telp">
    </div>
    <div class="mb-3">
        <label for="tanggal_lahir" class="form-label">tanggal_lahir</label>
        <input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir">
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
        $nip = $_POST['nip'];
        $nama = $_POST['nama'];
        $alamat = $_POST['alamat'];
        $telp = $_POST['telp'];
        $tanggal_lahir = $_POST['tanggal_lahir'];
        $jk = $_POST['jk'];


        $data = array(
            'nip' => $nip,
            'nama' => $nama,
            'alamat' => $alamat,
            'telp' => $telp,
            'tanggal_lahir' => $tanggal_lahir,
            'jk' => $jk,
        );

        return $this->db->table('data')->where("id_data='$param'")->update($data);
    }

    public function delete($id)
    {

        return $this->db->table('data')->where("id_data='$id'")->delete();
    }
}
