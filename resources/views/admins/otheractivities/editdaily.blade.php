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
                      <h5 class="card-title">Other Activities<br>{{-- <small>List down your main activities of the month, the start and end date as well as the status</small> --}}</h5>


                      <!-- General Form Elements -->
                      <form method="post" action="/otheractivities/updatedaily">
                        @method('put')
                        @csrf
                        <div class="row mb-3">
                            <label for="title" class="col-sm-2 col-form-label">Activity</label>
                            <div class="col-sm-10">
                              <input type="hidden" name="id" value="{{ $otheractivity->id }}">
                              <input type="text" name="other_act" id="other_act" class="form-control @error('other_act') is-invalid @enderror" value="{{ old('other_act', $otheractivity->other_act) }}">
                              @error('other_act')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                              @enderror
                            </div>
                          </div>

                          <div class="row mb-3">
                              <label for="title" class="col-sm-2 col-form-label">Task</label>
                              <div class="col-sm-10">
                                <input type="text" name="other_leader" id="other_leader" class="form-control @error('other_leader') is-invalid @enderror" value="{{ old('other_leader', $otheractivity->other_leader) }}">
                                @error('other_leader')
                                      <div class="invalid-feedback">
                                          {{ $message }}
                                      </div>
                                @enderror
                              </div>
                          </div>

                        <div class="row mb-3">
                          <label for="description" class="col-sm-2 col-form-label">Description</label>
                          <div class="col-sm-10">
                            <textarea class="form-control tinymce-editor" rows="5" name="other_description" id="other_description">{{ old('other_description', $otheractivity->other_description) }}</textarea>
                          </div>
                        </div>

                        <div class="row mb-3">
                            <label for="description" class="col-sm-2 col-form-label">Remark</label>
                            <div class="col-sm-10">
                              <textarea class="form-control tinymce-editor" rows="5" name="other_remark" id="other_remark">{{ old('other_remark', $otheractivity->other_remark) }}</textarea>
                            </div>
                          </div>

                        <div class="row mb-3">
                            <label for="title" class="col-sm-2 col-form-label">Date</label>
                            <div class="col-sm-2">
                              <input type="date" name="report_date" id="report_date" class="form-control @error('report_date') is-invalid @enderror" value="{{ old('report_date', $otheractivity->report_date) }}">
                              @error('report_date')
                                  <div class="invalid-feedback">
                                      {{ $message }}
                                  </div>
                              @enderror
                            </div>

                            <label for="title" class="col-sm-2 col-form-label">Working Hour(s)</label>
                            <div class="col-sm-2">
                              <input type="number" step="0.01" name="other_working_hour" id="other_working_hour" class="form-control @error('other_working_hour') is-invalid @enderror" value="{{ old('task_working_hour', $otheractivity->other_working_hour)}}">
                              @error('other_working_hour')
                                  <div class="invalid-feedback">
                                      {{ $message }}
                                  </div>
                              @enderror
                            </div>

                            {{--
                            <label for="kpi_week" class="col-sm-1 col-form-label">Week</label>
                            <div class="col-sm-2">
                                <select class="form-control" name="kpi_week">
                                    <option> Select week</option>
                                    <?php
                                        $currYear = date('Y');
                                        $currMonth = date('m');
                                        //$currName  = date('M');

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
                            --}}
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