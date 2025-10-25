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

                  <!-- col -->
                  <div class="col-lg-12">

                    <!-- portfolio filter -->
                    <?php include ('includes/portfolios/portfolio-filter.php');?>
                    <!-- portfolio filter end -->

                  </div>
                  <!-- col end -->

                  <div class="art-grid art-grid-3-col art-gallery">

                    <!-- Portfolio Proect 1 -->
                    <!-- grid item -->
                    <?php include ('includes/project-listing/project-1.php');?>
                    <!-- grid item end -->
                    <!-- Portfolio Project 1 end -->

                    <!-- Portfolio Proect 2 -->
                    <!-- grid item -->
                    <?php include ('includes/project-listing/project-2.php');?>
                    <!-- grid item end -->
                    <!-- Portfolio Project 2 end -->

                    <!-- Portfolio Proect 3 -->
                    <!-- grid item -->
                    <?php include ('includes/project-listing/project-3.php');?>
                    <!-- grid item end -->
                    <!-- Portfolio Project 3 end -->

                    <!-- Portfolio Proect 4 -->
                    <!-- grid item -->
                    <?php include ('includes/project-listing/project-4.php');?>
                    <!-- grid item end -->
                    <!-- Portfolio Project 4 end -->

                    <!-- Portfolio Proect 5 -->
                    <!-- grid item -->
                    <?php include ('includes/project-listing/project-5.php');?>
                    <!-- grid item end -->
                    <!-- Portfolio Project 5 end -->

                    <!-- Portfolio Proect 6 -->
                    <!-- grid item -->
                    <?php include ('includes/project-listing/project-6.php');?>
                    <!-- grid item end -->
                    <!-- Portfolio Project 6 end -->

                    <!-- Portfolio Proect 7 -->
                    <!-- grid item -->
                    <?php include ('includes/project-listing/project-7.php');?>
                    <!-- grid item end -->
                    <!-- Portfolio Project 7 end -->

                    <!-- Portfolio Proect 8 -->
                    <!-- grid item -->
                    <?php include ('includes/project-listing/project-8.php');?>
                    <!-- grid item end -->
                    <!-- Portfolio Project 8 end -->

                    <!-- Portfolio Proect 9 -->
                    <!-- grid item -->
                    <?php include ('includes/project-listing/project-9.php');?>
                    <!-- grid item end -->
                    <!-- Portfolio Project 9 end -->

                    <!-- Portfolio Proect 10 -->
                    <!-- grid item -->
                    <?php include ('includes/project-listing/project-10.php');?>
                    <!-- grid item end -->
                    <!-- Portfolio Project 10 end -->

                    <!-- Portfolio Proect 11 -->
                    <!-- grid item -->
                    <?php include ('includes/project-listing/project-11.php');?>
                    <!-- grid item end -->
                    <!-- Portfolio Project 11 end -->

                  </div>

                </div>
                <!-- row end -->

                <!-- projects navigation -->
                <div class="art-a art-pagination">
                  <div class="art-pagination-center art-m-hidden">
                    <a class="art-link art-color-link art-w-chevron art-center-link" href="more-projects.php">Load More</a>
                  </div>
                </div>
                <!-- projects navigation end -->

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