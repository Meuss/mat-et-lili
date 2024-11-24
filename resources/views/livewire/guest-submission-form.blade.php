<div>
    <form wire:submit.prevent="submit" class="space-y-12 text-left">
        <div class="border-b border-gray-900/10 pb-12">
            <div class="grid grid-cols-1 gap-x-6 gap-y-4 sm:grid-cols-2">
                <div class="col-span-full border-b border-gray-900/10 pb-6">
                    <div class="mt-5 space-y-5">
                        @foreach ($guests as $index => $guest)
                            <div class="py-5 px-4 bg-slate-100 border border-gray-200 relative">
                                @if (count($guests) > 1)
                                <button type="button" @disabled(session()->has('message-success')) wire:click="removeGuest({{ $index }})" class="absolute top-0 right-0 text-sm bg-slate-700 px-2 py-1 text-white hover:bg-slate-600 disabled:opacity-75">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 12H9m12 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                    </svg>
                                </button>
                                @endif
                                <div class="grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                                    <div class="sm:col-span-3">
                                        <label for="first_name_{{ $index }}" class="block text-sm font-medium leading-6 text-gray-900">Prénom *</label>
                                        <input type="text" id="first_name_{{ $index }}" wire:model="guests.{{ $index }}.first_name" class="block w-full border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-indigo-600 sm:text-sm sm:leading-6 disabled:opacity-75" required @disabled(session()->has('message-success'))>
                                        @error("guests.{$index}.first_name") <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                                    </div>

                                    <div class="sm:col-span-3">
                                        <label for="last_name_{{ $index }}" class="block text-sm font-medium leading-6 text-gray-900">Nom *</label>
                                        <input type="text" id="last_name_{{ $index }}" wire:model="guests.{{ $index }}.last_name" class="block w-full border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-indigo-600 sm:text-sm sm:leading-6 disabled:opacity-75" required @disabled(session()->has('message-success'))>
                                        @error("guests.{$index}.last_name") <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                                    </div>

                                    <div class="col-span-full">
                                        <label for="allergies_{{ $index }}" class="block text-sm font-medium leading-6 text-gray-900">Particularités alimentaires (allergies, végétarien, ...)</label>
                                        <textarea id="allergies_{{ $index }}" wire:model="guests.{{ $index }}.allergies" rows="2" class="block w-full border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-indigo-600 sm:text-sm sm:leading-6 resize-none disabled:opacity-75" @disabled(session()->has('message-success'))></textarea>
                                        @error("guests.{$index}.allergies") <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                                    </div>

                                    <div class="sm:col-span-3">
                                        <label for="sleep_{{ $index }}" class="block text-sm font-medium leading-6 text-gray-900">Je veux dormir sur place *</label>
                                        <input type="checkbox" @disabled(session()->has('message-success')) id="sleep_{{ $index }}" wire:model="guests.{{ $index }}.sleep" class="h-4 w-4 border-gray-300 text-indigo-600 focus:ring-indigo-600 disabled:opacity-75">
                                    </div>
                                </div>
                            </div>
                        @endforeach

                        <button type="button" wire:click="addGuest" @disabled(session()->has('message-success')) class="text-sm bg-slate-700 px-4 py-2 text-white hover:bg-slate-600 flex items-center gap-2 disabled:opacity-75">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v6m3-3H9m12 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                            </svg>
                            Ajouter un(e) invité(e)
                        </button>
                    </div>
                </div>

                <div class="sm:col-span-1">
                    <label for="phone" class="block text-sm font-medium leading-6 text-gray-900">Téléphone *</label>
                    <div class="mt-2">
                        <input type="text" id="phone" wire:model="phone" class="block w-full border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-indigo-600 sm:text-sm sm:leading-6 disabled:opacity-75" required @disabled(session()->has('message-success'))>
                        @error('phone') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                    </div>
                </div>

                <div class="col-span-full">
                    <label for="comment" class="block text-sm font-medium leading-6 text-gray-900">Commentaires</label>
                    <div class="mt-2">
                        <textarea id="comment" wire:model="comment" rows="3" class="block w-full border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-indigo-600 sm:text-sm sm:leading-6 resize-none disabled:opacity-75" @disabled(session()->has('message-success'))></textarea>
                        @error('comment') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                    </div>
                </div>
            </div>
        </div>
        @if (session()->has('message-success'))
            <div class="mt-6 bg-slate-700 p-4 text-white mb-0">
                {{ session('message-success') }}
            </div>
        @else
            <div class="mt-6 flex items-center justify-center gap-x-6">
                <button type="submit" class="bg-slate-700 px-12 py-2 text-sm font-semibold text-white shadow-sm hover:bg-slate-600 disabled:opacity-75" @disabled(session()->has('message-success'))>
                    Envoyer
                </button>
            </div>
        @endif
    </form>
</div>
