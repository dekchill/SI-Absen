<?php

use Master\guru;
use Master\Menu;

include('autoload.php');
include('Config/Database.php');

$menu = new Menu();
$guru = new guru($dataKoneksi);
$target = @$_GET['target'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Web</title>
    <style>
        body {
            margin: auto;
            padding: auto;
        }

        .batas {
            margin: auto;
            padding: auto;
            width: 1200px;
        }

        .menu {
            width: 1180px;
            height: 50px;
            background-color: #00c7ff;
            margin-bottom: 20px;
        }

        .menu>ul>li {
            float: left;
            list-style-type: none;
            font-family: 'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;
            padding: 15px;
            font-size: 14px;
            margin-right: 10px;
        }

        .menu>ul>li:hover {

            background-color: #40a8f7;
        }

        .menu>ul>li>a {
            text-decoration: none;
            color: white;
        }
    </style>
</head>

<body>
    <div class="batas">
        <div class="menu">
            <ul>
                <?php
                // print_r($menu->topMenu());
                foreach ($menu->topMenu() as $key => $value) {
                ?>
                    <li>
                        <a href="<?php echo $value['link']; ?>">
                            <?php echo $value['text']; ?>
                        </a>
                    </li>
                <?php
                }
                ?>
            </ul>
        </div>
        <div class="content">
            <h4>Content <?php echo strtoupper($target); ?></h4>

            <?php
            if (!isset($target) or $target == "home") {
                echo "Hai, Selamat Datang di Beranda";
            } elseif ($target == "guru") {
            ?>
                <table>
                    <tr>
                        <td>No</td>
                        <td>NPM</td>
                        <td>Nama</td>
                        <td>Alamat</td>
                    </tr>
                    <tr>
                        <?php
                        // echo "<pre>";
                        // print_r ($guru->index()[]);
                        // echo "</pre>";
                        $no = 1;
                        foreach ($guru->index() as $r) {
                        ?>
                            <td><?php echo $no; ?></td>
                            <td><?php echo $r['NPM']; ?></td>
                            <td><?php echo $r['nama']; ?></td>
                            <td><?php echo $r['alamat']; ?></td>
                        <?php
                            $no++;
                        }

                        ?>
                    </tr>
                </table>
            <?php } ?>
        </div>
    </div>
</body>

</html>