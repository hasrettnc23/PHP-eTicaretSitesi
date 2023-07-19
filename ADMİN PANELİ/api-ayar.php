<?php  include 'header.php' ;
$api_ayar=$db->prepare("SELECT * FROM api_ayar where id=0");
$api_ayar->execute();
$apiayargetir=$api_ayar->fetch(PDO::FETCH_ASSOC);


?>

        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            
            <div class="clearfix"></div>
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Api Ayarlar <small>İşlem Durumu</small></h2>
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
                    <form action="../netting/islemapi.php" method="POST"  id="demo-form2" data-parsley-validate 
                    class="form-horizontal form-label-left">

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name"> Analystic Kodu
                       <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="first-name" name="analystic" value="<?php echo $apiayargetir['analystic']?>" required="required"
                          class="form-control col-md-7 col-xs-12">
                        </div> 
                        <div> 
                          <input type="hidden" value="1" name="id">
</div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name"> Maps Api
                       <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="first-name" name="maps" value="<?php echo $apiayargetir['maps']?>"
                           required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Zopim Api
                       <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="first-name" name="zopim" value="<?php echo $apiayargetir['zopim']?>" 
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
                          <button type="submit" name="apiayarkaydet" class="btn btn-success">Güncelle</button>
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