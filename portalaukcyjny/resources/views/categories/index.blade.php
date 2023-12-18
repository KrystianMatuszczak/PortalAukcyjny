<x-app-layout>
  <header class="bg-white shadow text-xl">
    <h2 class="text-center max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
      Kategorie produktu
    </h2>
  </header>
  <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
    <div class="grid justify-items-stretch pt-4 pb-2">
      @can('create', App\Models\Category::class)
      <x-button primary label="{{ __('Dodaj kategorię') }}"
      href="{{ route('categories.create')}}"
      class="justify-self-end"/>
      @endcan
    </div>
    <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
      <livewire:categories.categories-table-view />
    </div>
  </div>
    <!DOCTYPE html>
<html lang="pl">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/footer.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
  <div class="footer">
<div class="row">
<a href="#"><i class="fa fa-facebook"></i></a>
<a href="#"><i class="fa fa-instagram"></i></a>
<a href="#"><i class="fa fa-youtube"></i></a>
<a href="#"><i class="fa fa-twitter"></i></a>
</div>

<div class="grid-container">
  <div class="grid-item"><a href="#">About us</a></div>
  <div class="grid-item"><a href="#">Contact</a></div>
  <div class="grid-item"><a href="#">FAQ</a></div>
</div>

<div class="row">
Copyright © 2023 
</div>
</div>
</x-app-layout>