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
                <a href="/roles" class="btn btn-secondary mb-3"><i class="bi bi-arrow-left-short"></i> Back to role list </a>

                <table class="table">
                  <tbody>
                        <tr>
                            <th >Department</th>
                            <td>{{ $department->name }}</td>
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
