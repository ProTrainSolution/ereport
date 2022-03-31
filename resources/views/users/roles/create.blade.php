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
                      <h5 class="card-title">Create new role</h5>

                      <!-- General Form Elements -->
                      <form method="post" action="/roles">
                        @csrf
                        <div class="row mb-3">
                          <label for="title" class="col-sm-2 col-form-label">Role</label>
                          <div class="col-sm-10">
                            <input type="text" class="form-control @error('display_name') is-invalid @enderror" name="display_name" id="display_name" value="{{ old('display_name') }}">

                            @error('display_name')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                          </div>
                        </div>

                        <div class="row mb-3">
                            <label for="title" class="col-sm-2 col-form-label">Role Name</label>
                            <div class="col-sm-10">
                              <input type="text" class="form-control" name="name" id="name" value="{{ old('name') }}">
                              @error('name')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                            </div>
                          </div>

                        <div class="row mb-3">
                          <label for="description" class="col-sm-2 col-form-label">Description</label>
                          <div class="col-sm-10">
                            <textarea class="form-control tinymce-editor" rows="5" name="description" id="description">{{ old('description') }}</textarea>
                          </div>
                        </div>

                        <a href="/task" class="btn btn-secondary d-inline mt-2">Cancel</a>
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
