<?php

namespace Master;

use Config\Query_builder;

class admin
{
    private $db;

    public function __construct($con)
    {
        $this->db = new Query_builder($con);
    }

    public function index()
    {
        $admin = $this->db->table('admin')->get()->resultArray();
        $res = ' <a href="?target=admin&act=tambah_admin" class="btn btn-info btn-sm">Tambah admin</a>
    <br><br>

    <div class="table-responsive">
        <table class="table table-striped">
            <thead class="table-primary">
                <tr>
                    <th>no</th>
                    <th>id</th>
                    <th>username</th>
                    <th>password</th>
                    <th>act</th>
                </tr>
            </thead>
            <tbody>';
        $no = 1;
        foreach ($admin as $r) {
            $res .= '<tr>
                    <td width="300">' . $no . '</td>
                    <td width="200">' . $r['id'] . '</td>
                    <td>' . $r['username'] . '</td>
                    <td>' . $r['password'] . '</td>
                    <td width="150">
                        <a href="?target=admin&act=edit_admin&id=' . $r['id'] . '" class="btn btn-success btn-sm">
                            Edit
                        </a>
                        <a href="?target=admin&act=delete_admin&id=' . $r['id'] . '" class="btn btn-danger btn-sm">
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
        $res = '<a href="?target=admin" class="btn btn-danger btn-sm">Kembali</a><br><br>';
        $res .= '<form action="?target=admin&act=simpan_admin" method="post">
                    <div class="mb-3">
                        <label for="id" class="form-label">id</label>
                        <input type="text" class="form-control" id="id" name="id">
                    </div>
                    <div class="mb-3">
                        <label for="username" class="form-label">username</label>
                        <input type="text" class="form-control" id="username" name="username">
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">password</label>
                        <input type="text" class="form-control" id="password" name="password">
                    </div>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </form>';
        return $res;
    }

    public function simpan()
    {
        $id= $_POST['id'];
        $username = $_POST['username'];
        $password = $_POST['password'];

        $admin = array(
            'id' => $id,
            'username' => $username,
            'password' => $password,
        );
        return $this->db->table('admin')->insert($admin);
    }

    public function edit($id)
    {
        $r = $this->db->table('admin')->where("username='$id'")->get()->rowArray();

        $res = '<a href="?target=admin" class="btn btn-danger btn-sm">Kembali</a><br><br>';
        $res .= '<form action="?target=admin&act=simpan_admin" method="post">
                    <div class="mb-3">
                        <label for="id" class="form-label">id</label>
                        <input type="text" class="form-control" id="id" name="id">
                    </div>
                    <div class="mb-3">
                        <label for="username" class="form-label">username</label>
                        <input type="text" class="form-control" id="username" name="username">
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">password</label>
                        <input type="text" class="form-control" id="password" name="username">
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
        $username = $_POST['username'];
        $password = $_POST['password'];


        $admin = array(
            'username' => $username,
            'password' => $password,
        );

        return $this->db->table('admin')->where("id='$param'")->update($admin);
    }

    public function delete($id)
    {

        return $this->db->table('admin')->where("id='$id'")->delete();
    }
}
