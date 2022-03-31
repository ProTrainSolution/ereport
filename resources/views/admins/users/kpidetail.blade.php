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
                <div class="card-body">
                  <h5 class="card-title">List of KPI</h5>

                  <!-- Table with stripped rows -->
                  <table class="table table-bordered table-striped">
                      <tr>
                        <td scope="col">KPI</td>
                        <th scope="col">{{ $kpi->kpi }}</th>
                      </tr>
                      <tr>
                        <td scope="col">Weightage</td>
                        <th scope="col">{{ $kpi->weightage }}</th>
                      </tr>
                      <tr>
                        <td scope="col">Target</td>
                        <th scope="col">{!! $kpi->target !!}</th>
                      </tr>
                      <tr>
                        <td scope="col">Measurement</td>
                        <th scope="col">{!! $kpi->measurement !!}</th>
                      </tr>
                      <tr>
                        <td scope="col">Remark</td>
                        <th scope="col">{!! $kpi->remark !!}</th>
                      </tr>
                      <tr>
                        <td scope="col">Progress</td>
                        <th scope="col">{{ $kpi->progress }}%</th>
                      </tr>
                  </table>
                  <!-- End Table with stripped rows -->

                  <a href="/users/pizza/{{ $kpi->user_id }}" class="btn btn-secondary"><i class="bi bi-arrow-left-square"> Back to list </i></a>
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
