@extends('layout\master')

@section('content')
<div class="big-content">
    <div class="container" style="margin: auto;">
        <h1 class="title">{{ __('strings.Registration Form') }}</h1>
        <div class="content">
            @include('sweetalert::alert')
            <form action="{{ route('user.register') }}" method="POST" enctype="multipart/form-data" id="registrationForm">
                @csrf
                <div class="profile-picture" onclick="document.getElementById('userImage').click()" style="position:relative;">
                    <span class="placeholder-text" id="chooseImageText">Click to choose an image</span>
                    <input type="file" name="userImage" id="userImage" accept="image/png, image/jpeg" onchange="previewImage()" style="display:none;">
                    <img id="imagePreview" src="{{ asset('user.png') }}" style="position:absolute;width:100%">
                </div>
                <div class="user-details">
                    <div class="input-box">
                        <label for="fullname">{{ __('strings.Full Name') }}</label>
                        <input type="text" name="name" id="fullname" placeholder="{{__('strings.Enter your name')}}" value="{{ old('name') }}" required>
                    </div>
                    <div class="input-box">
                        <label for="username">{{ __('strings.Username') }}</label>
                        <input type="text" name="user_name" id="username" placeholder="{{__('strings.Enter your username')}}" value="{{ old('user_name') }}" required>
                        @error('user_name')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="input-box">
                        <label for="birthdate">{{__('strings.Birthdate')}}</label>
                        <input type="date" name="birthdate" id="birthdate" value="{{ old('birthdate') }}" required>
                        <p class="d-none birthdate-error-msg"></p>
                        <div class="tooltip">
                            <input type="button" value="{{__('strings.List')}}" name="show_names" id="show_names_button">
                            <span class="tooltiptext">{{__('strings.ShowList')}}</span>
                        </div>
                    </div>
                    <div class="input-box">
                        <label for="email">{{ __('strings.Email') }}</label>
                        <input type="email" name="email" id="email" placeholder="{{__('strings.Enter your email')}}" value="{{ old('email') }}" required>
                        <p class="d-none mail-error-msg"></p>
                    </div>
                    <div class="input-box">
                        <label for="phoneNumber">{{ __('strings.Phone Number') }}</label>
                        <input type="tel" name="phone" id="phoneNumber" placeholder="{{__('strings.Enter your phone number')}}" value="{{ old('phone') }}" required>
                        <p class="d-none phone-error-msg"></p>
                    </div>
                    <div class="input-box">
                        <label for="address">{{ __('strings.Address')}}</label>
                        <input type="text" name="address" id="address" placeholder="{{__('strings.Enter your address')}}" value="{{ old('address') }}" required>
                    </div>
                    <div class="input-box">
                        <label for="password">{{ __('strings.Password')}}</label>
                        <input type="password" name="password" id="password" placeholder="{{__('strings.Enter your password')}}" value="{{ old('password') }}" required>
                        <p class="d-none password-error-msg"></p>
                    </div>
                    <div class="input-box">
                        <label for="confirmPassword">{{ __('strings.Confirm Password')}}</label>
                        <input type="password" name="confirmPassword" id="confirmPassword" placeholder="{{__('strings.Confirm your password')}}" value="{{ old('confirmPassword') }}" required>
                        <p class="d-none confirm-password-error-msg"></p>
                    </div>
                </div>
                <div class="button">
                    <input type="submit" value="{{__('strings.Register')}}" name="register">
                </div>
                <div id="customPopup" class="modal">
                    <div class="modal-content">
                        <span class="close">&times;</span>
                        <div id="popupContent"></div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection