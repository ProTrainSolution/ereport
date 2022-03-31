@extends('layouts.main')

@section('container')
    <div class="pagetitle">
        <h1>{{ $title }}</h1>
    </div>

    <section class="section">
        <div class="row">
            {{-- <div class="col-md-12">
                @foreach ($months as $month)
                    @if($month->month > 0)
                        @php
                            $monthNum  = 3;
                            $dateObj   = DateTime::createFromFormat('!m', $month->month);
                            $monthName = $dateObj->format('F');

                        @endphp
                        <div class="card col-md-1" style="display:inline-block;">
                            <div class="card-body">
                            <h5 class="card-title text-center">{{ $monthName }}</h5>
                            <h4 class="card-text text-center"></h4>
                            </div>
                        </div>
                    @endif
                @endforeach
            </div> --}}


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
                        <form action="/taskactivities" method="GET" class="row">
                            <div class="col-lg-6 mb-2">
                                <label for="inputName5" class="form-label">Task</label>
                                <input type="text" name="task" class="form-control" id="Task" placeholder="Task">
                            </div>

                            <div class="col-lg-3 mb-3">
                                <label for="" class="mb-2">Month</label>
                                <select name="task_month" id="task_month" class="form-control">
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
                                <select name="task_year" id="task_year" class="form-control">
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
          {{-- end filter part --}}

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

                <!-- Table with stripped rows -->
                <a href="/otheractivities/createdaily" class="btn btn-primary mb-3"><i class="bi bi-plus"></i> Add new daily </a>
                <a href="/otheractivities/createweekly" class="btn btn-primary mb-3"><i class="bi bi-plus"></i> Add new weekly </a>

                <table class="table table-striped datatable">
                  <thead>
                    <tr>
                      <th scope="col">#</th>
                      <th>Type</th>
                      <th scope="col">Task</th>
                      <th scope="col">Description</th>
                      <th scope="col">Working Hours</th>
                      <th scope="col">Leader</th>
                      <th></th>
                    </tr>
                  </thead>
                  <tbody>

                    @foreach ($otheractivities as $otheractivity)
                        <tr>
                            <th scope="row">{{ $loop->iteration }}</th>
                            @if($otheractivity->report_date == '0000-00-00')
                            <td>Weekly</td>
                            @else
                            <td>Daily</td>
                            @endif
                            <td >
                                {{ ( $otheractivity->other_act != Null) ? $otheractivity->other_act : ''  }}
                            </td>
                            <td>{!! $otheractivity->other_description !!}</td>
                            <td>{{ $otheractivity->other_working_hour }}</td>
                            <td>{{ $otheractivity->other_leader }}</td>
                            <td class="text-nowrap">
                                <a href="/otheractivities/{{ $otheractivity->id }}" class="btn btn-info btn-sm" title="View">
                                    <i class="bi bi-eye"></i>
                                </a>
                                @if($otheractivity->report_date == '0000-00-00')
                                    <a href="/otheractivities/editweekly/{{ $otheractivity->id }}" class="btn btn-warning btn-sm" title="Update">
                                        <i class="bi bi-pencil"></i>
                                    </a>
                                @else
                                    <a href="/otheractivities/editdaily/{{ $otheractivity->id }}" class="btn btn-warning btn-sm" title="Update">
                                        <i class="bi bi-pencil"></i>
                                    </a>
                                @endif

                                {{-- delete post --}}
                                <form method="post" action="/otheractotheractivitiesivities/{{ $otheractivity->id }}" class="d-inline">
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
                <!-- End Table with stripped rows -->

              </div>
            </div>

          </div>
        </div>
      </section>

@endsection
