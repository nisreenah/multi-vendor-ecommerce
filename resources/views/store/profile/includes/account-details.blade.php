<div class="card">
    <div class="card-header">
        <h5>Account Details</h5>
    </div>
    <div class="card-body">

        <form name="enq" method="post" action="{{ route('profile.update') }}">
            @csrf
            @method('patch')

            <div class="row">

                <div class="form-group col-md-6">
                    <x-input-label for="name" :value="__('Name')"/>

                    <x-text-input id="name" name="name" type="text" class="form-control"
                                  :value="old('name', Auth::user()->name)" required autofocus autocomplete="name"/>
                    <x-input-error class="mt-2" :messages="$errors->get('name')"/>
                </div>
                <div class="form-group col-md-6">
                    <x-input-label for="username" :value="__('Username')"/>

                    <x-text-input id="username" name="username" type="text" class="form-control"
                                  :value="old('username', Auth::user()->username)" required autofocus
                                  autocomplete="username"/>
                    <x-input-error class="mt-2" :messages="$errors->get('username')"/>
                </div>

                <div class="form-group col-md-6">
                    <x-input-label for="email" :value="__('Email')"/>

                    <x-text-input id="email" name="email" type="email" class="form-control"
                                  :value="old('email', Auth::user()->email)" required autocomplete="username"/>
                    <x-input-error class="mt-2" :messages="$errors->get('email')"/>
                    @if (Auth::user() instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! Auth::user()->hasVerifiedEmail())
                        <div>
                            <p class="text-sm mt-2 text-gray-800">
                                {{ __('Your email address is unverified.') }}

                                <button form="send-verification"
                                        class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                    {{ __('Click here to re-send the verification email.') }}
                                </button>
                            </p>

                            @if (session('status') === 'verification-link-sent')
                                <p class="mt-2 font-medium text-sm text-green-600">
                                    {{ __('A new verification link has been sent to your email address.') }}
                                </p>
                            @endif
                        </div>
                    @endif
                </div>

                <div class="form-group col-md-6">
                    <x-input-label for="phone" :value="__('Phone')"/>

                    <x-text-input id="phone" name="phone" type="text" class="form-control"
                                  :value="old('phone', Auth::user()->phone)" required autofocus autocomplete="phone"/>
                    <x-input-error class="mt-2" :messages="$errors->get('phone')"/>
                </div>

                <div class="form-group col-md-12">
                    <x-input-label for="address" :value="__('Address')"/>

                    <x-text-input id="address" name="address" type="text" class="form-control"
                                  :value="old('address', Auth::user()->address)" required autofocus
                                  autocomplete="address"/>
                    <x-input-error class="mt-2" :messages="$errors->get('address')"/>
                </div>

                <div class="col-md-12">
                    <button type="submit" class="btn btn-fill-out submit font-weight-bold" name="submit" value="Submit">
                        Save Change
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>
