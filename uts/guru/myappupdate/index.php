<?php

use Master\data;
use Master\Menu;
use Master\admin;
use Master\absensi;

include('autoload.php');
include('Config/Database.php');

$menu = new Menu();
$data = new data($dataKoneksi);
$admin = new admin($dataKoneksi);
$absensi = new absensi($dataKoneksi);
//$Admin ->tambah()
$target = @$_GET['target'];
$act = @$_GET['act']
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Web</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.css">
    <script src="assets/bootstrap/js/bootstrap.bundle.min.js"></script>
</head>

<body>
    <div class="container">
        <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
            <div class="container-fluid">
                <a href="#" class="navbar-brand">ABSENSI GURU</a>
                <button type="button" class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#MyMenu" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="MyMenu">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <?php
                        foreach ($menu->topMenu() as $r) {
                        ?>
                            <li class="nav-item">
                                <a href="<?php echo $r['link']; ?>" class="nav-link">
                                    <?php echo $r['text']; ?>
                                </a>
                            </li>
                        <?php
                        }
                        ?>
                    </ul>
                </div>
            </div>
        </nav>
        <br>
        <div class="content">
            <h5>Content <?php echo strtoupper($target); ?></h5>

            <?php
            if (!isset($target) or $target == "home") {
                echo "Hai, Selamat Datang di Beranda";
                //====start content data====
            } elseif ($target == "data") {
                if ($act == "tambah_data") {
                    echo $data->tambah();
                } elseif ($act == "simpan_data") {
                    if ($data->simpan()) {
                        echo "<script>
                        alert ('Data Tersimpan')
                        window.location.href = '?target=data'
                        </script>";
                    } else {
                        echo "<script>
                        alert ('Data Gagal Tersimpan')
                        window.location.href = '?target=data'
                        </script>";
                    }
                } elseif ($act == "edit_data") {
                    $id = $_GET['id'];
                    echo $data->edit($id);
                } elseif ($act == "update_data") {
                    if ($data->update()) {
                        echo "<script>
                        alert ('Data Diupdate')
                        window.location.href = '?target=data'
                        </script>";
                    } else {
                        echo "<script>
                        alert ('Data Gagal Diupdate')
                        window.location.href = '?target=data'
                        </script>";
                    }
                } elseif ($act == "delete_data") {
                    $id = $_GET['id'];
                    if ($data->delete($id)) {
                        echo "<script>
                        alert ('Data Dihapus')
                        window.location.href = '?target=data'
                        </script>";
                    } else {
                        echo "<script>
                        alert ('Data Gagal Dihapus')
                        window.location.href = '?target=data'
                        </script>";
                    }
                } else {
                    echo $data->index();
                }
                //====And Content admin====
            } elseif ($target == "admin") {
                if ($act == "tambah_admin") {
                    echo $admin->tambah();
                } elseif ($act == "simpan_admin") {
                    if ($admin->simpan()) {
                        echo "<script>
                        alert ('admin Tersimpan')
                        window.location.href = '?target=admin'
                        </script>";
                    } else {
                        echo "<script>
                        alert ('admin Gagal Tersimpan')
                        window.location.href = '?target=admin'
                        </script>";
                    }
                } elseif ($act == "edit_admin") {
                    $id = $_GET['id'];
                    echo $admin->edit($id);
                } elseif ($act == "update_admin") {
                    if ($admin->update()) {
                        echo "<script>
                        alert ('admin Diupdate')
                        window.location.href = '?target=admin'
                        </script>";
                    } else {
                        echo "<script>
                        alert ('admin Gagal Diupdate')
                        window.location.href = '?target=admin'
                        </script>";
                    }
                } elseif ($act == "delete_admin") {
                    $id = $_GET['id'];
                    if ($admin->delete($id)) {
                        echo "<script>
                        alert ('admin Dihapus')
                        window.location.href = '?target=admin'
                        </script>";
                    } else {
                        echo "<script>
                        alert ('admin Gagal Dihapus')
                        window.location.href = '?target=admin'
                        </script>";
                    }
                } else {
                    echo $admin->index();
                }
                
          //====start content absensi====
        } elseif ($target == "absensi") {
            if ($act == "tambah_absensi") {
                echo $absensi->tambah();
            } elseif ($act == "simpan_absensi") {
                if ($absensi->simpan()) {
                    echo "<script>
                    alert ('absensi Tersimpan')
                    window.location.href = '?target=absensi'
                    </script>";
                } else {
                    echo "<script>
                    alert ('absensi Gagal Tersimpan')
                    window.location.href = '?target=absensi'
                    </script>";
                }
            } elseif ($act == "edit_absensi") {
                $id = $_GET['id'];
                echo $absensi->edit($id);
            } elseif ($act == "update_absensi") {
                if ($absensi->update()) {
                    echo "<script>
                    alert ('absensi Diupdate')
                    window.location.href = '?target=absensi'
                    </script>";
                } else {
                    echo "<script>
                    alert ('absensi Gagal Diupdate')
                    window.location.href = '?target=absensi'
                    </script>";
                }
            } elseif ($act == "delete_absensi") {
                $id = $_GET['id'];
                if ($absensi->delete($id)) {
                    echo "<script>
                    alert ('absensi Dihapus')
                    window.location.href = '?target=absensi'
                    </script>";
                } else {
                    echo "<script>
                    alert ('absensi Gagal Dihapus')
                    window.location.href = '?target=absensi'
                    </script>";
                }
            } else {
                echo $absensi->index();
            }
        }
            ?>
        </div>
    </div>
</body>

</html>