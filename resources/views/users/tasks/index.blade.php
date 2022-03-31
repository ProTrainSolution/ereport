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

                <!-- Table with stripped rows -->
                <div class="row">
                    <h5>Filter task:</h5>
                </div>

                <form action="/tasks">
                    <div class="row mb-3">
                        <div class="col-lg-4">
                            <input type="text" class="form-control" name="task" id="task" value="{{ old('task') }}" placeholder="Task">
                        </div>

                        <div class="col-lg-4">
                            <div class="col-sm-12">
                                <select name="user_id" id="user_id" class="form-control">
                                    <option value="0">Staff name</option>

                                    @foreach($users as $user)
                                       <option value="{{ $user->id }}">{{ $user->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="col-lg-2">
                            <div class="col-sm-12">
                                <select name="year" id="year" class="form-control">
                                    <option value="0">Year</option>

                                    {{ $last = now()->year - 5 }}
                                    @for($i = now()->year; $i > $last; $i--)
                                    <option value="{{ $i }}">{{ $i }}</option>
                                    @endfor
                                </select>
                            </div>
                        </div>

                        <div class="col-lg-2">
                            <div class="input-group-append">
                                <button type="submit" class="btn btn-primary" name="submit">Search</button>
                            </div>
                        </div>
                    </div>
                </form>


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
                            <td>{{ $task->user['name'] }}</td>
                            <td>{{ $task->task }}</td>
                            <td>{{ $task->description }}</td>
                            <td>{{ $task->task_year }}</td>
                            <td class="d-inline" style="white-space:nowrap;">
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
