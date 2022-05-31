            <!-- row -->
            <div class="row tm-content-row">
                <div class="col-sm-12 col-md-12 col-lg-6 col-xl-6 tm-block-col">
                    <div class="tm-bg-primary-dark tm-block">
                        <h2 class="tm-block-title">Popular Pages by Month</h2>
                        <input type="hidden" id="byMonthData" value=""/>
                        <canvas id="lineChart"></canvas>
                    </div>
                </div>
                <div class="col-sm-12 col-md-12 col-lg-6 col-xl-6 tm-block-col">
                    <div class="tm-bg-primary-dark tm-block">
                        <h2 class="tm-block-title">Popular Pages Last 24h</h2>
                        <input type="hidden" id="byDayData" value=""/>
                        <canvas id="barChart"></canvas>
                    </div>
                </div>

                <div class="col-sm-12 col-md-12 col-lg-6 col-xl-6 tm-block-col">
                    <div class="tm-bg-primary-dark tm-block tm-block-taller">
                        <h2 class="tm-block-title">Visits by Persentage</h2>
                        <div id="pieChartContainer">
                            <canvas id="pieChart" class="chartjs-render-monitor" width="200" height="200"></canvas>
                        </div>                        
                    </div>
                </div>


                <div class="col-sm-12 col-md-12 col-lg-6 col-xl-6 tm-block-col">
                    <div class="tm-bg-primary-dark tm-block tm-block-taller tm-block-overflow">
                        <h2 class="tm-block-title">Error Notification</h2>
                        <div class="tm-notification-items">

                        <?php 
                           $errorLog = getErrorLogs();
                            foreach($errorLog as $err):
                                $e = explode("\t",$err);
                            $usersImg = getUserAndImg($e[0]); 
                            $dateTime = explode(" ",trim($e[2]));
                            $date = $dateTime[0];
                            $time = $dateTime[1];
                        ?>
                        <?php foreach($usersImg as $usr):?>
                            <div class="media tm-notification-item">
                                <div class="tm-gray-circle"><img src="<?= $usr->img_path?>" alt="<?= $usr->img_alt?>" class="rounded-circle"></div>
                                <div class="media-body">
                                    <p class="mb-2"><b><?= $usr->firstName?></b> tried to <?= $e[3]; ?> </br>
                                    <span class="tm-small tm-text-color-secondary">At <?= $time ?> on <?= $date ?>.</span>
                                </div>
                            </div>
                        <?php endforeach; ?>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
                <?php 
                    $br = 0;
                    $logData = getLogData();
                ?>
                <div class="col-12 tm-block-col">
                    <div class="tm-bg-primary-dark tm-block tm-block-taller tm-block-scroll">
                        <h2 class="tm-block-title">Visits Log</h2>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">STATUS</th>
                                    <th scope="col">Username</th>
                                    <th scope="col">IP Address</th>
                                    <th scope="col">Date</th>
                                    <th scope="col">Page</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach($logData as $data): ?>
                                    <?php $d = explode("\t",$data); ?>
                                <tr>
                                    <th scope="row"><b><?= $br++; ?></b></th>
                                    <td>
                                        <div class="tm-status-circle moving">
                                        </div>Visited
                                    </td>
                                    <td><b><?=$d[0]?></b></td>
                                    <td><b><?=$d[1]?></b></td>
                                    <td><b><?=$d[2]?></b></td>
                                    <?php $d3Break = explode("Visited ",$d[3]); 
                                        $page = $d3Break[1];?>
                                    <td><?=$page?></td>
                                </tr>
                                <?php endforeach;?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>