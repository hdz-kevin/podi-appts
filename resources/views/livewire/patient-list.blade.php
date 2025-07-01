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

@php
  $initialColors = [
    'bg-blue-100 text-blue-600',
    'bg-pink-100 text-pink-600',
    'bg-green-100 text-green-600',
    'bg-purple-100 text-purple-600',
    'bg-yellow-100 text-yellow-600',
    'bg-red-100 text-red-600',
    'bg-indigo-100 text-indigo-600',
    'bg-orange-100 text-orange-600',
    'bg-teal-100 text-teal-600',
    'bg-lime-100 text-lime-600',
    'bg-emerald-100 text-emerald-600',
    'bg-cyan-100 text-cyan-600',
    'bg-amber-100 text-amber-600',
    'bg-gray-100 text-gray-600',
  ];
@endphp

<div>
  @if ($modal)
    <livewire:patient-form />
  @endif

  <div class="flex flex-col md:flex-row items-center justify-between mb-6">
    <h1 class="text-3xl font-bold text-gray-800 mb-4 md:mb-0">Gestión de Pacientes</h1>
    <div class="flex flex-col md:flex-row items-center space-y-3 md:space-y-0 md:space-x-4 w-full md:w-auto">
      <div class="relative w-full md:w-80">
        <input
        type="text"
        placeholder="Buscar paciente..."
        class="w-full px-4 py-2 pl-10 border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm transition duration-150 ease-in-out"
        >
        <i data-lucide="search" class="lucide lucide-icon absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400"></i>
      </div>
      <button wire:click="openModal" class="w-full md:w-auto bg-green-600 hover:bg-green-700 text-white font-medium py-2 px-5 rounded-lg shadow-md transition duration-200 ease-in-out transform flex items-center justify-center space-x-2 show-form">
        <i data-lucide="plus-circle" class="lucide lucide-icon"></i>
        <span>Nuevo Paciente</span>
      </button>
    </div>
  </div>

  <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
    @foreach ($patients as $index => $patient)
      {{-- card --}}
      <div class="bg-white rounded-xl shadow-md border border-gray-200 p-6 flex flex-col items-start space-y-4 hover:shadow-lg
        transition duration-200 ease-in-out">
        <div class="flex items-center space-x-3 mb-2">
          <div class="{{ $initialColors[$index] }} flex-shrink-0 w-12 h-12 rounded-full flex items-center justify-center text-xl font-bold">
            {{ $patient->initials() }}
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

    // Show form
    // document.querySelector('.show-form').addEventListener('click', () => {
      // @this.set('modal', true);
      // @this.openModal();
    // });
  </script>
@endpush
