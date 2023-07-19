<?php 
include 'header.php'; 

$guncelle = $db->prepare("SELECT * FROM kullanicilar");
$guncelle->execute();

while($kullanicicek=$guncelle->fetch(PDO::FETCH_ASSOC))

$urunsor=$db->prepare("SELECT * FROM urun where urun_id=:urun_id");
$urunsor->execute(array(
 'urun_id' =>  $urun_id
 ));

$uruncek=$urunsor->fetch(PDO::FETCH_ASSOC);


echo $uruncek['urun_ad'];
?>


<!-- page content -->
<div class="right_col" role="main">
  <div class="">
    <div class="clearfix"></div>
    <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
          <div class="x_title">
            <h2>Yorum Ekleme <small></small></h2>
            <div class="clearfix"></div>
          </div>
          <div class="x_content">
            <br />

            <!-- / => en kök dizine çık ... ../ bir üst dizine çık -->
            <form action="../netting/yorumislem.php" method="POST" id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">

              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Kullanıcı Ad Soyad <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input type="text" id="first-name" name="kullanici_adsoyad" value="<?php echo isset($kullanicicek['kullanici_adsoyad']) ? $kullanicicek['kullanici_adsoyad'] : ''; ?>" required="required" placeholder="Ad & Soyad giriniz" class="form-control col-md-7 col-xs-12">
                </div>
              </div>

              <!-- Ck Editör Başlangıç -->
              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Yorum Detay <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <textarea class="ckeditor" id="editor1" name="yorum_detay"><?php echo isset($yorumcek['yorum_detay']) ? $yorumcek['yorum_detay'] : ''; ?></textarea>
                </div>
              </div>

              <script type="text/javascript">
                CKEDITOR.replace('editor1', {
                  filebrowserBrowseUrl: 'ckfinder/ckfinder.html',
                  filebrowserImageBrowseUrl: 'ckfinder/ckfinder.html?type=Images',
                  filebrowserFlashBrowseUrl: 'ckfinder/ckfinder.html?type=Flash',
                  filebrowserUploadUrl: 'ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
                  filebrowserImageUploadUrl: 'ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
                  filebrowserFlashUploadUrl: 'ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash',
                  forcePasteAsPlainText: true
                });
              </script>
              <!-- Ck Editör Bitiş -->

              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Yorum Durum<span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <select id="heard" class="form-control" name="yorum_onay" required>
                    <option value="1" <?php echo (isset($yorumcek['yorum_onay']) && $yorumcek['yorum_onay'] == 1) ? 'selected' : ''; ?>>Aktif</option>
                    <option value="0" <?php echo (isset($yorumcek['yorum_onay']) && $yorumcek['yorum_onay'] == 0) ? 'selected' : ''; ?>>Pasif</option>
                  </select>
                </div>
              </div>

              <div class="ln_solid"></div>
              <div class="form-group">
                <div align="right" class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                  <button type="submit" name="yorumekle" class="btn btn-success">Kaydet</button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
  <hr>
  <hr>
  <hr>
</div>
</div>
<!-- /page content -->

<?php include 'footer.php'; ?>
