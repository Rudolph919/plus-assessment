<x-app-layout>

    @if(session()->get('success'))
        <div class="p-2 bg-white border-b border-white-400 rounded-md">
            {{ session()->get('success') }}
        </div>
    @endif

    <div class="p-6 mb-20">
        <div class="float-left text-pureWhite">
            <div>
                <a href="{{ route('users.create') }}">
                    <span class="text-sm">Back to Users</span>
                </a>
            </div>
            <div class="text-5xl">
                {{ $user->first_name }} {{ $user->last_name }}
            </div>
        </div>
    </div>

    <div class="bg-textBarGrey m-6 p-6">
        <div class="text-pureWhite mb-6 text-lg">
            User Details
        </div>

            <form method="POST" action="{{ route('users.edit', $user->id) }}">
                @csrf
                <div class="grid grid-cols-2">
                    <!-- First Name -->
                    <div>
                        <x-input-label for="first_name" :value="__('First Name')" />
                        <x-text-input id="first_name" class="block mt-1 w-full" type="text" name="first_name"
                                      :value="$user->first_name" required autofocus />
                        <x-input-error :messages="$errors->get('first_name')" class="mt-2" />
                    </div>

                    <!-- Last Name -->
                    <div>
                        <x-input-label for="last_name" :value="__('Last Name')" />
                        <x-text-input id="last_name" class="block mt-1 w-full" type="text" name="last_name"
                                      :value="$user->last_name" required autofocus />
                        <x-input-error :messages="$errors->get('last_name')" class="mt-2" />
                    </div>
                </div>

                <div class="grid grid-cols-2">
                    <!-- Cellphone Number -->
                    <div class="mt-4">
                        <x-input-label for="cellphone" :value="__('Cellphone Number')" />
                        <x-text-input id="cellphone" class="block mt-1 w-full" type="tel" pattern="[0-9]{10}"
                                      name="cellphone" :value="$user->cellphone" required autofocus />
                        <x-input-error :messages="$errors->get('cellphone')" class="mt-2" />
                    </div>

                    <!-- Age -->
                    <div class="mt-4">
                        <x-input-label for="age" :value="__('Age')" />
                        <x-text-input id="age" class="block mt-1 w-full" type="number" step="1" pattern="/d+"
                                      name="age" :value="$user->age" required autofocus />
                        <x-input-error :messages="$errors->get('age')" class="mt-2" />
                    </div>
                </div>


                <div class="grid grid-cols-1">
                    <!-- Email Address -->
                    <div class="mt-4">
                        <x-input-label for="email" :value="__('Email')" />
                        <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="$user->email"
                                      required />
                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                    </div>
                </div>

{{--                <div class="grid grid-cols-1">--}}
{{--                    <!-- Role -->--}}
{{--                    <div class="mt-4">--}}
{{--                        <x-input-label for="role" :value="__('Role')" />--}}
{{--                        <x-text-input id="role" class="block mt-1 w-full" type="role" name="role" value="" required />--}}
{{--                        <x-input-error :messages="$errors->get('role')" class="mt-2" />--}}
{{--                    </div>--}}
{{--                </div>--}}


                <div class="grid grid-cols-2">
                    <!-- Password -->
                    <div class="mt-4">
                        <x-input-label for="password" :value="__('Password')" />

                        <x-text-input id="password" class="block mt-1 w-full"
                                      type="password"
                                      name="password"
                                      placeholder="**********"
                                      autocomplete="new-password" />

                        <x-input-error :messages="$errors->get('password')" class="mt-2" />
                    </div>

                    <!-- Confirm Password -->
                    <div class="mt-4">
                        <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

                        <x-text-input id="password_confirmation" class="block mt-1 w-full"
                                      type="password"
                                      name="password_confirmation"
                                      placeholder="**********" />

                        <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                    </div>
                </div>


                <button type="submit" class="text-textLink rounded-full border border-textLink mt-4 p-1">
                    Apply Changes
                </button>


            </form>
        </div>
    </div>
</x-app-layout>
