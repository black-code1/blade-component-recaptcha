<x-layout>
  <h1 class="text-lg font-bold mb-6">Create a Post</h1>

  <form method="post" action="/posts" x-data @submit.prevent="$dispatch('recaptcha')">
    @csrf

    <div class="mb-6">
      <label for="title" class="block mb-2 uppercase font-bold text-xs text-gray-700">Title</label>

      <input class="border border-gray-400 p-2 w-full" type="text" name="title" id="title" required>

      @error('title')
      <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
      @enderror
    </div>

    <div class="mb-6">
      <label for="body" class="block mb-2 uppercase font-bold text-xs text-gray-700">body</label>

      <textarea name="body" id="body" required></textarea>
      @error('body')
      <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
      @enderror
    </div>

    <x-recaptcha />


    <div class="mb-6">
      {{-- data-sitekey="{{ config('services.recaptcha.key') }}" --}}
      <button type="submit" class="bg-blue-400 text-white rounded py-2 px-4 hover:bg-blue-500">Submit</button>
    </div>

    <ul>
      @if ($errors->any())
      @foreach ($errors->all() as $error)
      <li>{{ $error }}</li>
      @endforeach
      @endif
    </ul>
  </form>
</x-layout>