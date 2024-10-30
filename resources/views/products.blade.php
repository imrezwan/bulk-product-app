@extends('layout')

<x-dashui-card style="margin-bottom: 20px;">Products Page</x-dashui-card>

{{-- <x-dashui-index-table :headings="[
            ['title' => 'Title'],
            ['title' => 'Handle',]
        ]">

            @foreach ($products as $product)    
                <x-dashui-table-row :id="1020">
                    <x-dashui-table-cell class="font-bold">{{$product['title']}}</x-dashui-table-cell>
                    <x-dashui-table-cell>{{$product['handle']}}</x-dashui-table-cell>
                </x-dashui-table-row>
            @endforeach
</x-dashui-index-table> --}}


<x-dashui-index-table :headings="[
            ['title' => 'Title'],
            ['title' => 'Handle'],
            ['title' => 'Price'],
            ['title' => 'Status'],
            ['title' => 'Created At'],
            ['title' => 'Updated At'],
            ['title' => 'Image']
        ]">

    @foreach ($products as $product)    
        <x-dashui-table-row :id="$product['id']">
            <x-dashui-table-cell class="font-bold">{{ $product['title'] }}</x-dashui-table-cell>
            <x-dashui-table-cell>{{ $product['handle'] }}</x-dashui-table-cell>
            
            <!-- Price (Assuming the first variant’s price) -->
            <x-dashui-table-cell>
                @if(!empty($product['variants']))
                    ${{ $product['variants'][0]['price'] }}
                @else
                    N/A
                @endif
            </x-dashui-table-cell>

            <!-- Status -->
            <x-dashui-table-cell>{{ ucfirst($product['status'] ?? 'unknown') }}</x-dashui-table-cell>

            <!-- Created At -->
            <x-dashui-table-cell>{{ \Carbon\Carbon::parse($product['created_at'])->format('Y-m-d') }}</x-dashui-table-cell>

            <!-- Updated At -->
            <x-dashui-table-cell>{{ \Carbon\Carbon::parse($product['updated_at'])->format('Y-m-d') }}</x-dashui-table-cell>

            <!-- Image (Displaying the first image if available) -->
            <x-dashui-table-cell>
                @if(isset($product['image']))
                    <img src="{{ $product['image']['src'] }}" alt="{{ $product['title'] }}" style="max-width: 50px;">
                @else
                    No image
                @endif
            </x-dashui-table-cell>
        </x-dashui-table-row>
    @endforeach

</x-dashui-index-table>
