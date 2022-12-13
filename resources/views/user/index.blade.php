@php use Carbon\Carbon; @endphp
<x-app-layout>
    <div class="p-6">
        <div class="float-left">
            <div class=" text-pureWhite text-5xl">
                Users
            </div>
        </div>

        @can('admin')
            <div class="float-right h-12 bg-primary p-2">
                <a href="{{ route('users.create') }}">
                    <span class="">Create New User</span>
                </a>
            </div>
        @endcan

    </div>

    <div class="p-6 mt-6">
        <div>
            <label class="text-pureWhite">User name</label>
        </div>
        <div>
            <input type="text" name="name" id="name" placeholder="Search for user" class="bg-textBarGrey" />
        </div>
    </div>

    <div class="p-6">
        <table class="table-auto text-pureWhite w-full">
            <thead class="text-left">
                <tr >
                    <th class="p-2">First Name</th>
                    <th class="p-2">Last Name</th>
                    <th>Email Address</th>
                    <th>Role</th>
                    <th>Member Since</th>
                </tr>
            </thead>
            <tbody class="">
                @foreach($users as $user)
                    <tr class="bg-textBarGrey border border-4 border-base space-y-4">
                        <td class="p-4 text-textLink">
                            <a href="{{ route('users.edit', $user->id) }}" class="text-textLink">{{ $user->first_name }}</a>
                        </td>
                        <td class="p-2">{{ $user->last_name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->roles->pluck('name') }}</td>
                        <td>{{ Carbon::parse($user->created_at)->format('d M Y') }}</td>
                    </tr>
                @endforeach

            </tbody>
        </table>
    </div>


</x-app-layout>
