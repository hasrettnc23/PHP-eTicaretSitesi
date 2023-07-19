<?php  include 'header.php' ;
$iletisim_ayar=$db->prepare("SELECT * FROM iletisim_ayar where id=1");
$iletisim_ayar->execute();
$iletisimgetir=$iletisim_ayar->fetch(PDO::FETCH_ASSOC);
?>

        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            
            <div class="clearfix"></div>
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>İletişim Ayarlar <small>İşlem Durumu</small></h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                        <ul class="dropdown-menu" role="menu">
                          <li><a href="#">Settings 1</a>
                          </li>
                          <li><a href="#">Settings 2</a>
                          </li>
                        </ul>
                      </li>
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <br />


                    <!--   
                        /  => en kök dizine çıkar. 
                      ../  => bir üst klasöre çıkar.
                         -->
                    <form action="../netting/islemiletisim.php" method="POST"  id="demo-form2" data-parsley-validate 
                    class="form-horizontal form-label-left">

                      <div class="form-group">  
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name"> Telefon Numarası
                       <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="first-name" name="tel" value="<?php echo $iletisimgetir['tel']?>" required="required"
                          class="form-control col-md-7 col-xs-12">
                        </div> 
                        <div> 
                          <input type="hidden" value="1" name="id">
            </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name"> Telefon Numarası (GSM)
                       <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="first-name" name="gsm" value=" <?php echo $iletisimgetir['gsm']?>"
                           required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name"> Faks Numarası
                       <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="first-name" name="faks" value="<?php echo $iletisimgetir['faks']?>" 
                          required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Mail Adresi
                       <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="first-name" name="mail" value="<?php echo $iletisimgetir['mail']?>"
                           required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">İlçe
                       <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="first-name" name="ilce" value="<?php echo $iletisimgetir['ilce']?>" 
                          required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name"> İl
                       <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="first-name" name="il" value="<?php echo $iletisimgetir['il']?>" 
                          required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name"> Adres
                       <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="first-name" name="adres" value="<?php echo $iletisimgetir['adres']?>" 
                          required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name"> Mesai
                       <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="first-name" name="mesai" value="<?php echo $iletisimgetir['mesai']?>" 
                          required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>

<?php 
if(isset($_GET['action'])&&($_GET['action']=="basarili")){ ?>
  <script>
Swal.fire({
  position: 'top-middle',
  icon: 'success',
  title: 'İşleminiz Başarılı',
  showConfirmButton: false,
  timer: 1500
})
    </script>

  <?php } ?>

                      <div class="ln_solid"></div>
                      <div class="form-group">

                        <div align="right" class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                       <!--  burda align güncelle butonunu sağa çekti konumlandırma yaptı -->   
                          <button type="submit" name="iletisimayarkaydet" class="btn btn-success">Güncelle</button>
                        </div>
                      </div>

     </form>
                  </div>
                </div>
              </div>
            </div>

           
          </div>
        </div>
        <!-- /page content -->

   <?php include 'footer.php' ;?>