<?php

include 'header.php';

$yorumsor = $db->prepare("SELECT * FROM yorumlar ORDER BY yorum_onay ASC");
$yorumsor->execute();

?>

<!-- page content -->
<div class="right_col" role="main">
    <div class="">

        <div class="clearfix"></div>
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Yorum Listeleme <small>
                                <?php
                                if (isset($_GET['durum'])) {
                                    if ($_GET['durum'] == "ok") {
                                        echo '<b style="color:green;">İşlem Başarılı...</b>';
                                    } elseif ($_GET['durum'] == "no") {
                                        echo '<b style="color:red;">İşlem Başarısız...</b>';
                                    }
                                }
                                ?>
                            </small></h2>

                        <div class="clearfix"></div>

                        <div align="right">
                            <a href="yorum-ekle.php"><button class="btn btn-success btn-xs"> Yeni Ekle</button></a>

                        </div>
                    </div>
                    <div class="x_content">

                        <!-- Div İçerik Başlangıç -->

                        <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th>S.No</th>
                                    <th>Yorum</th>
                                    <th>Kullanıcı</th>
                                    <th>Ürün</th>
                                    <th>Durum</th>
                                    <th></th>
                                </tr>
                            </thead>

                            <tbody>

                                <?php
                                $say = 0;

                                while ($yorumcek = $yorumsor->fetch(PDO::FETCH_ASSOC)) {
                                    $say++;
                                    ?>
                                    <tr>
                                        <td width="20"><?php echo $say ?></td>
                                        <td><?php echo $yorumcek['yorum_detay'] ?></td>
                                        <td><?php

                                                $kullanici_id = $yorumcek['kullanici_id'];

                                                $guncelle = $db->prepare("SELECT * FROM kullanicilar WHERE kullanici_id=:kullanici_id");
                                                $guncelle->execute(array(
                                                    'kullanici_id' => $kullanici_id
                                                ));
                                                $kullanicicek = $guncelle->fetch(PDO::FETCH_ASSOC);
                                                if ($kullanicicek) {
                                                    echo $kullanicicek['kullanici_adsoyad'];
                                                } else {
                                                    echo "Kullanıcı bulunamadı";
                                                }
                                                ?></td>
                                        <td><?php
                                                $urun_id = $yorumcek['urun_id'];
                                                $urunsor = $db->prepare("SELECT * FROM urun WHERE urun_id=:id");
                                                $urunsor->execute(array(
                                                    'id' => $urun_id
                                                )); 
                                                $uruncek = $urunsor->fetch(PDO::FETCH_ASSOC);
                                                if ($uruncek) {
                                                    echo $uruncek['urun_ad'];
                                                } else {
                                                    echo "Ürün bulunamadı";
                                                }
                                                ?></td>
                                        <td>
                                            <center>
                                                <?php
                                                    if ($yorumcek['yorum_onay'] == 0) {
                                                        ?>
                                                        <a href="../netting/yorumislem.php?yorum_id=<?php echo $yorumcek['yorum_id'] ?>&yorum_one=1&yorum_onay=ok">
                                                            <button class="btn btn-success btn-xs">Onayla</button>
                                                        </a>
                                                <?php } elseif ($yorumcek['yorum_onay'] == 1) { ?>
                                                        <a href="../netting/yorumislem.php?yorum_id=<?php echo $yorumcek['yorum_id'] ?>&yorum_one=0&yorum_onay=ok">
                                                            <button class="btn btn-warning btn-xs">Kaldır</button>
                                                        </a>
                                                <?php } ?>
                                            </center>
                                        </td>
                                        <td>
                                            <center>
                                                <a href="../netting/yorumislem.php?yorum_id=<?php echo $yorumcek['yorum_id']; ?>&yorumsil=ok">
                                                    <button class="btn btn-danger btn-xs">Sil</button>
                                                </a>
                                            </center>
                                        </td>
                                    </tr>

                                <?php } ?>

                            </tbody>
                        </table>

                        <!-- Div İçerik Bitişi -->

                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
<!-- /page content -->

<?php include 'footer.php'; ?>
