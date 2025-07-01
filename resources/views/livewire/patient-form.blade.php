<style>
  .modal-bg {
    position: fixed;
    inset: 0;
    z-index: 50;
    display: flex;
    align-items: center;
    justify-content: center;
    background-color: rgba(15, 15, 15, 0.5);
  }
</style>

<div class="modal-bg" wire:click.self="closeModal">
  <div class="w-full max-w-lg bg-white rounded-xl shadow-lg p-8 relative animate-fade-in">
    <h2 class="text-2xl font-bold text-gray-800 mb-6 flex items-center gap-2">
      <i data-lucide="user-plus" class="lucide w-6 h-6 text-blue-600"></i>
      Nuevo Paciente
    </h2>
    <form class="space-y-5">
      <!-- Name -->
      <div>
        <label for="name" class="block font-medium text-gray-700 mb-1">Nombre <span class="text-red-500">*</span></label>
        <input name="name" id="name" type="text" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500" autocomplete="off">
        @error('name') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
      </div>

      <!-- Phone Number -->
      <div>
        <label for="phone_number" class="block font-medium text-gray-700 mb-1">Número de Teléfono <span class="text-red-500">*</span></label>
        <input name="phone_number" id="phone_number" type="tel" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500" autocomplete="off">
        @error('phone_number') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
      </div>

      <!-- Address -->
      <div>
        <label for="address" class="block font-medium text-gray-700 mb-1">Dirección <span class="text-gray-600 text-sm">(opcional)</span></label>
        <input name="address" id="address" type="text" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500" autocomplete="off">
        @error('address') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
      </div>

      <div class="flex justify-end gap-3 pt-2">
        <button wire:click="closeModal" type="button" class="bg-gray-200 hover:bg-gray-300 text-gray-800 font-medium py-2 px-5 rounded-lg transition-colors">
          Cancelar
        </button>
        <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white font-medium py-2 px-5 rounded-lg shadow transition-colors">
          Registrar Paciente
        </button>
      </div>
    </form>
  </div>
</div>

@push('scripts')
  <script src="https://unpkg.com/lucide@latest"></script>
    <script>
        // Todo: Find out how execute this script.
        console.log('Hello')
    </script>
@endpush
