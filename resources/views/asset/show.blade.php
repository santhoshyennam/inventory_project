<!DOCTYPE html>
<html>
    <head>
        <style>
            <?php include public_path('css/index.css') ?>
        </style>
        <title>Asset Number {{ $asset->id }}</title>
    </head>
    <body>
        @include('header')

        <h1>Asset Number {{ $asset->id }}</h1>
        <ul>
            <li>Name: {{ $asset->name }}</li>
            <li>Description: {{ $asset->description }} </li>
            <li>Value: {{ $asset->value }} </li>
            {{-- <li>Date Purchased: {{ $asset->purchased }}</li> --}}
        </ul>
        <div class="actions">
            <a href="{{ route('asset.edit', $asset->id) }}">Edit</a>
              <form action="{{ route('asset.destroy', $asset->id) }}" method="post" style="margin-top:6px;">
                  @csrf
                  @method('DELETE')
                  <a href="#" onclick="event.preventDefault(); this.closest('form').submit();">Delete</a>
              </form>
          </div>
    </body>
</html>
