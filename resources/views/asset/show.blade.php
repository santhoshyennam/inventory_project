<!DOCTYPE html>
<html>
    <head>
        <title>Asset Number {{ $asset->id }}</title>
    </head>
    <body>
        <h1>Asset Number {{ $asset->id }}</h1>
        <ul>
            <li>Name: {{ $asset->name }}</li>
            <li>Description: {{ $asset->description }} </li>
            <li>Value: {{ $asset->value }} </li>
            <li>Date Purchased: {{ $asset->purchased }}</li>
        </ul>
    </body>
</html>
