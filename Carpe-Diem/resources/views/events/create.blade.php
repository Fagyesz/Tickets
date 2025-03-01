@extends('layout')

 @section('content')
 <div class="flex bg-cover bg-full bg-center bg-no-repeat" style="background-image: url( '../images/create_event.jpg')">

    <x-card class="p-10 max-w-lg mx-auto mt-24 px-4">
        <header class="text-center">
            <h2 class="text-2xl font-bold uppercase mb-1">
                Create
            </h2>
            <p class="mb-4">Post a new Event</p>
        </header>

        <form method="POST" action="/create" enctype="multipart/form-data">
            @csrf
            <div class="mb-6">
                <label for="title" class="inline-block text-lg mb-2">Title</label>
                <input type="text" class="border border-gray-200 rounded p-2 w-full" name="title"
                    value="{{ old('title') }}" placeholder="Example: XY Concert" />
                @error('title')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-6">
                <label for="location" class="inline-block text-lg mb-2">Location</label>
                <input type="text" class="border border-gray-200 rounded p-2 w-full" name="location"
                    value="{{ old('location') }}" placeholder="Example: Eger, XY Sörkert" />
                @error('location')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

 {{--            <div class="mb-6">
                <label for="organizer" class="inline-block text-lg mb-2">Organizer</label>
                <input type="text" class="border border-gray-200 rounded p-2 w-full" name="organizer"
                    value="{{ old('organizer') }}" placeholder="" />
                @error('organizer')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div> --}}


            <div class="mb-6">
                <label for="ticket_price" class="inline-block text-lg mb-2">Ticket price</label>
                <input type="text" class="border border-gray-200 rounded p-2 w-full" name="ticket_price"
                    value="{{ old('ticket_price') }}" placeholder="€" />
                @error('ticket_price')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-6">
                <label for="tickets_available" class="inline-block text-lg mb-2">Tickets quantity</label>
                <input type="text" class="border border-gray-200 rounded p-2 w-full" name="tickets_available"
                    value="{{ old('tickets_available') }}" placeholder="" />
                @error('tickets_available')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-6">
                <label for="event_image" class="inline-block text-lg mb-2">
                    Image <p class="text-sm">*Optional</p>
                </label>
                <input type="file" class="border border-gray-200 rounded p-2 w-full" name="event_image" />
                @error('event_image')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-6">
                <label for="description" class="inline-block text-lg mb-2">
                    Description
                </label>
                <textarea class="border border-gray-200 rounded p-2 w-full" name="description" rows="10"
                    placeholder="Event schedule...">{{ old('description') }}</textarea>
                @error('description')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-6">
                <label for="start_time" class="inline-block text-lg mb-2">Starting time</label>
                <input type="datetime-local" class="border border-gray-200 rounded p-2 w-full" name="start_time"
                    value="{{ old('start_time') }}" placeholder="" />
                @error('start_time')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-6">
                <label for="start_time" class="inline-block text-lg mb-2">Ending time</label>
                <input type="datetime-local" class="border border-gray-200 rounded p-2 w-full" name="end_time"
                    value="{{ old('end_time') }}" placeholder="" />
                @error('end_time')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            

            <div class="mb-6">
                <button class="bg-laravel text-black rounded py-2 px-4 hover:bg-black text-white ">
                    Create the event 
                </button>

                <a href="/" class="text-black ml-4"> Back </a>
            </div>
        </form>
        </div>
    </x-card>
</div>
 @endsection
