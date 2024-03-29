<footer class="tm-footer row tm-mt-small">
      <div class="col-12 font-weight-light">
        <p class="text-center text-white mb-0 px-4 small">
          Copyright &copy; <b>2018</b> All rights reserved. 
          
          Design: <a rel="nofollow noopener" href="https://templatemo.com" class="tm-footer-link">Template Mo</a>
        </p>
      </div>
    </footer>
    <script src="assets/js/jquery-3.3.1.min.js"></script>
    <!-- https://jquery.com/download/ -->
    <script src="assets/js/bootstrap.min.js"></script>
    <!-- https://getbootstrap.com/ -->

    <script src="assets/scripts/customDZ.js"> </script>
    <!--Custom Script DZ22716 -->
    <?php if(!isset($_SESSION['user']) && $_GET['page']=='admin'): ?>
      <script src="assets/scripts/loginCheck.js"></script>
    <?php endif; ?>

    <?php if(isset($_SESSION['user'])): ?>
    <!-- Ukoliko je user setovan -> Skripte za admin stranicu posto je ovo deljeni footer --> 
    <script src="./assets/js/moment.min.js"></script>
    <!-- https://momentjs.com/ -->
    <script src="./assets/js/Chart.min.js"></script>
    <!-- http://www.chartjs.org/docs/latest/ -->
    <?php if($subpage=="serverStatus"): ?>
      <script src="./assets/js/serverStatus.js"></script>
    <?php else: ?>
      <script src="./assets/js/tooplate-scripts.js"></script>
    <?php endif; ?>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.js"></script>
    <script type="text/javascript"  src="./assets/scripts/servers.js"></script>
    <script>
        Chart.defaults.global.defaultFontColor = 'white';
        let ctxLine,
            ctxBar,
            ctxPie,
            optionsLine,
            optionsBar,
            optionsPie,
            configLine,
            configBar,
            configPie,
            lineChart;
        barChart, pieChart;
        // DOM is ready
        $(function () {
            drawLineChart(); // Line Chart
            drawBarChart(); // Bar Chart
            drawPieChart(); // Pie Chart

            $(window).resize(function () {
                updateLineChart();
                updateBarChart();                
            });
        })
    </script>
    <?php endif; ?>
  </body>
</html>
