<?php
/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link      https://cakephp.org CakePHP(tm) Project
 * @since     0.10.0
 * @license   https://opensource.org/licenses/mit-license.php MIT License
 * @var \App\View\AppView $this
 * @var \Cake\Collection\CollectionInterface|string[] $job
 * @var \Cake\Collection\CollectionInterface|string[] $cust
 * @var \Cake\Collection\CollectionInterface|string[] $items
 * @var \Cake\Collection\CollectionInterface|string[] $orderS
 */
use Cake\Cache\Cache;
use Cake\Core\Configure;
use Cake\Core\Plugin;
use Cake\Datasource\ConnectionManager;
use Cake\Error\Debugger;
use Cake\Http\Exception\NotFoundException;

$checkConnection = function (string $name) {
    $error = null;
    $connected = false;
    try {
        $connection = ConnectionManager::get($name);
        $connected = $connection->connect();
    } catch (Exception $connectionError) {
        $error = $connectionError->getMessage();
        if (method_exists($connectionError, 'getAttributes')) {
            $attributes = $connectionError->getAttributes();
            if (isset($attributes['message'])) {
                $error .= '<br />' . $attributes['message'];
            }
        }
    }

    return compact('connected', 'error');
};

if (!Configure::read('debug')) :
    throw new NotFoundException(
        'Please replace templates/Pages/home.php with your own version or re-enable debug mode.'
    );
endif;

//echo $this->Html->css('/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet', ['block' => true]);
//echo $this->Html->script('/vendor/datatables/jquery.dataTables.min.js', ['block' => true]);
//echo $this->Html->script('/vendor/datatables/dataTables.bootstrap4.min.js', ['block' => true]);

?>
<!DOCTYPE html>
<html>
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>
        GATech
        <?= $this->fetch('title') ?>
    </title>
    <?= $this->Html->meta('icon') ?>

    <link href="https://fonts.googleapis.com/css?family=Raleway:400,700" rel="stylesheet">

    <?= $this->Html->css('/css/sb-admin-2.min.css') ?>

    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>

</head>
<body>
<header>
    <div class="container text-center">

        <h1>    <i class="fas fa-guitar"></i>
            GATech
        </h1>


    </div>
</header>

<main class="main">
    <div class="container">
        <div class="content">
            <h2>Dashboard</h2>

            <!-- Content Row -->

            <div class="row">
                <!-- Content Row -->
                <div class="row">

                    <!-- Earnings (Monthly) Card Example -->
                    <div class="col-xl-3 col-md-6 mb-4">
                        <div class="card border-left-primary shadow h-100 py-2">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                            Total Customers</div>
                                        <?php $num = 0 ?>
                                        <?php foreach ($cust as $cust): ?>
                                            <?php $num ++ ?>
                                        <?php endforeach; ?>

                                        <div class="h5 mb-0 font-weight-bold text-gray-800"><?= h($num) ?></div>
                                    </div>
                                    <div class="col-auto">
                                        <i class="fas fa-calendar fa-2x text-gray-300"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Earnings (Monthly) Card Example -->
                    <div class="col-xl-3 col-md-6 mb-4">
                        <div class="card border-left-success shadow h-100 py-2">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                            Total Items</div>
                                        <?php $numI = 0 ?>
                                        <?php foreach ($items as $itemss): ?>
                                            <?php $numI ++ ?>
                                        <?php endforeach; ?>
                                        <div class="h5 mb-0 font-weight-bold text-gray-800"><?= h($numI) ?></div>
                                    </div>
                                    <div class="col-auto">
                                        <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Earnings (Monthly) Card Example -->
                    <div class="col-xl-3 col-md-6 mb-4">
                        <div class="card border-left-info shadow h-100 py-2">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Job Tasks
                                        </div>
                                        <div class="row no-gutters align-items-center">
                                            <div class="col-auto">
                                                <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">50%</div>
                                            </div>
                                            <div class="col">
                                                <div class="progress progress-sm mr-2">
                                                    <div class="progress-bar bg-info" role="progressbar"
                                                         style="width: 50%" aria-valuenow="50" aria-valuemin="0"
                                                         aria-valuemax="100"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-auto">
                                        <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Pending Requests Card Example -->
                    <div class="col-xl-3 col-md-6 mb-4">
                        <div class="card border-left-warning shadow h-100 py-2">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                            Total Orders</div>
                                        <?php $numO = 0 ?>
                                        <?php foreach ($orderS as $orders): ?>
                                            <?php $numO ++ ?>
                                        <?php endforeach; ?>
                                        <div class="h5 mb-0 font-weight-bold text-gray-800"><?= h($numO) ?></div>
                                    </div>
                                    <div class="col-auto">
                                        <i class="fas fa-comments fa-2x text-gray-300"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>















                    <!-- Area Chart -->
                    <div class="col-xl-6 col-lg-7">
                        <div class="card shadow mb-4">
                            <!-- Card Header - Dropdown -->
                            <div
                                class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                <h6 class="m-0 font-weight-bold text-primary">Earnings Overview</h6>
                                <div class="dropdown no-arrow">
                                    <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                                       data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">

                                    </a>

                                </div>
                            </div>
                            <!-- Card Body -->
                            <div class="card-body">

                                <canvas id="myChart" width="400" height="400"></canvas>

                            </div>
                        </div>
                    </div>

                    <!-- Area Chart -->
                    <div class="col-xl-6 col-lg-7">
                        <div class="card shadow mb-4">
                            <!-- Card Header - Dropdown -->
                            <div
                                class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                <h6 class="m-0 font-weight-bold text-primary">Job Tasks</h6>
                                <div class="dropdown no-arrow">
                                    <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                                       data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">

                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in"
                                         aria-labelledby="dropdownMenuLink">
                                        <div class="dropdown-header">Dropdown Header:</div>
                                        <a class="dropdown-item" href="#">Action</a>
                                        <a class="dropdown-item" href="#">Another action</a>
                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item" href="#">Something else here</a>
                                    </div>
                                </div>
                            </div>
                            <!-- Card Body -->
                            <div class="card-body">

                                <fieldset>
                                    <legend>Tasks to do:</legend>

                                    <div>

                                        <table class="table table-bordered" id="dataTable"  >
                                            <thead>
                                            <tr>
                                                <th><?= h('id') ?></th>
                                                <th><?= h('job name') ?></th>
                                                <th><?= h('job description') ?></th>
                                                <th><?= h('job time') ?></th>
                                                <th><?= h('job status') ?></th>

                                            </tr>
                                            </thead>
                                            <tbody>
                                            <?php foreach ($job as $job):

                                                ?>
                                                <tr>

                                                    <td><?= $this->Number->format($job->id) ?></td>
                                                    <td><?= h($job->job_name) ?></td>
                                                    <td><?= h($job->job_desc) ?></td>
                                                    <td><?= h($job->job_time) ?></td>
                                                    <?php if ($job->job_status == 1):?>
                                                        <td><?= h('done');?></td>
                                                    <?php endif; ?>
                                                    <?php  if($job->job_status == 0):?>
                                                        <td><?= h('doing');?></td>
                                                    <?php endif; ?>
                                                </tr>
                                            <?php endforeach; ?>
                                            </tbody>
                                        </table>
                                        <script>
                                            $(document).ready(function() {
                                                $('#dataTable').DataTable();
                                            });

                                        </script>
                                    </div>

                                </fieldset>
                            </div>
                        </div>
                    </div>
                </div>

            </div>


        </div>

        <!-- Content Row -->


    </div>
    </div>
    </div>


</main>





<!-- Bootstrap core JavaScript-->
<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom scripts for all pages-->
<script src="js/sb-admin-2.min.js"></script>

<!-- Page level plugins -->
<script src="vendor/chart.js/Chart.min.js"></script>





</body>
</html>

<canvas id="myChart" width="400" height="400"></canvas>
<script>
    const ctx = document.getElementById('myChart').getContext('2d');
    var datas = new Array(0,0,0,0,0,0,0,0,0,0,0,0);
    var myDate = new Date();
    var year = myDate.getFullYear();



    <?php


    foreach ($orderS as $order):
    $datee = $order->date;?>
    var a = "<?php echo $datee;?>"
    var b = "<?php echo $order->total;?>"

    var date1 = new Date(year,0,1);
    var date2 = new Date(year,0,30);

    var date3 = new Date(year,1,28);
    var date4 = new Date(year,2,30);
    var date5 = new Date(year,3,30);
    var date6 = new Date(year,4,30);
    var date7 = new Date(year,5,30);
    var date8 = new Date(year,6,30);
    var date9 = new Date(year,7,30);
    var date10 = new Date(year,8,30);
    var date11 = new Date(year,9,30);
    var date12 = new Date(year,10,30);
    var date13 = new Date(year,11,30);
    var dateee = new Date(a);
    if(date1.getTime()<dateee&&dateee<date2.getTime()){
        let c = parseInt(datas[0]) + parseInt(b);
        datas[0] = c;
    }else if(date2.getTime()<dateee&&dateee<date3.getTime()){
        let c = parseInt(datas[1]) + parseInt(b);
        datas[1] = c;

    }else if(date3.getTime()<dateee&&dateee<date4.getTime()){
        let c = parseInt(datas[2]) + parseInt(b);
        datas[2] = c;
    }else if(date4.getTime()<dateee&&dateee<date5.getTime()){
        let c = parseInt(datas[3]) + parseInt(b);
        datas[3] = c;
    }else if(date5.getTime()<dateee&&dateee<date6.getTime()){
        let c = parseInt(datas[4]) + parseInt(b);
        datas[4] = c;
    }else if(date6.getTime()<dateee&&dateee<date7.getTime()){
        let c = parseInt(datas[5]) + parseInt(b);
        datas[5] = c;
    }else if(date7.getTime()<dateee&&dateee<date8.getTime()){
        let c = parseInt(datas[6]) + parseInt(b);
        datas[6] = c;
    }else if(date8.getTime()<dateee&&dateee<date9.getTime()){
        let c = parseInt(datas[7]) + parseInt(b);
        datas[7] = c;
    }else if(date9.getTime()<dateee&&dateee<date10.getTime()){
        let c = parseInt(datas[8]) + parseInt(b);
        datas[8] = c;
    }else if(date10.getTime()<dateee&&dateee<date11.getTime()){
        let c = parseInt(datas[9]) + parseInt(b);
        datas[9] = c;

    }else if(date11.getTime()<dateee&&dateee<date12.getTime()){
        let c = parseInt(datas[10]) + parseInt(b);
        datas[10] = c;
    }else if(date12.getTime()<dateee&&dateee<date13.getTime()){
        let c = parseInt(datas[11]) + parseInt(b);
        datas[11] = c;
    }



    <?php endforeach; ?>

    const myChart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun','Jul','Aug','Sep','Oct','Nov','Dec'],
            datasets: [{
                label: '$ of each month',
                data: datas,

                backgroundColor: [
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(255, 206, 86, 0.2)',
                    'rgba(75, 192, 192, 0.2)',
                    'rgba(153, 102, 255, 0.2)',
                    'rgba(255, 159, 64, 0.2)'
                ],
                borderColor: [
                    'rgba(255, 99, 132, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(153, 102, 255, 1)',
                    'rgba(255, 159, 64, 1)'
                ],
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
</script>

