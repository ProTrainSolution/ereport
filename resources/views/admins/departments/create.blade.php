@extends('layouts.main')

@section('container')
    <div class="pagetitle">
        <h1>{{ $title }}</h1>
    </div>

    <section class="section">
        <div class="row">
          <div class="col-lg-12">

            <div class="row">
                <div class="col-lg-12">

                  <div class="card">
                    <div class="card-body">
                      <h5 class="card-title">Add new department</h5>

                      <!-- General Form Elements -->
                      <form method="post" action="/departments">
                        @csrf

                        <div class="row mb-3">
                            <label for="title" class="col-sm-2 col-form-label">Department</label>
                            <div class="col-sm-10">
                              <input type="text" class="form-control" name="name" id="name" value="{{ old('name') }}">
                              @error('name')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                              @enderror
                            </div>
                        </div>

                        <a href="/task" class="btn btn-secondary d-inline mt-2"> Cancel </a> &nbsp;
                        <button type="submit" class="btn btn-primary"> Submit </button>

                      </form><!-- End General Form Elements -->

                    </div>
                  </div>

                </div>
              </div>

          </div>
        </div>
      </section>

@endsection
