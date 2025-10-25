<!DOCTYPE html>
<html lang="en">

<head>
<?php require ('includes/title-tag.php');?>
</head>

<body>
  <!-- app -->
  <div class="art-app">
    <!-- mobile top bar -->
    <div class="art-mobile-top-bar"></div>

    <!-- app wrapper -->
    <div class="art-app-wrapper">
      <!-- app container end -->
      <div class="art-app-container">
        <!-- info bar -->
          <?php include ('includes/info-bar.php');?>
        <!-- info bar end -->

        <!-- content -->
        <div class="art-content">

          <!-- curtain -->
          <div class="art-curtain"></div>

          <!-- top background -->
          <div class="art-top-bg" style="background-image: url(img/bg.jpg)">
            <!-- overlay -->
            <div class="art-top-bg-overlay"></div>
            <!-- overlay end -->
          </div>
          <!-- top background end -->

          <!-- swup container -->
          <div class="transition-fade" id="swup">

            <!-- scroll frame -->
            <div id="scrollbar" class="art-scroll-frame">

              <!-- container -->
              <div class="container-fluid">

                <!-- row -->
                <div class="row p-60-0 p-lg-30-0 p-md-15-0">
                  <!-- col -->
                  <div class="col-lg-12">

                    <!-- banner -->
                      <?php include ('includes/banner.php');?>
                    <!-- banner end -->

                  </div>
                  <!-- col end -->
                </div>
                <!-- row end -->

              </div>
              <!-- container end -->

              <!-- container for counter -->
                <?php include ('includes/container-counter.php');?>
              <!-- container for counter end -->

              <!-- container -->
              <div class="container-fluid">

                <!-- what I do row -->
                  <?php include ('includes/what-i-do-row.php');?>
                <!-- Wat I do row end -->

              </div>
              <!-- container end -->

              <!-- pricing plans container -->
                <?php include ('includes/pricing-plans.php');?>
              <!-- pricing plans container end -->

              <!-- recommendation container -->
                <?php include ('includes/recommendations.php');?>
              <!-- recommendation container end -->

              <!-- brands container -->
                <?php include ('includes/brands.php');?>
              <!-- brands container end -->

              <!-- footer container -->
                  <?php include ('includes/footer.php');?>
              <!-- footer container end -->

              </div>
              <!-- container end -->

            </div>
            <!-- scroll frame end -->

          </div>
          <!-- swup container end -->

        </div>
        <!-- content end -->

        <!-- menu bar -->
          <?php include ('includes/menu-bar.php');?>
        <!-- menu bar end -->

      </div>
      <!-- app container end -->

    </div>
    <!-- app wrapper end -->

    <!-- preloader -->
      <?php include ('includes/preloader.php');?>
    <!-- preloader end -->

  </div>
  <!-- app end -->

  <!-- JS scripts -->

    <?php include ('includes/js-scripts.php');?>

  <!-- JS scripts end -->

</body>

</html>
