@push('styles')
  <style>
    /* Estilos para que los iconos de Lucide funcionen */
    .lucide {
      display: inline-block;
      vertical-align: middle;
      stroke-width: 2;
    }
  </style>
@endpush

<div>
  <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
    @foreach ($patients as $patient)
      {{-- card --}}
      <div class="bg-white rounded-xl shadow-md border border-gray-200 p-6 flex flex-col items-start space-y-4 hover:shadow-lg
        transition duration-200 ease-in-out">
        <div class="flex items-center space-x-3 mb-2">
          <div class="flex-shrink-0 w-12 h-12 bg-blue-100 rounded-full flex items-center justify-center text-blue-600 text-xl font-bold">
            JP
          </div>
          <div>
            <h3 class="text-lg font-semibold text-gray-900">
              {{ $patient->name }}
            </h3>
            <p class="text-sm text-gray-700 flex items-center">
              <i data-lucide="phone" class="lucide lucide-icon w-4 h-4 mr-1 text-gray-500"></i>
              {{ $patient->phone_number }}
            </p>
          </div>
        </div>
        <div class="w-full text-sm text-gray-700 space-y-1">
          <p class="flex items-start">
            <i data-lucide="map-pin" class="lucide w-4 h-4 mr-1 text-gray-500"></i>
            {{ $patient->address ?? "Sin dirección" }}
          </p>
        </div>
        <div class="flex justify-end w-full mt-4 space-x-2">
          <button
            class="inline-flex items-center p-2 rounded-full text-blue-600 hover:bg-blue-100 transition duration-150 ease-in-out"
            title="Editar"
          >
            <i data-lucide="pencil" class="lucide w-5 h-5"></i>
          </button>
          <button
            class="inline-flex items-center p-2 rounded-full text-red-600 hover:bg-red-100 transition duration-150 ease-in-out"
            title="Eliminar"
          >
            <i data-lucide="trash-2" class="lucide w-5 h-5"></i>
          </button>
        </div>
      </div> {{-- end Card --}}
    @endforeach
  </div>
</div>

@push('scripts')
  <script src="https://unpkg.com/lucide@latest"></script>
  <script>
    lucide.createIcons();
  </script>
@endpush
