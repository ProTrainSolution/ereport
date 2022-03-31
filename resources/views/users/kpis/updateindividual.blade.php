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
                      <h5 class="card-title">Add new individual KPI</h5>

                      <!-- General Form Elements -->
                      <form method="post" action="/kpis/storeindividual">
                        @csrf

                        <div class="row mb-3">
                            <label for="title" class="col-sm-2 col-form-label">Scorecard</label>
                            <div class="col-sm-10">
                                <select name="scorecard_id" id="scorecard" class="form-select @error('scorecard_id') is-invalid @enderror">
                                    <option value="" selected>Scorecard</option>
                                    @foreach ($scorecards as $scorecard)
                                    @if (old('scorecard_id') == $scorecard->id)
                                        <option value="{{ $scorecard->id }}" selected>{{ $scorecard->name }}</option>
                                    @else
                                        <option value="{{ $scorecard->id }}">{{ $scorecard->name }}</option>
                                    @endif
                                    @endforeach
                                </select>
                                @error('scorecard_id')
                                <div class="invalid-feedback">
                                      {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="title" class="col-sm-2 col-form-label">KPI</label>
                            <div class="col-sm-10">
                              <input type="text" placeholder="KPI" class="form-control @error('kpi') is-invalid @enderror" name="kpi" id="KPI" value="{{ old('kpi') }}">

                              @error('kpi')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                              @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="title" class="col-sm-2 col-form-label">Year</label>
                            <div class="col-sm-4">
                              <select name="kpi_year" id="kpi_year" class="form-control @error('kpi_year') is-invalid @enderror">
                                  <option value="">Year</option>
                                  {{ $last = now()->year - 5 }}
                                  @for($i = now()->year; $i > $last; $i--)
                                  <option value="{{ $i }}">{{ $i }}</option>
                                  @endfor
                              </select>
                              @error('kpi_year')
                                  <div class="invalid-feedback">
                                      {{ $message }}
                                  </div>
                              @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="description" class="col-sm-2 col-form-label">Description</label>
                            <div class="col-sm-10">
                              <textarea style="" class="form-control tinymce-editor" rows="5" name="description" id="description">{{ old('description') }}</textarea>

                              {{--
                                @error('description')
                                  <div class="invalid-feedback">
                                      {{ $message }}
                                  </div>
                                @enderror
                              --}}

                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="description" class="col-sm-2 col-form-label">Target</label>
                            <div class="col-sm-10">
                              <textarea style="max-height: 50px;" class="form-control tinymce-editor @error('target') is-invalid @enderror" rows="5" name="target" id="target">{{ old('target') }}</textarea>
                              @error('target')
                                  <div class="invalid-feedback">
                                      {{ $message }}
                                  </div>
                              @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                          <label for="description" class="col-sm-2 col-form-label">Measurement</label>
                          <div class="col-sm-10">
                            <textarea class="form-control tinymce-editor @error('measurement') is-invalid @enderror" rows="5" name="measurement" id="measurement" >{{ old('measurement') }}</textarea>
                            @error('measurement')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                             @enderror
                          </div>
                        </div>

                        <div class="row mb-3">
                          <label for="description" class="col-sm-2 col-form-label">Remark</label>
                          <div class="col-sm-10">
                            <textarea class="form-control tinymce-editor" rows="5" name="remark" id="remark">{{ old('remark') }}</textarea>
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
