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
                      <h5 class="card-title">Add new user</h5>

                      <!-- General Form Elements -->
                      <form method="post" action="/users">
                        @csrf

                        <div class="row mb-3">
                            <label for="title" class="col-sm-2 col-form-label">Name</label>
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
                            <label for="title" class="col-sm-2 col-form-label">Email</label>
                            <div class="col-sm-10">
                              <input type="text" class="form-control" name="email" id="email" value="{{ old('email') }}">
                              @error('emailemail')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                              @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="title" class="col-sm-2 col-form-label">Department</label>
                            <div class="col-sm-10">
                                <select name="department_id" id="country" class="form-select" required>
                                    <option value="" selected></option>
                                    @foreach ($department as $list)
                                        <option value="{{ $list->id }}">{{ $list->name }}</option>
                                    @endforeach
                                    {{-- @foreach ($departments as $department)
                                    @if (old('department_id') == $department->id)
                                        <option value="{{ $department->id }}" selected>{{ $department->name }}</option>
                                    @else
                                        <option value="{{ $department->id }}">{{ $department->name }}</option>
                                    @endif
                                    @endforeach --}}
                                </select>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="title" class="col-sm-2 col-form-label">Unit</label>
                            <div class="col-sm-10">
                                <select name="unit_id" id="state" class="form-select" required>

                                </select>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="title" class="col-sm-2 col-form-label">Role</label>
                            <div class="col-sm-10">
                                <select name="role_id" id="role_id" class="form-select" required>
                                    <option value="" selected></option>
                                    @foreach ($roles as $role)
                                        <option value="{{ $role->id }}">{{ $role->display_name }}</option>
                                    @endforeach
                                </select>
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

        {{-- untuk auto dropdown --}}
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js" ></script>

        <script>
            jQuery('#country').change(function(){
				let cid=jQuery(this).val();
				jQuery('#state').html('<option value="">Select Unit</option>')
				jQuery.ajax({
					url:'/users/getState',
					type:'post',
					data:'cid='+cid+'&_token={{csrf_token()}}',
					success:function(result){
						jQuery('#state').html(result)
					}
				});
			});
        </script>

      </section>

@endsection
