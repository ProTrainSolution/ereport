@extends('layouts.main')

@section('container')
<div class="row">
    <div class="col-lg-12">

      <div class="card">
        <div class="card-body">
          <h5 class="card-title">Sent User Feedback</h5>

          {{-- @if(count($errors) > 0)
            <div class="alert alert-danger">
                <button class="close" data-dismiss="alert">&times;</button>
                <ul>
                    @foreach ($error->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
          @endif --}}

          @if($message = Session::get('success'))
              <div class="alert alert-success">
                  <button class="close" data-dismiss="alert">&times;</button>
                  <strong>{{ $message }}</strong>
              </div>
          @endif

          <form action="/users/send" method="post">
            @csrf
            <div class="form-group">
                <label for="">Enter Your Name</label>
                <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror">
                @error('name')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="form-group">
                <label for="">Enter Your Email</label>
                <input type="email" name="email" id="email" class="form-control @error('email') is-invalid @enderror">
                @error('email')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="form-group">
                <label for="">Message</label>
                <textarea name="message" id="message" cols="" rows="5" class="form-control @error('message') is-invalid @enderror"></textarea>
                @error('message')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary"> Submit </button>

            </div>
          </form>
        </div>
      </div>
    </div>
</div>
@endsection
