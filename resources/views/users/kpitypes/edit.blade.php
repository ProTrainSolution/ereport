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
                      <h5 class="card-title">Update KPI type</h5>

                      <!-- General Form Elements -->
                      <form method="post" action="/kpitypes/{{ $role->id }}">
                        @method('put')
                        @csrf
                        <div class="row mb-3">
                          <label for="title" class="col-sm-2 col-form-label">Role</label>
                          <div class="col-sm-10">
                            <input type="text" class="form-control @error('display_name') is-invalid @enderror" name="display_name" id="display_name" value="{{ old('display_name', $role->display_name) }}">

                            @error('display_name')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                          </div>
                        </div>

                        <div class="row mb-3">
                            <label for="title" class="col-sm-2 col-form-label">Name</label>
                            <div class="col-sm-10">
                              <input type="text" class="form-control" name="name" id="name" value="{{ old('name', $kpitype->name) }}">
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
                            <textarea class="form-control tinymce-editor" rows="5" name="remark" id="remark">{{ old('remark', $kpitype->remark) }}</textarea>
                          </div>
                        </div>

                        <a href="/kpitypes" class="btn btn-secondary d-inline mt-2">Cancel</a>
                        <button type="submit" class="btn btn-primary"> Update </button>

                      </form><!-- End General Form Elements -->

                    </div>
                  </div>

                </div>
              </div>

          </div>
        </div>
      </section>

@endsection
