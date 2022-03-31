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
                      <h5 class="card-title">Create new Department KPI</h5>

                      <!-- General Form Elements -->
                      <form method="post" action="/kpidepartments">
                        @csrf
                        <div class="row mb-3">
                            <label for="title" class="col-sm-2 col-form-label">Scorecard</label>
                            <div class="col-sm-10">
                                <div class="row">
                                    <div class="col-sm-12">
                                      <select name="scorecard_id" id="scorecard_id" class="form-control @error('scorecard_id') is-invalid @enderror">
                                          <option value="0">Select scorecard</option>
                                          @foreach($scorecards as $scorecard)
                                              <option value="{{ $scorecard->id }}">{{ $scorecard->name }}</option>
                                          @endforeach
                                      </select>
                                      @error('scorecard_id')
                                          <div class="invalid-feedback">
                                              {{ $message }}
                                          </div>
                                      @enderror
                                    </div>
                                </div>
                                @error('display_name')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                          <label for="title" class="col-sm-2 col-form-label">KPI</label>
                          <div class="col-sm-10">
                            <input type="text" class="form-control" name="kpi" id="kpi" value="{{ old('kpi') }}">
                            @error('kpi')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                          </div>
                        </div>

                        <div class="row mb-3">
                          <label for="title" class="col-sm-2 col-form-label">Year</label>
                          <div class="col-sm-10">
                            <select name="kpi_year" id="kpi_year" class="form-control">
                                <option value="0">Year</option>

                                {{ $last = now()->year - 5 }}
                                @for($i = now()->year; $i > $last; $i--)
                                <option value="{{ $i }}">{{ $i }}</option>
                                @endfor
                            </select>
                            @error('kpi')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                          </div>
                        </div>

                        <div class="row mb-3">
                            <label for="description" class="col-sm-2 col-form-label">Description</label>
                            <div class="col-sm-10">
                              <textarea style="height:120px;" class="form-control tinymce-editor" rows="5" name="description" id="description">{{ old('description') }}</textarea>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="description" class="col-sm-2 col-form-label">Target</label>
                            <div class="col-sm-10">
                              <textarea style="max-height: 50px;" class="form-control tinymce-editor" rows="5" name="target" id="target" required>{{ old('target') }}</textarea>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="description" class="col-sm-2 col-form-label">Measurement</label>
                            <div class="col-sm-10">
                              <textarea class="form-control tinymce-editor" rows="5" name="measurement" id="measurement" required>{{ old('measurement') }}</textarea>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="description" class="col-sm-2 col-form-label">Remark</label>
                            <div class="col-sm-10">
                              <textarea class="form-control tinymce-editor" rows="5" name="remark" id="remark">{{ old('remark') }}</textarea>
                            </div>
                        </div>

                        <a href="/task" class="btn btn-secondary d-inline mt-2">Cancel</a>
                        <button type="submit" class="btn btn-primary" name="submit"> Submit </button>

                      </form><!-- End General Form Elements -->

                    </div>
                  </div>

                </div>
              </div>

          </div>
        </div>
      </section>

@endsection
