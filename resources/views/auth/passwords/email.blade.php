@extends('anasayfa.template')

@section('icerik')
    <form method="POST" action="{{ route('password.email') }}">
        @csrf
        <div class="zm-section bg-white pt-40 pb-70">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12 col-md-5">
                        <div class="section-title-2 mb-40">
                            <h3 class="inline-block uppercase">Kayıp Şifre Talebi</h3>

                        </div>
                    </div>
                </div>
                <div class="row">

                </div>
                <div class="registation-form-wrap">
                    <div class="row">
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <div class="single-input">
                                <label>E-Mail Adresi</label>
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="row">
                                <div class="col-md-3 col-lg-3 col-sm-6 col-xs-12">
                                    <div class="single-input">
                                        <button class="submit-button mt-20 inline-block" type="submit">Şifremi Gönder</button>
                                    </div>

                                </div>
                            </div>

                        </div>
                    </div>
                </div>

    </form>
@endsection
