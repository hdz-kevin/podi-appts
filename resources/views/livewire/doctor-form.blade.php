<div class="modal-bg" wire:click.self="hideForm">
  <div class="w-full max-w-lg bg-white rounded-xl shadow-lg p-8 relative animate-fade-in">
    <h2 class="text-2xl font-bold text-gray-800 mb-6 flex items-center gap-2">
      <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"   
        stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-user-plus-icon lucide-user-plus text-blue-600">
        <path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"/>
        <circle cx="9" cy="7" r="4"/>
        <line x1="19" x2="19" y1="8" y2="14"/>
        <line x1="22" x2="16" y1="11" y2="11"/>
      </svg>
      Nuevo Doctor
    </h2>

    <form class="space-y-5" wire:submit.prevent="save">
      {{-- Name --}}
      <div>
        <label for="name" class="block font-medium text-gray-700 mb-1.5">
          Nombre <span class="text-red-500">*</span>
        </label>
        <input
          wire:model.live="name"
          id="name"
          type="text"
          class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-blue-400 focus:border-blue-400"
          autocomplete="name"
          autofocus
        >

        @error('name')
          <span class="text-red-500 text-sm">{{ $message }}</span>
        @enderror
      </div>

      {{-- Last Name --}}
      <div>
        <label for="last_name" class="block font-medium text-gray-700 mb-1.5">
          Apellido(s) <span class="text-red-500">*</span>
        </label>
        <input
          wire:model.live="last_name"
          id="last_name"
          type="text"
          class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-blue-400 focus:border-blue-400"
          autocomplete="last_name"
        >

        @error('last_name')
          <span class="text-red-500 text-sm">{{ $message }}</span>
        @enderror
      </div>

      {{-- Gender --}}
      <div>
        <label for="gender" class="block font-medium text-gray-700 mb-1.5">
          Sexo <span class="text-red-500">*</span>
        </label>
        <select
          wire:model.live="gender"
          id="gender"
          class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-blue-400 focus:border-blue-400 bg-white"
        >
          <option value="">Selecciona una opción</option>
          <option value="{{ \App\Enums\Gender::Male->value }}">Masculino</option>
          <option value="{{ \App\Enums\Gender::Female->value }}">Femenino</option>
        </select>

        @error('gender')
          <span class="text-red-500 text-sm">{{ $message }}</span>
        @enderror
      </div>

      <div class="flex justify-end gap-3 pt-2">
        <button
          wire:click="hideForm"
          type="button"
          class="bg-gray-200 hover:bg-gray-300 text-gray-800 font-medium py-2 px-5 rounded-lg transition-colors"
        >
          Cancelar
        </button>

        <button
          type="submit"
          class="bg-blue-600 hover:bg-blue-700 text-white font-medium py-2 px-5 rounded-lg shadow transition-colors"
        >
          Crear Doctor
        </button>
      </div>
    </form>
  </div>
</div>
