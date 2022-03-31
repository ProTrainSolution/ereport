@extends('layouts.main')

@section('container')

{{-- main title area --}}
<div class="pagetitle">
    <h1>Dashboard</h1>
    <!--
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
        <li class="breadcrumb-item active">Dashboard {{ $nilai }}</li>
      </ol>
    </nav>
-->
</div>

{{-- main section area --}}
<section class="section dashboard">
    <div class="row">
      <div class="col-lg-8">
        <div class="row">
          <!-- Sales Card -->
          <div class="col-xxl-4 col-md-6">
            <div class="card info-card sales-card">
              <div class="card-body">
                <h5 class="card-title">Hours <span>| This year</span></h5>

                <div class="d-flex align-items-center">
                  <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                    <i class="bi bi-clock-fill"></i>
                  </div>
                  <div class="ps-3">
                    <h6>
                          @php
                           $jumlah1 = App\Models\KpiActivity::where('year', date('Y'))
                                                            -> where ('user_id', Auth::user()->id)
                                                            ->sum('kpi_working_hour');
                           $jumlah2 = App\Models\OtherActivity::where('year', date('Y'))
                                                            -> where ('user_id', Auth::user()->id)
                                                            ->sum('other_working_hour');
                           $jumlah3 = App\Models\OtherActivity::where('year', date('Y'))
                                                            -> where ('user_id', Auth::user()->id)
                                                            ->sum('other_working_hour');
                           $jumlah = $jumlah1 + $jumlah2 + $jumlah3;
                          @endphp
                          {{ $jumlah }}

                    </h6>

                    <span class="text-success small pt-1 fw-bold">{{ date('Y') }}</span> <span class="text-muted small pt-2 ps-1"></span>

                  </div>
                </div>
              </div>

            </div>
          </div>

          <div class="col-xxl-4 col-md-6">
            <div class="card info-card revenue-card">
              <div class="card-body">
                <h5 class="card-title">Hours <span>| This Month</span></h5>

                <div class="d-flex align-items-center">
                  <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                    <i class="bi bi-clock"></i>
                  </div>
                  <div class="ps-3">
                    <h6>
                        @php
                           $m1 = App\Models\KpiActivity::where('month', date('n'))
                                                            -> where ('user_id', Auth::user()->id)
                                                            -> where ('year', date('Y'))
                                                            -> sum('kpi_working_hour');
                           $m2 = App\Models\TaskActivity::where('month', date('n'))
                                                            -> where ('user_id', Auth::user()->id)
                                                            -> where ('year', date('Y'))
                                                            ->sum('task_working_hour');
                           $m3 = App\Models\OtherActivity::where('month', date('n'))
                                                            -> where ('user_id', Auth::user()->id)
                                                            -> where ('year', date('Y'))
                                                            ->sum('other_working_hour');
                           $m = $m1 + $m2 + $m3;
                          @endphp
                          {{ $m }}
                    </h6>
                    <span class="text-success small pt-1 fw-bold">{{ date('F') }}</span> <span class="text-muted small pt-2 ps-1"></span>

                  </div>
                </div>
              </div>

            </div>
          </div>

          <div class="col-xxl-4 col-xl-12">

            <div class="card info-card customers-card">

              <div class="card-body">
                <h5 class="card-title">KPI <span>| {{ date('Y') }}</span></h5>

                <div class="d-flex align-items-center">
                  <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                    <i class="bi bi-clock-history"></i>
                  </div>
                  <div class="ps-3">
                    <h6>
                        @php
                            $baris = App\Models\Kpi::where('kpi_year', date('Y'))
                                                            -> where ('user_id', Auth::user()->id)
                                                            -> count();
                            $progress = App\Models\Kpi::where('kpi_year', date('Y'))
                                                            -> where ('user_id', Auth::user()->id)
                                                            -> sum('progress');

                            if ($baris > 0){
                                $nProgress = ($progress / ($baris * 100)) * 100;
                            } else {
                                $nProgress = 0;
                            }

                        @endphp
                        {{ $baris }}
                    </h6>
                    @php

                    @endphp
                    <span class="text-danger small pt-1 fw-bold">{{ $nProgress }}%</span> <span class="text-muted small pt-2 ps-1">progress</span>

                  </div>
                </div>

              </div>
            </div>

          </div>

          {{-- working hours chart --}}
          <div class="col-lg-12">
            <div class="card">
              <div class="card-body">
                <h5 class="card-title">Working Hours</h5>

                <!-- Line Chart -->
                <canvas id="lineChart" style="max-height: 400px;"></canvas>
                <script>
                  document.addEventListener("DOMContentLoaded", () => {
                    new Chart(document.querySelector('#lineChart'), {
                      type: 'line',
                      data: {
                        labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'],
                        datasets: [{
                          label: 'Hours',
                          data: [@php echo App\Http\Controllers\HomeController::getHour();  @endphp],
                          fill: false,
                          borderColor: 'rgb(75, 192, 192)',
                          tension: 0.1
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
                  });
                </script>
                <!-- End Line CHart -->

              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- End Left side columns -->

      {{-- Right side columns --}}
      <div class="col-lg-4">
        <div class="card">
            <div class="card-body">
              <h5 class="card-title">KPI <span>| Progress</span></h5>

              <!-- Radar Chart -->
              <canvas id="radarChart" style="max-height: 400px; display: block; box-sizing: border-box; height: 400px; width: 719px;" width="719" height="400"></canvas>
              <script>
                @php
                    $data = '';
                    $progress = '';
                    $completion = '';

                    // for ($i=1; $i<6; ++$i){
                    //     $data .= "'Baris " . $i . "',";
                    // }
                    foreach ($kpis as $kpi)
                    {
                        $data .= "'" . $kpi->kpi . "',";
                        $progress .= $kpi->progress . ",";
                        $completion .= 100 . ",";
                    }
                @endphp
                document.addEventListener("DOMContentLoaded", () => {
                  new Chart(document.querySelector('#radarChart'), {
                    type: 'radar',
                    data: {
                      //labels: ['January', 'February', 'March', 'April', 'May'],
                      labels: [
                        @php
                            echo $data;
                        @endphp
                      ],
                      @php
                            //App\Http\Controllers\HomeController::getRadarLabels();


                      @endphp
                      datasets: [{
                        label: 'Progess',
                        data: [
                            @php
                                echo $progress;
                            @endphp
                        ],
                        fill: true,
                        backgroundColor: 'rgba(255, 99, 132, 0.2)',
                        borderColor: 'rgb(255, 99, 132)',
                        pointBackgroundColor: 'rgb(255, 99, 132)',
                        pointBorderColor: '#fff',
                        pointHoverBackgroundColor: '#fff',
                        pointHoverBorderColor: 'rgb(255, 99, 132)'
                      }, {
                        label: 'Completion',
                        data: [
                            @php
                                echo $completion;
                            @endphp
                        ],
                        fill: true,
                        backgroundColor: 'rgba(54, 162, 235, 0.2)',
                        borderColor: 'rgb(54, 162, 235)',
                        pointBackgroundColor: 'rgb(54, 162, 235)',
                        pointBorderColor: '#fff',
                        pointHoverBackgroundColor: '#fff',
                        pointHoverBorderColor: 'rgb(54, 162, 235)'
                      }]
                    },
                    options: {
                      elements: {
                        line: {
                          borderWidth: 3
                        }
                      }
                    }
                  });
                });
              </script>
              <!-- End Radar CHart -->

            </div>
        </div>

        {{-- display latest submission report --}}
        <div class="card">
            <div class="card-body">
            <h5 class="card-title">Latest Submission Report</h5>

            <!-- Accordion without outline borders -->
            <div class="accordion accordion-flush" id="accordionFlushExample">
                <div class="accordion-item">
                <h2 class="accordion-header" id="flush-headingOne">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                    KPI Activities
                    </button>
                </h2>
                <div id="flush-collapseOne" class="accordion-collapse collapse show" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample" style="">
                    <div class="accordion-body">
                        <div class="activity">
                            @foreach ($kpiActivities as $kpiActivity)
                                <div class="activity-item d-flex">
                                    <div class="activite-label">
                                        {{-- {{ \Carbon\Carbon::parse( $kpiActivity->created_date )->toDateString()->format('d-m-Y') }} --}}
                                        {{ \Carbon\Carbon::parse($kpiActivity->created_date)->format('d-m-Y'); }}
                                    </div>
                                    <i class="bi bi-circle-fill activity-badge text-success align-self-start"></i>
                                    <div class="activity-content">
                                        {{ $kpiActivity->kpi->kpi }}
                                    </div>
                                </div><!-- End activity item-->
                            @endforeach
                        </div>
                    </div>
                </div>
                </div>
                <div class="accordion-item">
                <h2 class="accordion-header" id="flush-headingTwo">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseTwo">
                    Task Activities
                    </button>
                </h2>
                <div id="flush-collapseTwo" class="accordion-collapse collapse" aria-labelledby="flush-headingTwo" data-bs-parent="#accordionFlushExample" style="">
                    <div class="accordion-body">
                        <div class="activity">
                            @foreach ($taskActivities as $taskActivity)
                                <div class="activity-item d-flex">
                                    <div class="activite-label">
                                        {{-- {{ \Carbon\Carbon::parse( $kpiActivity->created_date )->toDateString()->format('d-m-Y') }} --}}
                                        {{ \Carbon\Carbon::parse($taskActivity->created_at)->format('d-m-Y'); }}
                                    </div>
                                    <i class="bi bi-circle-fill activity-badge text-success align-self-start"></i>
                                    <div class="activity-content">
                                        {{ $taskActivity->task->task }}
                                    </div>
                                </div><!-- End activity item-->
                            @endforeach
                        </div>
                    </div>
                </div>
                </div>
                <div class="accordion-item">
                <h2 class="accordion-header" id="flush-headingThree">
                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseThree" aria-expanded="true" aria-controls="flush-collapseThree">
                    Other Activity
                    </button>
                </h2>
                <div id="flush-collapseThree" class="accordion-collapse collapse" aria-labelledby="flush-headingThree" data-bs-parent="#accordionFlushExample" style="">
                    <div class="accordion-body">
                        <div class="activity">
                            @foreach ($otherActivities as $otherActivity)
                                <div class="activity-item d-flex">
                                    <div class="activite-label">
                                        {{-- {{ \Carbon\Carbon::parse( $kpiActivity->created_date )->toDateString()->format('d-m-Y') }} --}}
                                        {{ \Carbon\Carbon::parse($otherActivity->created_at)->format('d-m-Y'); }}
                                    </div>
                                    <i class="bi bi-circle-fill activity-badge text-success align-self-start"></i>
                                    <div class="activity-content">
                                        {{ $otherActivity->other_act }}
                                    </div>
                                </div><!-- End activity item-->
                            @endforeach
                        </div>
                    </div>
                </div>
                </div>
            </div><!-- End Accordion without outline borders -->

            </div>
        </div>
      </div>



    </div>
  </section>

@endsection
