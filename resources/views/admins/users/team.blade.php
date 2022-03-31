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
                      <th scope="col">Name</th>
                      <th scope="col">Email</th>
                      <th scope="col"># KPI</th>
                    </tr>
                  </thead>
                  <tbody>

                    @foreach ($users as $user)
                        <tr>
                            <th scope="row">{{ $loop->iteration }}</th>
                            <th>{{ $user->name  }}</th>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->kpis->where('kpi_year', $year)->count() }}</td>
                            <td>
                                <a href="/users/pizza/{{ $user->id }}" class="btn btn-info btn-sm" title="View">
                                    <i class="bi bi-eye"></i>
                                </a>
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
