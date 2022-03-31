@extends('layouts.main')

@section('container')
    <div class="pagetitle">
        <h1>{{ $title }}</h1>
    </div>

    <section class="section">
        <div class="row">
            <div class="col-md-12">
                @foreach ($months as $month)
                    @if($month->month > 0)
                        @php
                            $year = date('Y');
                            $monthNum  = 3;
                            $dateObj   = DateTime::createFromFormat('!m', $month->month);
                            $monthName = $dateObj->format('F');

                        @endphp
                        <div class="card col-md-1" style="display:inline-block;">
                            <div class="card-body">
                            <h5 class="card-title text-center">{{ $monthName }}</h5>
                            <h4 class="card-text text-center">
                                {{-- {{ App\Http\Controllers\KpiActivityController::getHour($month->month); }} --}}
                                {{ App\Models\KpiActivity::where('month',$month->month)
                                                         -> where ('user_id', Auth::user()->id)
                                                         -> where ('year', $year)
                                                         ->sum('kpi_working_hour'); }}
                            </h4>
                            </div>
                        </div>
                    @endif
                @endforeach
            </div>

            <div class="card">
                <div class="card-body">
                  <h5 class="card-title">Default Tabs</h5>

                  <!-- Default Tabs -->
                  <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item" role="presentation">
                      <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button" role="tab" aria-controls="home" aria-selected="true">KPI</button>
                    </li>
                    <li class="nav-item" role="presentation">
                      <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="false">Non KPI</button>
                    </li>
                    <li class="nav-item" role="presentation">
                      <button class="nav-link" id="contact-tab" data-bs-toggle="tab" data-bs-target="#contact" type="button" role="tab" aria-controls="contact" aria-selected="false">Other</button>
                    </li>
                  </ul>
                  <div class="tab-content pt-2" id="myTabContent">
                    <div class="tab-pane fade active show" id="home" role="tabpanel" aria-labelledby="home-tab">
                        {{-- **************** bahagian KPI ********************* --}}
                        {{-- main kpi filter --}}
                        <!--
                        <div class="col-lg-12 mb-3">
                            <div class="accordion" id="accordionExample">
                                <div class="accordion-item">
                                    <h1 class="accordion-header" id="headingOne">
                                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                        Advance Search
                                    </button>
                                    </h1>
                                    <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample" style="">
                                    <div class="accordion-body">
                                        <form action="/kpiactivities" method="GET" class="row">
                                            <div class="col-lg-6 mb-2">
                                                <label for="inputName5" class="form-label">KPI</label>
                                                <input type="text" name="kpi" class="form-control" id="kpi" placeholder="Task">
                                            </div>

                                            <div class="col-lg-3 mb-3">
                                                <label for="" class="mb-2">Month</label>
                                                <select name="kpi_month" id="kpi_month" class="form-control">
                                                    <option value="">Month</option>
                                                    @php
                                                        for ($i = 0; $i < 12; $i++) {
                                                            $time = strtotime(sprintf('%d months', $i));
                                                            $label = date('F', $time);
                                                            $value = date('n', $time);
                                                            echo "<option value='$value'>$label</option>";
                                                        }
                                                    @endphp
                                                </select>
                                            </div>

                                            <div class="col-lg-3 mb-3">
                                                <label for="" class="mb-2">Year</label>
                                                <select name="kpi_year" id="kpi_year" class="form-control">
                                                    <option value="">Year</option>

                                                    {{ $last = now()->year - 5 }}
                                                    @for($i = now()->year; $i > $last; $i--)
                                                    <option value="{{ $i }}">{{ $i }}</option>
                                                    @endfor
                                                </select>
                                            </div>

                                            <div class="col-lg-12">
                                                <input type="submit" name="filter" value="Search" class="btn btn-secondary">
                                            </div>
                                        </form>
                                    </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        -->
                        <div class="col-lg-12">
                            <div class="card">
                              <div class="card-body">
                                <h5 class="card-title">Available report</h5>

                                {{-- display alert --}}
                                @if (session()->has('success'))
                                    <div class="alert alert-success" role="alert">
                                        {{ session('success') }}
                                    </div>
                                @endif

                                @if (session()->has('delete'))
                                    <div class="alert alert-danger" role="alert">
                                        {{ session('delete') }}
                                    </div>
                                @endif

                                <a href="/kpiactivities/createdaily" class="btn btn-primary mb-3"><i class="bi bi-plus"></i> Add new daily </a>
                                <a href="/kpiactivities/createweekly" class="btn btn-primary mb-3"><i class="bi bi-plus"></i> Add new weekly </a>

                                <table class="table table-striped datatable">
                                  <thead>
                                    <tr>
                                      <th scope="col">#</th>
                                      <th>Type</th>
                                      <th scope="col">KPI</th>
                                      <th scope="col">Description</th>
                                      <th scope="col">Working Hours</th>
                                      <th scope="col">Progress</th>
                                      <th></th>
                                    </tr>
                                  </thead>
                                  <tbody>

                                    @foreach ($kpiactivities as $kpiactivity)
                                        <tr>
                                            <th scope="row">{{ $loop->iteration }}</th>
                                            @if($kpiactivity->report_date == '0000-00-00')
                                            <td>Weekly</td>
                                            @else
                                            <td>Daily</td>
                                            @endif
                                            <td >
                                                {{-- {{ ( $kpiactivity->kpi_id != 0) ? $kpiactivity->kpi->kpi : ''  }} --}}
                                                {{ $kpiactivity->kpi->kpi ?? 'KPI Not found'  }}
                                                {{-- @if($kpiactivity->kpi_id > 0)
                                                    {{ $kpiactivity->kpi->scorecard_id }}
                                                @else
                                                    Null
                                                @endif --}}
                                            </td>
                                            <td>{!! $kpiactivity->kpi_description !!}</td>
                                            <td>{{ $kpiactivity->kpi_working_hour }}</td>
                                            <td>{{ $kpiactivity->kpi_progress }}</td>
                                            <td class="text-nowrap">
                                                <a href="/kpiactivities/{{ $kpiactivity->id }}" class="btn btn-info btn-sm" title="View">
                                                    <i class="bi bi-eye"></i>
                                                </a>
                                                @if($kpiactivity->report_date == '0000-00-00')
                                                    <a href="/kpiactivities/editweekly/{{ $kpiactivity->id }}" class="btn btn-warning btn-sm" title="Update">
                                                        <i class="bi bi-pencil"></i>
                                                    </a>
                                                @else
                                                    <a href="/kpiactivities/editdaily/{{ $kpiactivity->id }}" class="btn btn-warning btn-sm" title="Update">
                                                        <i class="bi bi-pencil"></i>
                                                    </a>
                                                @endif

                                                {{-- delete post --}}
                                                <form method="post" action="/kpiactivities/{{ $kpiactivity->id }}" class="d-inline">
                                                    @method('delete')
                                                    @csrf
                                                    <button class="btn btn-danger border-0 btn-sm" onclick="return confirm('Are yu sure to delete?')" title="Remove">
                                                        <i class="bi bi-trash2"></i>
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach

                                  </tbody>
                                </table>

                              </div>
                            </div>
                        </div>
                        {{-- **************** penutup KPI ********************** --}}
                    </div>
                    <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                      Nesciunt totam et. Consequuntur magnam aliquid eos nulla dolor iure eos quia. Accusantium distinctio omnis et atque fugiat. Itaque doloremque aliquid sint quasi quia distinctio similique. Voluptate nihil recusandae mollitia dolores. Ut laboriosam voluptatum dicta.
                    </div>
                    <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
                      Saepe animi et soluta ad odit soluta sunt. Nihil quos omnis animi debitis cumque. Accusantium quibusdam perspiciatis qui qui omnis magnam. Officiis accusamus impedit molestias nostrum veniam. Qui amet ipsum iure. Dignissimos fuga tempore dolor.
                    </div>
                  </div><!-- End Default Tabs -->

                </div>
              </div>

          <!-- main filter

          -->
          {{-- end filter part --}}




          </div>

        </div>
      </section>

@endsection
