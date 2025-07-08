<div>
  @php
    $initialColors = [
      'bg-blue-100 text-blue-600',
      'bg-green-100 text-green-600',
      'bg-pink-100 text-pink-600',
      'bg-purple-100 text-purple-600',
      'bg-yellow-100 text-yellow-600',
      'bg-red-100 text-red-600',
      'bg-indigo-100 text-indigo-600',
      'bg-orange-100 text-orange-600',
      'bg-teal-100 text-teal-600',
      'bg-lime-100 text-lime-600',
    ];
  @endphp

  <div class="flex flex-col md:flex-row items-center justify-between mb-6">
    <h1 class="text-3xl font-bold text-gray-800 mb-4 md:mb-0">Doctores</h1>
    <div class="flex items-center">
      {{-- New Doctor Button --}}
      <button class="w-full md:w-auto bg-green-600 hover:bg-green-700 text-white font-medium py-2 px-5 rounded-lg shadow-md transition
          duration-200 ease-in-out transform flex items-center justify-center space-x-2 show-form">
        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
          stroke-linecap="round" stroke-linejoin="round" class="w-5 h-5">
          <path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"/>
          <circle cx="9" cy="7" r="4"/>
          <line x1="19" x2="19" y1="8" y2="14"/>
          <line x1="22" x2="16" y1="11" y2="11"/>
        </svg>
        <span>Nuevo Doctor</span>
      </button>
    </div>
  </div>

  @if ($doctors->isEmpty())
    <div class="text-center text-gray-600 mt-12 mb-2 text-xl font-medium">
      <p>No hay doctores registrados.</p>
    </div>
  @endif

  <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
    @foreach ($doctors as $index => $doctor)
      {{-- Doctor Card --}}
      <div class="bg-white rounded-xl shadow-md border border-gray-200 p-6 flex flex-col items-start space-y-4 hover:shadow-lg transition
        duration-200 ease-in-out">
        {{-- Doctor Avatar and Info --}}
        <div class="flex items-center space-x-3 mb-2 w-full">
          <div class="{{ $initialColors[$index % count($initialColors)] }} flex-shrink-0 w-12 h-12 rounded-full flex items-center justify-center text-xl font-bold uppercase">
            {{ $doctor->initials() }}
          </div>
          <div class="flex-1">
            <h3 class="text-xl font-semibold text-gray-900">
              Dr. {{ $doctor->name }}
            </h3>
          </div>
        </div>

        {{-- Doctor Details --}}
        <div class="w-full text-base text-gray-700 space-y-2">
          <p class="font-medium">
            Nombre:
            <span class="font-normal">{{ "{$doctor->name} {$doctor->last_name}" }}</span>
          </p>

          <p class="font-medium">
            Sexo:
            <span class="text-gray-600 font-normal">{{ \App\Enums\Gender::tryFrom($doctor->gender)->label() }}</span>
          </p>
        </div>

        {{-- Actions --}}
        <div class="flex justify-end w-full mt-4 space-x-2">
          <button
            class="inline-flex items-center p-2 rounded-full text-blue-600 hover:bg-blue-100 transition duration-150 ease-in-out"
            title="Editar"
          >
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"  
              stroke-linecap="round" stroke-linejoin="round" class="w-5 h-5">
              <path d="M21.174 6.812a1 1 0 0 0-3.986-3.987L3.842 16.174a2 2 0 0 0-.5.83l-1.321 4.352a.5.5 0 0 0 .623.622l4.353-1.32a2 2 0 0 0 .83-.497z"/>
              <path d="m15 5 4 4"/>
            </svg>
          </button>
          <button
            wire:click="delete({{ $doctor->id }})"
            wire:confirm="¿Estás seguro de que quieres eliminar este doctor?"
            class="inline-flex items-center p-2 rounded-full text-red-600 hover:bg-red-100 transition duration-150 ease-in-out"
            title="Eliminar"
          >
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" 
              stroke-linecap="round" stroke-linejoin="round" class="w-5 h-5">
              <path d="M3 6h18"/>
              <path d="M19 6v14c0 1-1 2-2 2H7c-1 0-2-1-2-2V6"/>
              <path d="M8 6V4c0-1 1-2 2-2h4c1 0 2 1 2 2v2"/>
              <line x1="10" x2="10" y1="11" y2="17"/>
              <line x1="14" x2="14" y1="11" y2="17"/>
            </svg>
          </button>
        </div>
      </div> {{-- end Card --}}
    @endforeach
  </div>
</div>
