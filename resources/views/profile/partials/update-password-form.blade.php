<form method="post" action="{{ route('password.update') }}" class="mt-6 space-y-6">
    @csrf
    @method('put')

    <div class="card-body">
        <div class="row mb-5">
            <h4 class="text-lg font-medium text-gray-900">
                {{ __('Update Password') }}
            </h4>

            <p class="mt-1 text-sm text-gray-600">
                {{ __('Ensure your account is using a long, random password to stay secure.') }}
            </p>
        </div>

        <div class="row mb-3">
            <div class="col-sm-4">
                <h6 class="mb-0">
                    <x-input-label for="update_password_current_password" :value="__('Current Password')" />
                </h6>
            </div>
            <div class="col-sm-8 text-secondary">
                <x-text-input id="update_password_current_password" name="current_password" type="password" class="form-control" autocomplete="current-password" />
                <x-input-error :messages="$errors->updatePassword->get('current_password')" class="mt-2" />
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-sm-4">
                <h6 class="mb-0">
                    <x-input-label for="update_password_password" :value="__('New Password')" />
                </h6>

            </div>
            <div class="col-sm-8 text-secondary">
                <x-text-input id="update_password_password" name="password" type="password" class="form-control" autocomplete="new-password" />
                <x-input-error :messages="$errors->updatePassword->get('password')" class="mt-2" />
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-sm-4">
                <h6 class="mb-0">
                    <x-input-label for="update_password_password_confirmation" :value="__('Confirm Password')" />
                </h6>

            </div>
            <div class="col-sm-8 text-secondary">
                <x-text-input id="update_password_password_confirmation" name="password_confirmation" type="password" class="form-control" autocomplete="new-password" />
                <x-input-error :messages="$errors->updatePassword->get('password_confirmation')" class="mt-2" />
            </div>
        </div>

        <div class="row">
            <div class="col-sm-9 text-secondary">
                <x-primary-button class="btn btn-primary px-4">{{ __('Save') }}</x-primary-button>

                @if (session('status') === 'password-updated')
                    <p x-data="{ show: true }"
                        x-show="show"
                        x-transition
                        x-init="setTimeout(() => show = false, 2000)"
                        class="text-sm text-gray-600">{{ __('Saved.') }}</p>
                @endif
            </div>
        </div>

    </div>
</form>
