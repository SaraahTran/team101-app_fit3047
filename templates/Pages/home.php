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

    <?= $this->Html->css(['normalize.min', 'milligram.min', 'cake', 'home']) ?>

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

<main class="main">
        <div class="container">
            <div class="content">
      <h2>Dashboard</h2>

                                       <!-- Content Row -->

                                                       <div class="row">

                                                           <!-- Area Chart -->
                                                           <div class="col-xl-6 col-lg-7">
                                                               <div class="card shadow mb-4">
                                                                   <!-- Card Header - Dropdown -->
                                                                   <div
                                                                       class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                                                       <h6 class="m-0 font-weight-bold text-primary">Calendar</h6>
                                                                       <div class="dropdown no-arrow">
                                                                           <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                                                                               data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">

                                                                           </a>

                                                                       </div>
                                                                   </div>
                                                                   <!-- Card Body -->
                                                                   <div class="card-body text-center">
                                                                      <span class="text-center today align-items-center">Today is <b><br><?php
                                                                          echo date("d/m/Y") ?></span></b>
                                                                       <div class="chart-area">
                                                                           <canvas id="myAreaChart"></canvas>
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
                                                                       <h6 class="m-0 font-weight-bold text-primary">Job Tasks</h6>
                                                                       <div class="dropdown no-arrow">
                                                                           <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                                                                               data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">

                                                                           </a>

                                                                       </div>
                                                                   </div>
                                                                   <!-- Card Body -->
                                                                   <div class="card-body">
                                                                  <fieldset>
                                                                      <legend>Tasks to do:</legend>

                                                                      <?php
                                                                      /**
                                                                       * @var \App\View\AppView $this
                                                                       * @var \App\Model\Entity\Job[]|\Cake\Collection\CollectionInterface $jobs
                                                                       */

                                                                      echo $this->Html->css('/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet', ['block' => true]);
                                                                      echo $this->Html->script('/vendor/datatables/jquery.dataTables.min.js', ['block' => true]);
                                                                      echo $this->Html->script('/vendor/datatables/dataTables.bootstrap4.min.js', ['block' => true]);
                                                                      ?>
                                                                      <div class="jobs index content">

                                                                          <div class="table-responsive">
                                                                              <table class="table table-bordered" id="dataTable" width="100%">
                                                                                  <thead>
                                                                                  <tr>
                                                                                      <th><?= $this->Paginator->sort('id') ?></th>
                                                                                      <th><?= $this->Paginator->sort('job_desc') ?></th>
                                                                                      <th><?= $this->Paginator->sort('job_price') ?></th>
                                                                                      <th><?= $this->Paginator->sort('job_time') ?></th>
                                                                                      <th><?= $this->Paginator->sort('job_duration') ?></th>
                                                                                      <th class="actions"><?= __('Actions') ?></th>
                                                                                  </tr>
                                                                                  </thead>
                                                                                  <tbody>
                                                                                  <?php foreach ($jobs as $job): ?>
                                                                                      <tr>
                                                                                          <td><?= $this->Number->format($job->id) ?></td>
                                                                                          <td><?= h($job->job_desc) ?></td>
                                                                                          <td><?= $this->Number->format($job->job_price) ?></td>
                                                                                          <td><?= h($job->job_time) ?></td>
                                                                                          <td><?= $this->Number->format($job->job_duration) ?></td>
                                                                                          <td class="actions">
                                                                                              <?= $this->Html->link(__('View'), ['action' => 'view', $job->id]) ?>
                                                                                              <?= $this->Html->link(__('Edit'), ['action' => 'edit', $job->id]) ?>
                                                                                              <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $job->id], ['confirm' => __('Are you sure you want to delete # {0}?', $job->id)]) ?>
                                                                                          </td>
                                                                                      </tr>
                                                                                  <?php endforeach; ?>
                                                                                  </tbody>
                                                                              </table>
                                                                          </div>

                                                                      </div>



                                                                      <div>

                                                                       </div>
                                                                   </div>
                                                               </div>
                                                           </div>

                </div>

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
                                                                           <div class="h5 mb-0 font-weight-bold text-gray-800">
                                                                               15
                                                                           </div>
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
                                                                           <div class="h5 mb-0 font-weight-bold text-gray-800">20</div>
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
                                                                           <div class="h5 mb-0 font-weight-bold text-gray-800">18</div>
                                                                       </div>
                                                                       <div class="col-auto">
                                                                           <i class="fas fa-comments fa-2x text-gray-300"></i>
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






                </div>
            </div>
        </main>

    </header>

</body>
</html>
