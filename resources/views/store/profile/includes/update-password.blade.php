<div class="card">
    <div class="card-header">
        <h5>Update Password</h5>
        <p>{{ __('Ensure your account is using a long, random password to stay secure.') }}</p>
    </div>
    <div class="card-body">

        <form method="post" action="{{ route('password.update') }}">
            @csrf
            @method('put')

            <div class="row">

                <div class="form-group col-md-12">
                    <x-input-label for="update_password_current_password" :value="__('Current Password')"/>
                    <x-text-input id="update_password_current_password" name="current_password" type="password"
                                  class="form-control" autocomplete="current-password"/>
                    <x-input-error :messages="$errors->updatePassword->get('current_password')" class="mt-2"/>
                </div>

                <div class="form-group col-md-6">
                    <x-input-label for="update_password_password" :value="__('New Password')"/>
                    <x-text-input id="update_password_password" name="password" type="password" class="form-control"
                                  autocomplete="new-password"/>
                    <x-input-error :messages="$errors->updatePassword->get('password')" class="mt-2"/>
                </div>

                <div class="form-group col-md-6">
                    <x-input-label for="update_password_password_confirmation" :value="__('Confirm Password')"/>
                    <x-text-input id="update_password_password_confirmation" name="password_confirmation"
                                  type="password" class="form-control" autocomplete="new-password"/>
                    <x-input-error :messages="$errors->updatePassword->get('password_confirmation')" class="mt-2"/>
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
