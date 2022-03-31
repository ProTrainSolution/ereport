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
                <h5 class="card-title">Available scorecard</h5>

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
                <a href="/scorecards/create" class="btn btn-primary mb-3"><i class="bi bi-plus"></i> Add new </a>

                <table class="table table-striped datatable">
                  <thead>
                    <tr>
                      <th scope="col">#</th>
                      <th scope="col">Scorecard</th>
                      <th scope="col">Remark</th>
                      <th scope="col"></th>
                    </tr>
                  </thead>
                  <tbody>

                    @foreach ($scorecards as $scorecard)
                        <tr>
                            <th scope="row">{{ $loop->iteration }}</th>
                            <td>{{ $scorecard->name }}</td>
                            <td>{{ $scorecard->remark }}</td>
                            <td>
                                <a href="/scorecards/{{ $scorecard->id }}" class="btn btn-info btn-sm" title="View">
                                    <i class="bi bi-eye"></i>
                                </a>
                                    <a href="/scorecards/{{ $scorecard->id }}/edit" class="btn btn-warning btn-sm" title="Update">
                                        <i class="bi bi-pencil"></i>
                                    </a>

                                    {{-- delete post --}}
                                    <form method="post" action="/scorecards/{{ $scorecard->id }}" class="d-inline">
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
