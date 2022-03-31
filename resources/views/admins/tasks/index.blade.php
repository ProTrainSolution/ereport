@extends('layouts.main')

@section('container')
    <div class="pagetitle">
        <h1>{{ $title }}</h1>
    </div>

    <section class="section">
        <div class="row mb-3">
            <div class="col-lg-12">
                <div class="accordion" id="accordionExample">
                    <div class="accordion-item">
                      <h1 class="accordion-header" id="headingOne">
                        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                          Advance Search
                        </button>
                      </h1>
                      <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample" style="">
                        <div class="accordion-body">
                            <form action="/tasks" method="GET" class="row">
                                <div class="col-lg-12 mb-2">
                                    <label for="inputName5" class="form-label">Task</label>
                                    <input type="text" name="task" class="form-control" id="Task" placeholder="Task">
                                </div>

                                <div class="col-lg-6 mb-3">
                                    <label for="">Staff name</label>
                                    <select name="user_id" id="user_id" class="form-control">
                                        <option value=""></option>
                                        @foreach($users as $user)
                                            <option value="{{ $user->id }}">{{ $user->name }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="col-lg-6 mb-3">
                                    <label for="">Year</label>
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
        </div>
        {{-- end filter part --}}

        <div class="row">
          <div class="col-lg-12">

            <div class="card">
              <div class="card-body">
                <h5 class="card-title">Available task</h5>

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

                <a href="/tasks/create" class="btn btn-primary mb-3"><i class="bi bi-plus"></i> Add new </a>

                <table class="table table-striped datatable">
                  <thead>
                    <tr>
                      <th scope="col">#</th>
                      <th scope="col">User</th>
                      <th scope="col">Task</th>
                      <th scope="col">Description</th>
                      <th scope="col">Year</th>
                      <th scope="col"></th>
                    </tr>
                  </thead>
                  <tbody>

                    @foreach ($tasks as $task)
                        <tr>
                            <th scope="row">{{ $loop->iteration }}</th>
                            <td>{{ $task->user->name }}</td>
                            <td>{{ $task->task }}</td>
                            <td>{{ $task->description }}</td>
                            <td>{{ $task->task_year }}</td>
                            <td class="d-inline" style="">
                                <a href="/roles/{{ $task->id }}" class="btn btn-info btn-sm" title="View">
                                    <i class="bi bi-eye"></i>
                                </a>
                                    <a href="/roles/{{ $task->id }}/edit" class="btn btn-warning btn-sm" title="Update">
                                        <i class="bi bi-pencil"></i>
                                    </a>

                                    {{-- delete post --}}
                                    <form method="post" action="/roles/{{ $task->id }}" class="d-inline">
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
