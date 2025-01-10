<x-layout>
<x-nav/>
<div class="flex justify-center items-center h-screen bg-gray-100">
  <form action="{{ route('bug.store') }}" method="POST" class="bg-white p-6 rounded-lg shadow-md w-96">
      @csrf
      <h1 class="text-2xl font-bold mb-4 text-gray-700">Report a New Bug</h1>

      <!-- Title Input -->
      <div class="mb-4">
          <label for="title" class="block text-sm font-medium text-gray-700 mb-1">Bug Title</label>
          <input 
              class="border border-gray-300 w-full p-2 rounded focus:outline-none focus:ring-2 focus:ring-blue-500" 
              type="text" 
              name="title" 
              value="{{ old('title') }}" 
              placeholder="Enter the name of the bug">
          @error("title")
              <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
          @enderror
      </div>

      <!-- Type Dropdown -->
      <div class="mb-4">
          <label for="type" class="block text-sm font-medium text-gray-700 mb-1">Type</label>
          <select 
              name="type" 
              class="border border-gray-300 w-full p-2 rounded focus:outline-none focus:ring-2 focus:ring-blue-500">
              <option value="Bug">Bug</option>
              <option value="Error">Error</option>
              <option value="Issue">Issue</option>
          </select>
          @error("type")
              <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
          @enderror
      </div>

      <!-- Priority Dropdown -->
      <div class="mb-4">
          <label for="Priority" class="block text-sm font-medium text-gray-700 mb-1">Priority</label>
          <select 
              name="Priority" 
              class="border border-gray-300 w-full p-2 rounded focus:outline-none focus:ring-2 focus:ring-blue-500">
              <option value="Low">Low</option>
              <option value="Medium">Medium</option>
              <option value="High">High</option>
          </select>
      </div>

      <!-- Severity Dropdown -->
      <div class="mb-4">
          <label for="severity" class="block text-sm font-medium text-gray-700 mb-1">Severity</label>
          <select 
              name="severity" 
              class="border border-gray-300 w-full p-2 rounded focus:outline-none focus:ring-2 focus:ring-blue-500">
              <option value="minor">Minor</option>
              <option value="major">Major</option>
              <option value="critical">Critical</option>
          </select>
      </div>

      <!-- Description -->
      <div class="mb-4">
          <label for="description" class="block text-sm font-medium text-gray-700 mb-1">Description</label>
          <textarea 
              name="description" 
              id="description" 
              class="border border-gray-300 w-full p-2 rounded focus:outline-none focus:ring-2 focus:ring-blue-500" 
              placeholder="Provide details about the bug">{{ old('description') }}</textarea>
          @error("description")
              <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
          @enderror
      </div>

      <!-- Hidden Input -->
      <input type="hidden" name="id" value="{{ $id }}">

      <!-- Submit Button -->
      <div class="mt-4">
          <button 
              type="submit" 
              class="bg-blue-500 text-white font-semibold py-2 px-4 rounded hover:bg-blue-600 focus:ring-2 focus:ring-blue-300">
              Add New Bug
          </button>
      </div>
  </form>
</div>  
</x-layout>