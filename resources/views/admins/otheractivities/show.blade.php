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
                <h5 class="card-title">Other Activity Detail</h5>

                <!-- Table with stripped rows -->
                <a href="/otheractivities" class="btn btn-secondary mb-3"><i class="bi bi-arrow-left-short"></i> Back to the list </a>

                <table class="table">
                  <tbody>
                        <tr>
                            <th >Activity</th>
                            <td>{{ $otheractivity->other_act }}</td>
                        </tr>
                        <tr>
                            <th >Leader</th>
                            <td>{{ $otheractivity->other_leader }}</td>
                        </tr>
                        <tr>
                            <th >Description</th>
                            <td>{!! $otheractivity->other_description !!}</td>
                        </tr>
                        <tr>
                            <th >Remark</th></th>
                            <td>{!! $otheractivity->other_remark !!}</td>
                        </tr>
                        <tr>
                            <th >Working Hours</th>
                            <td>{!! $otheractivity->other_working_hour !!}</td>
                        </tr>
                        <tr>
                            <th >Report Date</th>
                            <td>{{ ( $otheractivity->report_date == '0000-00-00') ? date('d-m-Y', strtotime($otheractivity->created_at)) : $otheractivity->report_date }}</td>
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
