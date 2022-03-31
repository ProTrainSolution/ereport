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
                <h5 class="card-title">Available User</h5>

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
                <a href="/users/create" class="badge bg-primary mb-3"><i class="bi bi-plus"></i> Add new </a>

                <table class="table table-striped datatable">
                  <thead>
                    <tr>
                      <th scope="col">#</th>
                      <th scope="col">Names</th>
                      <th scope="col">Email</th>
                      <th scope="col">Department</th>
                      <th scope="col">Unit</th>
                      <th scope="col"></th>
                    </tr>
                  </thead>
                  <tbody>

                    @foreach ($users as $user)
                        <tr>
                            <th scope="row">{{ $loop->iteration }}</th>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->department->name }}</td>
                            <td>{{ $user->unit->name }}</td>
                            <td>
                                <a href="/users/{{ $user->id }}" class="badge bg-info btn-sm" title="View">
                                    <i class="bi bi-eye"></i>
                                </a>

                                @if(Auth::user()->role_id == 1)
                                    <a href="/users/{{ $user->id }}/edit" class="badge bg-warning btn-sm" title="Update">
                                        <i class="bi bi-pencil"></i>
                                    </a>

                                    {{-- delete post --}}
                                    <form method="post" action="/units/{{ $user->id }}" class="d-inline">
                                        @method('delete')
                                        @csrf
                                        <button class="badge bg-danger border-0 btn-sm" onclick="return confirm('Are yu sure to delete?')" title="Remove">
                                            <i class="bi bi-trash2"></i>
                                        </button>
                                    </form>
                                @endif

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
