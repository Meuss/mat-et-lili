<div class="max-w-4xl mx-auto p-6 bg-white shadow-md rounded-lg">
    @if (session()->has('message'))
        <div class="bg-green-500 p-4 rounded-md mb-6">
            {{ session('message') }}
        </div>
    @endif

    <form wire:submit.prevent="submit" class="space-y-12">
        <div class="border-b border-gray-900/10 pb-12">
            <h2 class="text-base font-semibold leading-7 text-gray-900">Submission Details</h2>
            <p class="mt-1 text-sm leading-6 text-gray-600">Provide your contact details and any additional comments.</p>

            <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                <div class="sm:col-span-4">
                    <label for="email" class="block text-sm font-medium leading-6 text-gray-900">Email</label>
                    <div class="mt-2">
                        <input type="email" id="email" wire:model="email" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-indigo-600 sm:text-sm sm:leading-6" required>
                        @error('email') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                    </div>
                </div>

                <div class="sm:col-span-4">
                    <label for="phone" class="block text-sm font-medium leading-6 text-gray-900">Phone</label>
                    <div class="mt-2">
                        <input type="text" id="phone" wire:model="phone" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-indigo-600 sm:text-sm sm:leading-6" required>
                        @error('phone') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                    </div>
                </div>

                <div class="col-span-full">
                    <label for="comment" class="block text-sm font-medium leading-6 text-gray-900">Comment</label>
                    <div class="mt-2">
                        <textarea id="comment" wire:model="comment" rows="3" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-indigo-600 sm:text-sm sm:leading-6"></textarea>
                        @error('comment') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                    </div>
                </div>
            </div>
        </div>

        <div class="border-b border-gray-900/10 pb-12">
            <h2 class="text-base font-semibold leading-7 text-gray-900">Guests</h2>
            <p class="mt-1 text-sm leading-6 text-gray-600">Add details for each guest attending.</p>

            <div class="mt-10 space-y-10">
                @foreach ($guests as $index => $guest)
                    <div class="p-6 bg-gray-50 border border-gray-200 rounded-lg">
                        <h4 class="text-lg font-semibold leading-7 text-gray-900 mb-4">Guest {{ $index + 1 }}</h4>

                        <div class="mt-4 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                            <div class="sm:col-span-3">
                                <label for="first_name_{{ $index }}" class="block text-sm font-medium leading-6 text-gray-900">First Name</label>
                                <input type="text" id="first_name_{{ $index }}" wire:model="guests.{{ $index }}.first_name" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-indigo-600 sm:text-sm sm:leading-6" required>
                                @error("guests.{$index}.first_name") <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                            </div>

                            <div class="sm:col-span-3">
                                <label for="last_name_{{ $index }}" class="block text-sm font-medium leading-6 text-gray-900">Last Name</label>
                                <input type="text" id="last_name_{{ $index }}" wire:model="guests.{{ $index }}.last_name" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-indigo-600 sm:text-sm sm:leading-6" required>
                                @error("guests.{$index}.last_name") <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                            </div>

                            <div class="sm:col-span-3">
                                <label for="menu_{{ $index }}" class="block text-sm font-medium leading-6 text-gray-900">Menu</label>
                                <select id="menu_{{ $index }}" wire:model="guests.{{ $index }}.menu" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-indigo-600 sm:text-sm sm:leading-6" required>
                                    <option value="">Select Menu</option>
                                    <option value="Carnivore">Carnivore</option>
                                    <option value="Végétarien">Végétarien</option>
                                </select>
                                @error("guests.{$index}.menu") <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                            </div>

                            <div class="sm:col-span-3">
                                <label for="supper_{{ $index }}" class="block text-sm font-medium leading-6 text-gray-900">Supper</label>
                                <input type="checkbox" id="supper_{{ $index }}" wire:model="guests.{{ $index }}.supper" class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-600">
                            </div>

                            <div class="sm:col-span-3">
                                <label for="sleep_{{ $index }}" class="block text-sm font-medium leading-6 text-gray-900">Sleep</label>
                                <input type="checkbox" id="sleep_{{ $index }}" wire:model="guests.{{ $index }}.sleep" class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-600">
                            </div>

                            <div class="col-span-full">
                                <label for="allergies_{{ $index }}" class="block text-sm font-medium leading-6 text-gray-900">Allergies</label>
                                <textarea id="allergies_{{ $index }}" wire:model="guests.{{ $index }}.allergies" rows="2" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-indigo-600 sm:text-sm sm:leading-6"></textarea>
                                @error("guests.{$index}.allergies") <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                            </div>
                        </div>

                        <button type="button" wire:click="removeGuest({{ $index }})" class="mt-4 bg-red-500 px-4 py-2 rounded-md hover:bg-red-600">
                            Remove Guest
                        </button>
                    </div>
                @endforeach

                <button type="button" wire:click="addGuest" class="mt-6 bg-indigo-600 px-4 py-2 rounded-md hover:bg-indigo-500">
                    Add Another Guest
                </button>
            </div>
        </div>

        <div class="mt-6 flex items-center justify-end gap-x-6">
            <button type="button" class="text-sm font-semibold leading-6 text-gray-900">Cancel</button>
            <button type="submit" class="rounded-md bg-green-600 px-3 py-2 text-sm font-semibold shadow-sm hover:bg-green-500">
                Submit
            </button>
        </div>
    </form>
</div>
