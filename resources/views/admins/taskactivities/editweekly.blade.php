@extends('layouts.main')

@section('container')
    <?php
    function weeks($month, $year){
        $firstday = date("w", mktime(0, 0, 0, $month, 1, $year));
        $lastday = date("t", mktime(0, 0, 0, $month, 1, $year));
        if ($firstday!=0) $count_weeks = 1 + ceil(($lastday-8+$firstday)/7);
        else $count_weeks = 1 + ceil(($lastday-1)/7);
        return $count_weeks;
        }
    ?>

    <div class="pagetitle">
        <h1>{{ $title }}</h1>
    </div>

    <section class="section">
        <div class="row">
          <div class="col-lg-12">

            <div class="row">
                <div class="col-lg-12">

                  <div class="card">
                    <div class="card-body">
                      <h5 class="card-title">Daily Activities (Non-KPI)<br>{{-- <small>List down your main activities of the month, the start and end date as well as the status</small> --}}</h5>


                      <!-- General Form Elements -->
                      <form method="post" action="/taskactivities/updateweekly">
                        @method('put')
                        @csrf
                        <div class="row mb-3">
                          <input type="hidden" name="id" placeholder="" value="{{ $taskactivity->id}}">
                          <label for="title" class="col-sm-2 col-form-label">Task</label>
                          <div class="col-sm-10">
                            <select name="task_act" id="task_act" class="form-control @error('task_act') is-invalid @enderror">
                                @foreach ($tasks as $task)
                                    @if (old('task_act', $taskactivity->task_act) == $task->id)
                                        <option value="{{ $task->id }}" selected>{{ $task->task }}</option>
                                    @else
                                        <option value="{{ $task->id }}">{{ ucwords($task->task) }}</option>
                                    @endif
                                @endforeach
                            </select>
                            @error('task_act')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                          </div>
                        </div>

                        <div class="row mb-3">
                          <label for="description" class="col-sm-2 col-form-label">Description</label>
                          <div class="col-sm-10">
                            <textarea class="form-control tinymce-editor" rows="5" name="task_description" id="task_description">{{ old('task_description', $taskactivity->task_description) }}</textarea>
                          </div>
                        </div>

                        <div class="row mb-3">
                            <label for="kpi_week" class="col-sm-2 col-form-label">Week</label>
                            <div class="col-sm-2">
                                <select class="form-control" name="week">

                                    <?php
                                        $tMonth = $taskactivity->month;
                                        $tWeek = $taskactivity->week;

                                        $tData = $tWeek . '_' . $tMonth;

                                        $currYear = date('Y');
                                        $currMonth = date('m');
                                        //$currName  = date('M');

                                        // get month
                                        $label = date("F", mktime(0, 0, 0, $tMonth, 10));
                                    ?>
                                    @if($tWeek > 0)
                                    <option value="@php echo $tData; @endphp"> @php echo 'Week ' . $tWeek . ' - ' . $label; @endphp</option>
                                    @else
                                    <option> Select week</option>
                                    @endif
                                    <?php
                                        if($currMonth >= 1 && $currMonth <= 12){
                                            //The month is valid.
                                            //Get the textual representation.
                                            $currName = date("F", strtotime("2001-" . $currMonth . "-01"));
                                        }

                                        $lastMonth = $currMonth - 1;

                                        if($lastMonth >= 1 && $lastMonth <= 12){
                                            //The month is valid.
                                            //Get the textual representation.
                                            $lastName = date("F", strtotime("2001-" . $lastMonth . "-01"));
                                        }

                                        // get num of week
                                        $currWeek = weeks($currMonth,$currYear);
                                        $lastWeek = weeks($lastMonth,$currYear);


                                        for ($h=1; $h<=$lastWeek; ++$h){
                                    ?>
                                        <option value="<?php echo $h; ?>_<?php echo $lastMonth; ?>">Week <?php echo $h; ?> - <?php echo $lastName; ?></option>
                                    <?php
                                        }
                                    ?>

                                    <?php
                                        for ($i=1; $i<=$currWeek; ++$i){
                                    ?>
                                        <option value="<?php echo $i; ?>_<?php echo $currMonth; ?>">Week <?php echo $i; ?> - <?php echo $currName; ?></option>
                                    <?php
                                        }
                                    ?>
                                </select>
                            </div>

                            <label for="title" class="col-sm-2 col-form-label">Working Hour(s)</label>
                            <div class="col-sm-2">
                              <input type="number" step="0.01" name="task_working_hour" id="task_working_hour" class="form-control @error('task_working_hour') is-invalid @enderror" value="{{ old('task_working_hour', $taskactivity->task_working_hour)}}">
                              @error('task_working_hour')
                                  <div class="invalid-feedback">
                                      {{ $message }}
                                  </div>
                              @enderror
                            </div>

                            <label for="title" class="col-sm-2 col-form-label">Progress (%)</label>
                            <div class="col-sm-2">
                              <input type="number" step="0.01" name="task_progress" id="task_progress" class="form-control @error('task_progress') is-invalid @enderror" value="{{ old('task_progress', $taskactivity->task_progress) }}">
                              @error('task_progress')
                                  <div class="invalid-feedback">
                                      {{ $message }}
                                  </div>
                              @enderror
                            </div>


                        </div>

                        <a href="/taskactivities" class="btn btn-secondary d-inline mt-2">Cancel</a>
                        <button type="submit" class="btn btn-primary"> Submit </button>

                      </form><!-- End General Form Elements -->

                    </div>
                  </div>

                </div>
              </div>

          </div>
        </div>
      </section>

@endsection
