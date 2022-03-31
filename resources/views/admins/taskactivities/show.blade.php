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
                <h5 class="card-title">Display role</h5>

                <!-- Table with stripped rows -->
                <a href="/kpidepartments" class="btn btn-secondary mb-3"><i class="bi bi-arrow-left-short"></i> Back to the list </a>

                <table class="table">
                  <tbody>
                        <tr>
                            <th >Scorecard</th>
                            <td>{{ $kpidepartment->scorecard->name }}</td>
                        </tr>
                        <tr>
                            <th >Display name</th>
                            <td>{{ $kpidepartment->kpi }}</td>
                        </tr>
                        <tr>
                            <th >Description</th>
                            <td>{!! $kpidepartment->description !!}</td>
                        </tr>
                        <tr>
                            <th >Target</th>
                            <td>{!! $kpidepartment->target !!}</td>
                        </tr>
                        <tr>
                            <th >Measurement</th></th>
                            <td>{!! $kpidepartment->measurement !!}</td>
                        </tr>
                        <tr>
                            <th >Remark</th>
                            <td>{!! $kpidepartment->remark !!}</td>
                        </tr>
                        <tr>
                            <th >Year</th>
                            <td>{{ $kpidepartment->kpi_year }}</td>
                        </tr>
                  </tbody>
                </table>
                <!-- End Table with stripped rows -->

              </div>
            </div>

          </div>
        </div>
      </section>

@endsection
