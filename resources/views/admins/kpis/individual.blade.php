@extends('layouts.main')

@section('container')
    <div class="pagetitle">
        <h1>{{ $title }}</h1>
    </div>

    <section class="section">
        <div class="row">
          <div class="col-lg-12">
            <div class="card">
              <div class="card-body">
                <h5 class="card-title">Available KPI</h5>

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
                <a href="/kpis/create" class="btn btn-primary mb-3"><i class="bi bi-plus"></i> Add new </a>

                <table class="table table-striped datatable">
                  <thead>
                    <tr>
                      <th scope="col">#</th>
                      <th scope="col">Scorecard</th>
                      <th scope="col">KPI</th>
                      <th scope="col">Year</th>
                    </tr>
                  </thead>
                  <tbody>

                    @foreach ($kpis as $kpi)
                        <tr>
                            <th scope="row">{{ $loop->iteration }}</th>
                            <th>{{ ( $kpi->scorecard_id != 0) ? $kpi->scorecard->name : ''  }}</th>
                            <td>{{ $kpi->kpi }}</td>
                            <td>{{ $kpi->kpi_year }}</td>
                            <td>
                                <a href="javascript:void(0)" id="show-user" data-id="{{ $kpi->id }}" class="btn btn-info btn-sm" title="View">
                                    <i class="bi bi-eye"></i>
                                </a>
                                {{-- <a href="/kpis/{{ $kpi->id }}" class="btn btn-info btn-sm" title="View">
                                    <i class="bi bi-eye"></i>
                                </a> --}}
                                    <a href="/kpis/{{ $kpi->id }}/edit" class="btn btn-warning btn-sm" title="Update">
                                        <i class="bi bi-pencil"></i>
                                    </a>

                                    {{-- delete post --}}
                                    <form method="post" action="/kpis/{{ $kpi->id }}" class="d-inline">
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

            {{-- papar detail kpi --}}

            <!-- Default Card -->
            <div class="card" id="detailkpi" style="display: none;">
                <div class="card-body">
                    <h5 class="card-title">KPI Detail</h5>

                    <table class="table table-bordered table-responsive">
                        <tr>
                            <td style="width: 10%;">KPI</td>
                            <td><div id="kpi"></div></td>
                        </tr>
                        <tr>
                            <td>Weightage</td>
                            <td><span id="weightage"></span></td>
                        </tr>
                        <tr>
                            <td>Target</td>
                            <td><span id="target"></span></td>
                        </tr>
                        <tr>
                            <td>Measurement</td>
                            <td><span id="measurement"></span></td>
                        </tr>
                        <tr>
                            <td>Remark</td>
                            <td><div id="remark"></div></td>
                        </tr>
                        <tr>
                            <td>Progress</td>
                            <td><div id="progress"></div></td>
                        </tr>
                        <tr>
                            <td>Year</td>
                            <td><div id="year"></div></td>
                        </tr>
                    </table>
                </div>
            </div><!-- End Default Card -->

          </div>
        </div>
      </section>

      <script>
        $(document).ready(function () {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            /* When click show user */
                $('body').on('click', '#show-user', function () {
                var user_id = $(this).data('id');

                //alert(user_id);
                $.get('/kpis/showkpi?title=' + user_id, function (data) {
                    document.getElementById('detailkpi').style.display = 'block';
                    document.getElementById('kpi').innerHTML = data.kpi;
                    document.getElementById('weightage').innerHTML = data.weightage;
                    document.getElementById('target').innerHTML = data.target;
                    document.getElementById('measurement').innerHTML = data.measurement;
                    document.getElementById('remark').innerHTML = data.remark;
                    document.getElementById('progress').innerHTML = data.progress;
                    document.getElementById('year').innerHTML = data.kpi_year;
                })
            });

        });
      </script>

@endsection
