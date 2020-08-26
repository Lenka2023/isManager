@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                     <div class="alert alert-success" role="alert">
                            <p>You are logged in! as CLIENT</p>
                     </div>
                      <form enctype='multipart/form-data' method="POST" action="{{ route('home') }}">
                        @csrf
                         <div class="form-group row">
                            <label for="title" class="col-md-4 col-form-label text-md-right">{{ __('title') }}</label>

                            <div class="col-md-6">
                                <input id="title" type="text" class="form-control @error('title') is-invalid @enderror" name="title" value="{{ old('title') }}" required autocomplete="name" autofocus>

                                @error('title')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="text" class="col-md-4 col-form-label text-md-right">{{ __('text') }}</label>

                            <div class="col-md-6">
                                <textarea id="text" type="text" class="form-control @error('text') is-invalid @enderror" name="text" value="{{ old('text') }}" required autocomplete="name" autofocus></textarea> 

                                @error('text')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlFile1">Input file </label>
                            <input name="file" type="file" class="form-control-file" id="exampleFormControlFile1">
                        </div>
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" name="btnSignup" id="btnSignup" class="btn btn-primary" <?php echo isset($_POST["btnSignup"]) ? "disabled" : "";?>>
                                    {{ __('Submit') }}
                                </button>
                            </div>
                        </div>
                    </form>     
                  </div>
            </div>
        </div>
    </div>
</div>
@endsection
