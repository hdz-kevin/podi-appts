<div>
  <div class="flex flex-col md:flex-row items-center justify-between mb-6">
    <div class="flex items-center space-x-4 mb-4 md:mb-0">
      <h1 class="text-3xl font-bold text-gray-800">Calendario</h1>
    </div>
    <button id="open-new-appointment-modal"
      class="w-full md:w-auto bg-green-600 hover:bg-green-700 text-white font-medium py-3 px-6 rounded-lg shadow-md transition duration-200 ease-in-out transform hover:scale-105 flex items-center justify-center space-x-2">
      <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none"
        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
        class="lucide lucide-calendar-plus-icon lucide-calendar-plus">
        <path d="M16 19h6" />
        <path d="M16 2v4" />
        <path d="M19 16v6" />
        <path d="M21 12.598V6a2 2 0 0 0-2-2H5a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h8.5" />
        <path d="M3 10h18" />
        <path d="M8 2v4" />
      </svg>
      <span>Añadir Nueva Cita</span>
    </button>
  </div>

  <div class="flex space-x-2 md:space-x-3 mb-6 border-b border-gray-200 pb-3 overflow-x-auto whitespace-nowrap">
    <button
      class="px-5 py-2 rounded-full bg-blue-600 text-white text-sm md:text-base font-medium shadow-md transition duration-200 ease-in-out hover:bg-blue-700">
      BEATRIZ
      <span class="text-sm font-bold">6</span>
    </button>
    <button
      class="px-5 py-2 rounded-full bg-gray-100 text-gray-700 text-sm md:text-base hover:bg-gray-200 font-medium transition duration-200 ease-in-out">
      LUIS
      <span class="text-sm font-bold">3</span>
    </button>
    <button
      class="px-5 py-2 rounded-full bg-gray-100 text-gray-700 text-sm md:text-base hover:bg-gray-200 font-medium transition duration-200 ease-in-out">
      CARLA
      <span class="text-sm font-bold">5</span>
    </button>
  </div>

  <div class="mb-6 flex flex-col sm:flex-row items-center justify-between space-y-4 sm:space-y-0 sm:space-x-4">
    <div class="flex items-center space-x-4"> <!-- Contenedor para Año y Mes -->
      <select
        class="text-xl font-semibold text-gray-800 border border-gray-300 rounded-md pl-4 bg-gray-50 shadow transition-all">
        <option value="2023">2023</option>
        <option value="2024">2024</option>
        <option value="2025" selected>2025</option>
        <option value="2026">2026</option>
        <option value="2027">2027</option>
      </select>

      <!-- Selector de Mes -->
      <div class="flex items-center space-x-2">
        <button class="p-2 rounded-full text-gray-600 hover:bg-gray-200 transition duration-150 ease-in-out">
          <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none"
            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
            class="lucide lucide-chevron-left-icon lucide-chevron-left">
            <path d="m15 18-6-6 6-6" />
          </svg>
        </button>
        <span class="text-xl font-semibold text-gray-800">Julio</span>
        <button class="p-2 rounded-full text-gray-600 hover:bg-gray-200 transition duration-150 ease-in-out">
          <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none"
            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
            class="lucide lucide-chevron-right-icon lucide-chevron-right">
            <path d="m9 18 6-6-6-6" />
          </svg>
        </button>
      </div>
    </div>

    <!-- Days selector (carousel-like) -->
    <div
      class="flex overflow-x-auto space-x-3 p-1 rounded-lg">
      <button
        class="flex-shrink-0 flex flex-col items-center justify-center w-[60px] h-16 p-2 rounded-lg bg-white text-blue-600 border border-blue-500 shadow-md transition duration-150 ease-in-out transform scale-105">
        <span class="text-sm font-medium">Jue</span>
        <span class="text-xl font-bold">26</span>
      </button>
      <button
        class="flex-shrink-0 flex flex-col items-center justify-center w-[60px] h-16 p-2 rounded-lg bg-gray-100 text-gray-700 hover:bg-gray-200 transition duration-150 ease-in-out">
        <span class="text-sm font-medium">Vie</span>
        <span class="text-xl font-bold">27</span>
      </button>
      <button
        class="flex-shrink-0 flex flex-col items-center justify-center w-[60px] h-16 p-2 rounded-lg bg-gray-100 text-gray-700 hover:bg-gray-200 transition duration-150 ease-in-out">
        <span class="text-sm font-medium">Sáb</span>
        <span class="text-xl font-bold">28</span>
      </button>
      <button
        class="flex-shrink-0 flex flex-col items-center justify-center w-[60px] h-16 p-2 rounded-lg bg-gray-100 text-gray-700 hover:bg-gray-200 transition duration-150 ease-in-out">
        <span class="text-sm font-medium">Dom</span>
        <span class="text-xl font-bold">29</span>
      </button>
      <button
        class="flex-shrink-0 flex flex-col items-center justify-center w-[60px] h-16 p-2 rounded-lg bg-gray-100 text-gray-700 hover:bg-gray-200 transition duration-150 ease-in-out">
        <span class="text-sm font-medium">Lun</span>
        <span class="text-xl font-bold">30</span>
      </button>
      <button
        class="flex-shrink-0 flex flex-col items-center justify-center w-[60px] h-16 p-2 rounded-lg bg-gray-100 text-gray-700 hover:bg-gray-200 transition duration-150 ease-in-out">
        <span class="text-sm font-medium">Mar</span>
        <span class="text-xl font-bold">01</span>
      </button>
      <button
        class="flex-shrink-0 flex flex-col items-center justify-center w-[60px] h-16 p-2 rounded-lg bg-gray-100 text-gray-700 hover:bg-gray-200 transition duration-150 ease-in-out">
        <span class="text-sm font-medium">Mié</span>
        <span class="text-xl font-bold">02</span>
      </button>
      <button
        class="flex-shrink-0 flex flex-col items-center justify-center w-[60px] h-16 p-2 rounded-lg bg-gray-100 text-gray-700 hover:bg-gray-200 transition duration-150 ease-in-out">
        <span class="text-sm font-medium">Jue</span>
        <span class="text-xl font-bold">03</span>
      </button>
    </div>
  </div>

  <!-- Appointment List by Time -->
  <div class="space-y-4">
    <!-- Cita 1: En Curso (A Domicilio - Ejemplo) -->
    <div
      class="bg-white rounded-lg shadow-sm border border-gray-200 p-4 flex flex-col md:flex-row items-start md:items-center justify-between hover:shadow-md transition duration-200 ease-in-out">
      <div
        class="flex flex-col md:flex-row items-start md:items-center space-y-2 md:space-y-0 md:space-x-4 w-full md:w-auto mb-3 md:mb-0">
        <div class="flex-shrink-0 text-xl font-bold text-blue-700 w-36 whitespace-nowrap">
          11:00 - 11:30
        </div>
        <div class="flex-1 space-y-1">
          <p class="text-lg font-semibold text-gray-900">Ana Soto Lopez</p>
          <p class="text-[15px] text-gray-600 flex items-center ml-1">
            <svg xmlns="http://www.w3.org/2000/svg" width="17" height="17" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-phone-icon lucide-phone text-gray-500 mr-1"><path d="M13.832 16.568a1 1 0 0 0 1.213-.303l.355-.465A2 2 0 0 1 17 15h3a2 2 0 0 1 2 2v3a2 2 0 0 1-2 2A18 18 0 0 1 2 4a2 2 0 0 1 2-2h3a2 2 0 0 1 2 2v3a2 2 0 0 1-.8 1.6l-.468.351a1 1 0 0 0-.292 1.233 14 14 0 0 0 6.392 6.384"/></svg>
            +52 231000111
          </p>
          <p class="text-sm text-gray-500 flex items-center ml-1">
            <svg xmlns="http://www.w3.org/2000/svg" width="17" height="17" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-house-icon lucide-house text-blue-600 mr-1"><path d="M15 21v-8a1 1 0 0 0-1-1h-4a1 1 0 0 0-1 1v8"/><path d="M3 10a2 2 0 0 1 .709-1.528l7-5.999a2 2 0 0 1 2.582 0l7 5.999A2 2 0 0 1 21 10v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"/></svg>
            Calle Ficticia 123, Colonia Ejemplo, Ciudad Ficticia
          </p>
        </div>
      </div>
      <div
        class="flex flex-col sm:flex-row items-start sm:items-center justify-end space-y-2 sm:space-y-0 sm:space-x-2 w-full md:w-auto">
        <span
          class="inline-flex items-center px-4 py-1.5 rounded-full text-sm font-medium bg-yellow-100 text-yellow-800">
          En Curso
        </span>
        <div class="flex space-x-1">
          <button
            class="inline-flex items-center p-2 rounded-full text-blue-600 hover:bg-blue-100 transition duration-150 ease-in-out"
            title="Editar">
            {{-- <i data-lucide="pencil" class="lucide lucide-icon w-4 h-4"></i> --}}
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-pencil-icon lucide-pencil w-[18px] h-[18px]"><path d="M21.174 6.812a1 1 0 0 0-3.986-3.987L3.842 16.174a2 2 0 0 0-.5.83l-1.321 4.352a.5.5 0 0 0 .623.622l4.353-1.32a2 2 0 0 0 .83-.497z"/><path d="m15 5 4 4"/></svg>
          </button>
          <button
            class="inline-flex items-center p-2 rounded-full text-red-600 hover:bg-red-100 transition duration-150 ease-in-out"
            title="Cancelar">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-circle-x-icon lucide-circle-x w-[18px] h-[18px]"><circle cx="12" cy="12" r="10"/><path d="m15 9-6 6"/><path d="m9 9 6 6"/></svg>
          </button>
          <button
            class="inline-flex items-center p-2 rounded-full text-gray-600 hover:bg-gray-100 transition duration-150 ease-in-out"
            title="Detalles">
            {{-- <i data-lucide="info" class="lucide lucide-icon w-4 h-4"></i> --}}
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-info-icon lucide-info w-[18px] h-[18px]"><circle cx="12" cy="12" r="10"/><path d="M12 16v-4"/><path d="M12 8h.01"/></svg>
          </button>
        </div>
      </div>
    </div>

    <!-- Cita Pendiente -->
    {{-- <div
      class="bg-white rounded-lg shadow-sm border border-gray-200 p-4 flex flex-col md:flex-row items-start md:items-center justify-between hover:shadow-md transition duration-200 ease-in-out">
      <div
        class="flex flex-col md:flex-row items-start md:items-center space-y-2 md:space-y-0 md:space-x-4 w-full md:w-auto mb-3 md:mb-0">
        <div class="flex-shrink-0 text-xl font-bold text-gray-700 w-36 whitespace-nowrap">
          14:00 - 14:45
        </div>
        <div class="flex-1">
          <p class="text-lg font-semibold text-gray-900">Gabriel Gonzalez Palacios</p>
          <p class="text-sm text-gray-600 flex items-center">
            <i data-lucide="phone" class="lucide lucide-icon w-4 h-4 mr-1 text-gray-500"></i>
            +52 231000111
          </p>
        </div>
      </div>
      <div
        class="flex flex-col sm:flex-row items-start sm:items-center justify-end space-y-2 sm:space-y-0 sm:space-x-2 w-full md:w-auto">
        <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-blue-100 text-blue-800">
          Pendiente
        </span>
        <div class="flex space-x-1">
          <button
            class="inline-flex items-center p-2 rounded-full text-blue-600 hover:bg-blue-100 transition duration-150 ease-in-out"
            title="Editar">
            <i data-lucide="pencil" class="lucide lucide-icon w-4 h-4"></i>
          </button>
          <button
            class="inline-flex items-center p-2 rounded-full text-red-600 hover:bg-red-100 transition duration-150 ease-in-out"
            title="Cancelar">
            <i data-lucide="x-circle" class="lucide lucide-icon w-4 h-4"></i>
          </button>
          <button
            class="inline-flex items-center p-2 rounded-full text-gray-600 hover:bg-gray-100 transition duration-150 ease-in-out"
            title="Detalles">
            <i data-lucide="info" class="lucide lucide-icon w-4 h-4"></i>
          </button>
        </div>
      </div>
    </div> --}}
  </div>
</div>
