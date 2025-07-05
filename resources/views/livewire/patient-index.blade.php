<div>
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
    ];
  @endphp

  <div class="flex flex-col md:flex-row items-center justify-between mb-6">
    <h1 class="text-3xl font-bold text-gray-800 mb-4 md:mb-0">Gestión de Pacientes</h1>
    <div class="flex flex-col md:flex-row items-center space-y-3 md:space-y-0 md:space-x-4 w-full md:w-auto">
      {{-- Search Input --}}
      <div class="relative w-full md:w-80">
        <input
        type="text"
        placeholder="Buscar paciente..."
        class="w-full px-4 py-2 pl-9 border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 placeholder:text-gray-600
          focus:border-blue-500 sm:text-base transition duration-150 ease-in-out"
        >
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" 
          stroke-linecap="round" stroke-linejoin="round"
          class="lucide lucide-search-icon lucide-search absolute left-2 top-1/2 transform -translate-y-1/2 text-gray-500">
          <path d="m21 21-4.34-4.34"/>
          <circle cx="11" cy="11" r="8"/>
        </svg>
      </div>
      {{-- New Patient Button --}}
      <button wire:click="displayForm"
        class="w-full md:w-auto bg-green-600 hover:bg-green-700 text-white font-medium py-2 px-5 rounded-lg shadow-md transition
          duration-200 ease-in-out transform flex items-center justify-center space-x-2 show-form">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
          stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-circle-plus-icon lucide-circle-plus">
          <circle cx="12" cy="12" r="10"/>
          <path d="M8 12h8"/>
          <path d="M12 8v8"/>
        </svg>
        <span>Nuevo Paciente</span>
      </button>
    </div>
  </div>

  <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
    @foreach ($patients as $index => $patient)
      {{-- card --}}
      <div class="bg-white rounded-xl shadow-md border border-gray-200 p-6 flex flex-col items-start space-y-4 hover:shadow-lg transition
        duration-200 ease-in-out">
        {{-- Patient Avatar and Info --}}
        <div class="flex items-center space-x-3 mb-2">
          <div class="{{ $initialColors[$index % count($initialColors)] }} flex-shrink-0 w-12 h-12 rounded-full flex items-center justify-center text-xl font-bold uppercase">
            {{ $patient->initials() }}
          </div>
          <div>
            <h3 class="text-lg font-semibold text-gray-900">
              {{ $patient->name }}
            </h3>
            <p class="text-sm text-gray-700 flex items-center">
              {{-- <i data-lucide="phone" class="lucide lucide-icon w-4 h-4 mr-1 text-gray-500"></i> --}}
              <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" 
                stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-phone-icon lucide-phone mr-1.5 text-gray-500">
                <path d="M13.832 16.568a1 1 0 0 0 1.213-.303l.355-.465A2 2 0 0 1 17 15h3a2 2 0 0 1 2 2v3a2 2 0 0 1-2 2A18 18 0 0 1 2 4a2 2 0 0 1 2-2h3a2 2 0 0 1 2 2v3a2 2 0 0 1-.8 1.6l-.468.351a1 1 0 0 0-.292 1.233 14 14 0 0 0 6.392 6.384"/>
              </svg>
              {{ $patient->phone_number }}
            </p>
          </div>
        </div>
        {{-- Address --}}
        <div class="w-full text-sm text-gray-700 space-y-1">
          <p class="flex items-start">
            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-map-pin-icon lucide-map-pin mr-1 text-gray-500"><path d="M20 10c0 4.993-5.539 10.193-7.399 11.799a1 1 0 0 1-1.202 0C9.539 20.193 4 14.993 4 10a8 8 0 0 1 16 0"/><circle cx="12" cy="10" r="3"/></svg>
            {{ $patient->address ?? "Sin dirección" }}
          </p>
        </div>
        {{-- Actions --}}
        <div class="flex justify-end w-full mt-4 space-x-2">
          <button
            wire:click="displayForm({{ $patient->id }})"
            class="inline-flex items-center p-2 rounded-full text-blue-600 hover:bg-blue-100 transition duration-150 ease-in-out"
            title="Editar"
          >
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"  
              stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-pencil-icon lucide-pencil w-5 h-5">
              <path d="M21.174 6.812a1 1 0 0 0-3.986-3.987L3.842 16.174a2 2 0 0 0-.5.83l-1.321 4.352a.5.5 0 0 0 .623.622l4.353-1.32a2 2 0 0 0 .83-.497z"/>
              <path d="m15 5 4 4"/>
            </svg>
          </button>
          <button
            wire:click="delete({{ $patient->id }})"
            class="inline-flex items-center p-2 rounded-full text-red-600 hover:bg-red-100 transition duration-150 ease-in-out"
            title="Eliminar"
          >
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" 
              stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-trash2-icon lucide-trash-2 w-5 h-5">
              <path d="M3 6h18"/><path d="M19 6v14c0 1-1 2-2 2H7c-1 0-2-1-2-2V6"/>
              <path d="M8 6V4c0-1 1-2 2-2h4c1 0 2 1 2 2v2"/>
              <line x1="10" x2="10" y1="11" y2="17"/>
              <line x1="14" x2="14" y1="11" y2="17"/>
            </svg>
          </button>
        </div>
      </div> {{-- end Card --}}
    @endforeach
  </div>

  @if($showForm)
    <livewire:patient-form :editingPatientId="$editingPatientId" />
  @endif

</div>
