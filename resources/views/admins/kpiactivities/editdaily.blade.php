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
                      <h5 class="card-title">Daily Activities (KPI)<br>{{-- <small>List down your main activities of the month, the start and end date as well as the status</small> --}}</h5>


                      <!-- General Form Elements -->
                      <form method="post" action="/kpiactivities/updatedaily">
                        @method('put')
                        @csrf
                        <div class="row mb-3">
                          <input type="hidden" name="id" value="{{ $kpiactivity->id }}">
                          <label for="title" class="col-sm-2 col-form-label">KPI</label>
                          <div class="col-sm-10">
                            <select name="kpi_id" id="kpi_id" class="form-control @error('kpi_id') is-invalid @enderror" readonly>
                                @foreach ($kpis as $kpi)
                                    @if (old('kpi_id', $kpiactivity->kpi_id) == $kpi->id)
                                        <option value="{{ $kpiactivity->id }}" selected>{{ $kpiactivity->kpi->kpi }}</option>
                                    @else
                                        <option value="{{ $kpi->id }}">{{ $kpi->kpi }}</option>
                                    @endif
                                @endforeach
                            </select>
                            @error('kpi_id')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                          </div>
                        </div>

                        <div class="row mb-3">
                          <label for="kpi_description" class="col-sm-2 col-form-label">Description</label>
                          <div class="col-sm-10">
                            <textarea class="form-control tinymce-editor" rows="5" name="kpi_description" id="kpi_description">{{ old('kpi_description', $kpiactivity->kpi_description) }}</textarea>
                          </div>
                        </div>

                        <div class="row mb-3">
                            <label for="title" class="col-sm-2 col-form-label">Date</label>
                            <div class="col-sm-2">
                              <input type="date" name="report_date" id="report_date" class="form-control @error('report_date') is-invalid @enderror" value="{{ old('report_date', $kpiactivity->report_date) }}">
                              @error('report_date')
                                  <div class="invalid-feedback">
                                      {{ $message }}
                                  </div>
                              @enderror
                            </div>

                            <label for="kpi_working_hour" class="col-sm-2 col-form-label">Working Hour(s)</label>
                            <div class="col-sm-2">
                              <input type="number" name="kpi_working_hour" id="kpi_working_hour" class="form-control @error('kpi_working_hour') is-invalid @enderror" value="{{ old('kpi_working_hour', $kpiactivity->kpi_working_hour) }}">
                              @error('kpi_working_hour')
                                  <div class="invalid-feedback">
                                      {{ $message }}
                                  </div>
                              @enderror
                            </div>

                            <label for="kpi_progress" class="col-sm-2 col-form-label">Progress (%)</label>
                            <div class="col-sm-2">
                              <input type="number" name="kpi_progress" id="kpi_progress" class="form-control @error('kpi_progress') is-invalid @enderror" value="{{ old('kpi_progress', $kpiactivity->kpi_progress) }}">
                              {{-- <input type="text" id="currProgress" name="currProgress"> --}}
                              <label for="currProgress" id="lblCurrProgress" class="font-weight-bold">Current Progress: <span id="currProgress">{{ $kpiactivity->kpi_progress }}</span></label>
                              @error('kpi_progress')
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


                        <a href="/kpiactivities" class="btn btn-secondary d-inline mt-2">Cancel</a>
                        <button type="submit" class="btn btn-primary"> Submit </button>

                      </form><!-- End General Form Elements -->

                    </div>
                  </div>

                </div>
              </div>

          </div>
        </div>
      </section>

      {{-- untuk auto dropdown --}}
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
      <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>


      <script type="text/javascript">
        $(document).ready(function () {
           $('#kpi_id').change(function () {
             var id = $(this).val();

             $('#subCategory').find('option').not(':first').remove();

             $.ajax({
                url:'/kpiactivities/getCategory/'+id,
                type:'get',
                dataType:'json',
                success:function (response) {
                    var len = 0;
                    if (response.data != null) {
                        len = response.data.length;
                    }

                    if (len>0) {
                        for (var i = 0; i<len; i++) {
                             var id = response.data[i].id;
                             var name = response.data[i].progress;

                             var option = "<option value='"+id+"'>"+name+"</option>";

                             $("#subCategory").append(option);
                             $("#currProgress").text(name);
                        }
                    }
                }
             })
           });
        });
      </script>

@endsection
