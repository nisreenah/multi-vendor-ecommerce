<form method="post" action="{{ route('profile.update') }}" class="mt-6 space-y-6">
    @csrf
    @method('patch')

    <div class="card-body">
        <div class="row mb-5">
            <h4 class="text-lg font-medium text-gray-900">
                {{ __('Profile Information') }}
            </h4>

            <p class="mt-1 text-sm text-gray-600">
                {{ __("Update your account's profile information and email address.") }}
            </p>
        </div>

        <div class="row mb-3">
            <div class="col-sm-2">
                <h6 class="mb-0">
                    <x-input-label for="name" :value="__('Name')"/>
                </h6>

            </div>
            <div class="col-sm-9 text-secondary">
                <x-text-input id="name" name="name" type="text" class="form-control"
                              :value="old('name', $user->name)" required autofocus autocomplete="name"/>
                <x-input-error class="mt-2" :messages="$errors->get('name')"/>
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-sm-2">
                <h6 class="mb-0">
                    <x-input-label for="username" :value="__('Username')"/>
                </h6>

            </div>
            <div class="col-sm-9 text-secondary">
                <x-text-input id="username" name="username" type="text" class="form-control"
                              :value="old('username', $user->username)" required autofocus autocomplete="username"/>
                <x-input-error class="mt-2" :messages="$errors->get('username')"/>
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-sm-2">
                <h6 class="mb-0">
                    <x-input-label for="email" :value="__('Email')"/>
                </h6>
            </div>
            <div class="col-sm-9 text-secondary">
                <x-text-input id="email" name="email" type="email" class="form-control"
                              :value="old('email', $user->email)" required autocomplete="username"/>
                <x-input-error class="mt-2" :messages="$errors->get('email')"/>
                @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
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
        </div>

        <div class="row mb-3">
            <div class="col-sm-2">
                <h6 class="mb-0">
                    <x-input-label for="phone" :value="__('Phone')"/>
                </h6>

            </div>
            <div class="col-sm-9 text-secondary">
                <x-text-input id="phone" name="phone" type="text" class="form-control"
                              :value="old('phone', $user->phone)" required autofocus autocomplete="phone"/>
                <x-input-error class="mt-2" :messages="$errors->get('phone')"/>
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-sm-2">
                <h6 class="mb-0">
                    <x-input-label for="address" :value="__('Address')"/>
                </h6>

            </div>
            <div class="col-sm-9 text-secondary">
                <x-text-input id="address" name="address" type="text" class="form-control"
                              :value="old('address', $user->address)" required autofocus autocomplete="address"/>
                <x-input-error class="mt-2" :messages="$errors->get('address')"/>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-9 text-secondary">
               <button type="submit" class="btn btn-primary px-4">{{ __('Save') }}</button>
                @if (session('status') === 'profile-updated')
                    <p x-data="{ show: true }" x-show="show" x-transition
                       x-init="setTimeout(() => show = false, 2000)"
                       class="text-sm text-gray-600">{{ __('Saved.') }}</p>
                @endif
            </div>
        </div>

    </div>
</form>
