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
                      <form method="post" action="/kpiactivities/storedaily">
                        @csrf
                        <div class="row mb-3">
                          <label for="title" class="col-sm-2 col-form-label">Task</label>
                          <div class="col-sm-10">
                            <select name="kpi_id" id="country" class="form-control @error('kpi_id') is-invalid @enderror">
                                <option value="">Select KPI</option>
                                @foreach ($kpis as $kpi)
                                    <option value="{{ $kpi->id }}">{{ $kpi->kpi }}</option>
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
                            <label class="col-sm-2 col-form-label">Sub Category:</label>
                            <div class="col-sm-10">
                                <select name="sub_category" id="subCategory" class="form-control">
                                    <option value="0">-- Select Sub Category --</option>
                                </select>
                            </div>
                            <label for="progress" id="progress" class="col-sm-"></label>
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
           $('#country').change(function () {
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
                             $("#progress").text(name);
                        }
                    }
                }
             })
           });
        });
      </script>

@endsection
