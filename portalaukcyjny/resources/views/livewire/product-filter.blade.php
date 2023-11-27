<!-- resources/views/livewire/product-filter.blade.php -->

<div>
    <h1>Lista produktów</h1>

    <!-- Formularz do filtrowania -->
    <form wire:submit.prevent="render">
        <!-- Dodaj pola formularza do filtrowania -->
        <label for="category">Kategoria:</label>
        <select wire:model="category" id="category">
            <option value="">Wszystkie</option>
            <option value="kategoria1">Kategoria 1</option>
            <option value="kategoria2">Kategoria 2</option>
            <!-- Dodaj pozostałe opcje kategorii -->
        </select>

        <label for="price_from">Cena od:</label>
        <input wire:model="priceFrom" type="number" name="price_from" id="price_from">

        <label for="price_to">Cena do:</label>
        <input wire:model="priceTo" type="number" name="price_to" id="price_to">

        <button type="submit">Filtruj</button>
    </form>
</div>
