<form method="post" action="{{ route('profile.destroy') }}" class="p-6">
    @csrf
    @method('delete')

    <div class="card-body">
        <div class="row mb-2">
            <h5 class="text-lg font-medium text-gray-900">
                {{ __('Delete Account') }}
            </h5>

            <h6 class="text-lg font-medium text-gray-900">
                {{ __('Are you sure you want to delete your account?') }}
            </h6>

            <p class="mt-1 text-sm text-gray-600">
                {{ __('Once your account is deleted, all of its resources and data will be permanently deleted. Please enter your password to confirm you would like to permanently delete your account.') }}
            </p>
        </div>

        <div class="row mb-3">
            <div class="col-sm-12 text-secondary">
                <x-text-input id="password" name="password" type="password" class="form-control"
                              placeholder="{{ __('Password') }}"/>
                <x-input-error :messages="$errors->userDeletion->get('password')" class="mt-2"/>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-12 text-secondary">
                <button type="submit" class="btn btn-danger px-4">
                    {{ __('Delete Account') }}
                </button>
            </div>
        </div>

    </div>
</form>
