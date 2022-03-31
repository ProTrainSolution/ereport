@extends('layouts.main')

@section('container')
    <div class="pagetitle">
        <h1>{{ $title }}</h1>
    </div>

      <section class="section profile">
        <div class="row">
          <div class="col-xl-4">

            <div class="card">
              <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">

                <img src="{{ asset('storage/' . $user->image) }}" alt="Profile" class="rounded-circle">
                <h2>{{ $user->name }}</h2>
                <h3>{{ $user->position }}</h3>
                <div class="social-links mt-2">
                  <a href="#" class="twitter"><i class="bi bi-twitter"></i></a>
                  <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
                  <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
                  <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></a>
                </div>
              </div>
            </div>

          </div>

          <div class="col-xl-8">
            <div class="card">
              <div class="card-body pt-3">
                <!-- Bordered Tabs -->
                <ul class="nav nav-tabs nav-tabs-bordered">

                  <li class="nav-item">
                    <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#profile-overview">Overview</button>
                  </li>

                  @if(Auth::user()->id == Request::segment(2))
                  <li class="nav-item">
                    <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-edit">Edit Profile</button>
                  </li>
                  <li class="nav-item">
                    <button class="nav-link" data-bs-toggle="tab" data-bs-target="#update-image">Update Image</button>
                  </li>

                  <li class="nav-item">
                    <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-change-password">Change Password</button>
                  </li>
                  @endif

                  <!--
                  <li class="nav-item">
                    <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-settings">Settings</button>
                  </li>
                  -->

                </ul>
                <div class="tab-content pt-2">
                  <div class="tab-pane fade show active profile-overview" id="profile-overview">
                    <!--
                    <h5 class="card-title">About</h5>
                    <p class="small fst-italic">Sunt est soluta temporibus accusantium neque nam maiores cumque temporibus. Tempora libero non est unde veniam est qui dolor. Ut sunt iure rerum quae quisquam autem eveniet perspiciatis odit. Fuga sequi sed ea saepe at unde.</p>
                    -->

                    <h5 class="card-title">Profile Details</h5>

                    <div class="row">
                      <div class="col-lg-3 col-md-4 label ">Full Name</div>
                      <div class="col-lg-9 col-md-8">{{$user->name }}</div>
                    </div>

                    {{-- <div class="row">
                      <div class="col-lg-3 col-md-4 label">Email</div>
                      <div class="col-lg-9 col-md-8">{{ Auth::user()->email }}</div>
                    </div> --}}

                    <div class="row">
                      <div class="col-lg-3 col-md-4 label">Position</div>
                      <div class="col-lg-9 col-md-8">{{ $user->position }}</div>
                    </div>

                    <div class="row">
                      <div class="col-lg-3 col-md-4 label">Department</div>
                      <div class="col-lg-9 col-md-8">{{ $user->department->name }}</div>
                    </div>

                    <div class="row">
                      <div class="col-lg-3 col-md-4 label">Unit</div>
                      <div class="col-lg-9 col-md-8">{{ $user->unit->name }}</div>
                    </div>

                    <div class="row">
                      <div class="col-lg-3 col-md-4 label">Phone</div>
                      <div class="col-lg-9 col-md-8">{{ $user->phone }}</div>
                    </div>
                    <div class="row">
                      <div class="col-lg-3 col-md-4 label">Mobile Phone</div>
                      <div class="col-lg-9 col-md-8">{{ $user->mobile }}</div>
                    </div>

                    <div class="row">
                        <div class="col-lg-3 col-md-4 label">Email</div>
                        <div class="col-lg-9 col-md-8">{{ Auth::user()->email }}</div>
                    </div>

                  </div>

                  <div class="tab-pane fade profile-edit pt-3" id="profile-edit">
                    <!-- Profile Edit Form -->
                    <form method="post" action="/users/{{ $user->id }}">
                      @method('put')
                      @csrf
                      <!--
                      <div class="row mb-3">
                        <label for="profileImage" class="col-md-4 col-lg-3 col-form-label">Profile Image</label>
                        <div class="col-md-8 col-lg-9">
                          <img src="{{ asset('storage/' . Auth::user()->image) }}" alt="Profile">
                          <div class="pt-2">
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#verticalycentered">
                                <i class="bi bi-upload"></i> Vertically centered
                            </button>
                            <a href="#" class="btn btn-primary btn-sm" title="Upload new profile image"><i class="bi bi-upload"></i></a>
                            {{-- <a href="#" class="btn btn-danger btn-sm" title="Remove my profile image"><i class="bi bi-trash"></i></a> --}}
                          </div>
                        </div>
                      </div>
                      -->
                      <div class="row mb-3">
                        <label for="fullName" class="col-md-4 col-lg-3 col-form-label">Full Name</label>
                        <div class="col-md-8 col-lg-9">
                          <input name="name" type="text" class="form-control" id="name" value="{{ old('name', $user->name) }}">
                        </div>
                      </div>

                      <!--
                      <div class="row mb-3">
                        <label for="about" class="col-md-4 col-lg-3 col-form-label">About</label>
                        <div class="col-md-8 col-lg-9">
                          <textarea name="about" class="form-control" id="about" style="height: 100px">Sunt est soluta temporibus accusantium neque nam maiores cumque temporibus. Tempora libero non est unde veniam est qui dolor. Ut sunt iure rerum quae quisquam autem eveniet perspiciatis odit. Fuga sequi sed ea saepe at unde.</textarea>
                        </div>
                      </div>
                      -->

                      <div class="row mb-3">
                        <label for="company" class="col-md-4 col-lg-3 col-form-label">Position</label>
                        <div class="col-md-8 col-lg-9">
                          <input name="position" type="text" class="form-control" id="position" value="{{ old('position', $user->position) }}">
                        </div>
                      </div>

                      <div class="row mb-3">
                        <label for="Job" class="col-md-4 col-lg-3 col-form-label">Department</label>
                        <div class="col-md-8 col-lg-9">
                            <select name="department_id" id="country" class="form-select" required>
                                <option value="{{ $user->department->id }}" selected>{{ $user->department->name }}</option>
                                @foreach ($department as $list)
                                    @if ($user->department->id != $list->id)
                                        <option value="{{ $list->id }}">{{ $list->name }}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                      </div>

                      <div class="row mb-3">
                        <label for="Country" class="col-md-4 col-lg-3 col-form-label">Unit</label>
                        <div class="col-md-8 col-lg-9">
                            <select name="unit_id" id="state" class="form-select" required>
                                <option value="{{ $user->unit->id }}" selected>{{ $user->unit->name }}</option>
                            </select>
                        </div>
                      </div>

                      <div class="row mb-3">
                        <label for="Phone" class="col-md-4 col-lg-3 col-form-label">Phone</label>
                        <div class="col-md-8 col-lg-9">
                          <input name="phone" type="text" class="form-control" id="Phone" value="{{ old('phone', $user->phone) }}">
                        </div>
                      </div>

                      <div class="row mb-3">
                        <label for="Phone" class="col-md-4 col-lg-3 col-form-label">Mobile Phone</label>
                        <div class="col-md-8 col-lg-9">
                          <input name="mobile" type="text" class="form-control" id="mobile" value="{{ old('mobile', $user->mobile) }}">
                        </div>
                      </div>

                      <div class="row mb-3">
                        <label for="Email" class="col-md-4 col-lg-3 col-form-label">Email</label>
                        <div class="col-md-8 col-lg-9">
                          <input name="email" type="email" class="form-control" id="Email" value="{{ old('email', $user->email) }}" disabled>
                        </div>
                      </div>

                      <!--
                      <div class="row mb-3">
                        <label for="Twitter" class="col-md-4 col-lg-3 col-form-label">Twitter Profile</label>
                        <div class="col-md-8 col-lg-9">
                          <input name="twitter" type="text" class="form-control" id="Twitter" value="https://twitter.com/#">
                        </div>
                      </div>

                      <div class="row mb-3">
                        <label for="Facebook" class="col-md-4 col-lg-3 col-form-label">Facebook Profile</label>
                        <div class="col-md-8 col-lg-9">
                          <input name="facebook" type="text" class="form-control" id="Facebook" value="https://facebook.com/#">
                        </div>
                      </div>

                      <div class="row mb-3">
                        <label for="Instagram" class="col-md-4 col-lg-3 col-form-label">Instagram Profile</label>
                        <div class="col-md-8 col-lg-9">
                          <input name="instagram" type="text" class="form-control" id="Instagram" value="https://instagram.com/#">
                        </div>
                      </div>

                      <div class="row mb-3">
                        <label for="Linkedin" class="col-md-4 col-lg-3 col-form-label">Linkedin Profile</label>
                        <div class="col-md-8 col-lg-9">
                          <input name="linkedin" type="text" class="form-control" id="Linkedin" value="https://linkedin.com/#">
                        </div>
                      </div>
                      -->
                      <div class="text-center">
                        <button type="submit" class="btn btn-primary">Save Changes</button>
                      </div>
                    </form><!-- End Profile Edit Form -->

                  </div>

                  {{-- Update image tab --}}
                  <div class="tab-pane fade profile-edit pt-3" id="update-image">
                    <!-- Profile Edit Form -->
                    <form method="post" action="/users/{{ $user->id }}" enctype="multipart/form-data">
                      @method('put')
                      @csrf

                      <div class="row mb-3">
                          <div class="col-lg-2">
                            <img src="{{ asset('storage/' . Auth::user()->image) }}" alt="" class="img-preview img-fluid">
                          </div>
                          <div class="col-lg-10">
                            Choose image to update:
                            <input class="form-control @error('image') is-invalid @enderror" type="file" id="image" name="image" onchange="previewImage()" required>
                          </div>

                      </div>

                      <div class="text-center">
                        <button type="submit" name="submitImage" class="btn btn-primary">Save Changes</button>
                      </div>
                    </form><!-- End Profile Edit Form -->
                  </div>

                  <div class="tab-pane fade pt-3" id="profile-settings">
                    <!-- Settings Form -->
                    <form>

                      <div class="row mb-3">
                        <label for="fullName" class="col-md-4 col-lg-3 col-form-label">Email Notifications</label>
                        <div class="col-md-8 col-lg-9">
                          <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="changesMade" checked>
                            <label class="form-check-label" for="changesMade">
                              Changes made to your account
                            </label>
                          </div>
                          <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="newProducts" checked>
                            <label class="form-check-label" for="newProducts">
                              Information on new products and services
                            </label>
                          </div>
                          <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="proOffers">
                            <label class="form-check-label" for="proOffers">
                              Marketing and promo offers
                            </label>
                          </div>
                          <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="securityNotify" checked disabled>
                            <label class="form-check-label" for="securityNotify">
                              Security alerts
                            </label>
                          </div>
                        </div>
                      </div>

                      <div class="text-center">
                        <button type="submit" class="btn btn-primary">Save Changes</button>
                      </div>
                    </form><!-- End settings Form -->

                  </div>

                  <div class="tab-pane fade pt-3" id="profile-change-password">
                    <!-- Change Password Form -->
                    <form>

                      <div class="row mb-3">
                        <label for="currentPassword" class="col-md-4 col-lg-3 col-form-label">Current Password</label>
                        <div class="col-md-8 col-lg-9">
                          <input name="password" type="password" class="form-control" id="currentPassword">
                        </div>
                      </div>

                      <div class="row mb-3">
                        <label for="newPassword" class="col-md-4 col-lg-3 col-form-label">New Password</label>
                        <div class="col-md-8 col-lg-9">
                          <input name="newpassword" type="password" class="form-control" id="newPassword">
                        </div>
                      </div>

                      <div class="row mb-3">
                        <label for="renewPassword" class="col-md-4 col-lg-3 col-form-label">Re-enter New Password</label>
                        <div class="col-md-8 col-lg-9">
                          <input name="renewpassword" type="password" class="form-control" id="renewPassword">
                        </div>
                      </div>

                      <div class="text-center">
                        <button type="submit" class="btn btn-primary">Change Password</button>
                      </div>
                    </form><!-- End Change Password Form -->

                  </div>

                </div><!-- End Bordered Tabs -->

              </div>
            </div>

          </div>
        </div>
      </section>



      {{-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> --}}
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

        function previewImage() {

            const image = document.querySelector('#image');
            const imgPreview = document.querySelector('.img-preview');

            imgPreview.style.display = 'block';

            const oFReader = new FileReader();
            oFReader.readAsDataURL(image.files[0]);

            oFReader.onload = function(oFREvent) {
                imgPreview.src = oFREvent.target.result;
            }

        }
      </script>

@endsection
