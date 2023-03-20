<!DOCTYPE html>
<html>
    <head>
        <style>
            <?php include public_path('css/home.css') ?>
        </style>
    </head>
    <body>
        @include('header')
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="relative sm:flex sm:justify-center sm:items-center min-h-screen bg-dots-darker bg-center bg-gray-100 dark:bg-dots-lighter  selection:bg-red-500 selection:text-white">       
                <h1>Project 2 – Laravel Inventory Application</h1>
<b>MSCS3150 Server-side Web Programming
Version 1.1</b>

<h3>Description</h3>
<p>An inventory Laravel application that contains person, asset, and ownership pages can be designed to manage assets and their ownership information. Here's a brief description of each page:</p>

<ul>

<li><b>Person Page:</b> This page can be used to manage information about the people who interact with the assets in the inventory. It can include fields for name, contact information, and any other relevant details. Users can create, view, update, and delete person records as needed.</li>
</br>
<li><b>Asset Page:</b> This page can be used to manage information about the assets in the inventory. It can include fields for asset name, description, serial number, purchase date, and any other relevant details. Users can create, view, update, and delete asset records as needed.</li>
</br>
<li><b>Ownership Page:</b> This page can be used to manage ownership information for assets in the inventory. It can include fields for the person who owns the asset, the asset itself, the date of ownership, and any other relevant details. Users can create, view, update, and delete ownership records as needed.</li>
</br>
</ul>
<p>By combining these pages, users can manage the assets and their ownership information effectively. For example, a user can create a person record, an asset record, and then link them via an ownership record. This would establish ownership of the asset by the person. Users can also search for assets by person, or search for people who own a specific asset. This type of application can be useful for managing inventory for businesses or organizations that deal with physical assets.