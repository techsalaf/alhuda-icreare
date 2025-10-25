<!DOCTYPE html>
<html lang="en">

<head>
  <?php include ('includes/title-tag.php');?>
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
                <div class="row p-30-0">

                  
              <!-- Section Education -->
              <!-- col -->
                <?php include ('includes/education-section.php');?>
              <!-- col ends -->
              <!-- Section Education ends -->

                  <!-- Section work history -->
                    <?php include ('includes/work-history-section.php');?>
                  <!-- Section work history end -->

                </div>
                <!-- row end -->

              </div>
              <!-- container end -->

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
        <div class="art-menu-bar">

        <!-- menu bar frame -->
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

<!-- JS scrpts -->

  <?php include ('includes/js-scripts.php');?>

<!-- JS scripts end -->

</body>

</html>