<!DOCTYPE html>
<html>
    <head>
        <style>
            <?php include public_path('css/index.css') ?>
        </style>
    </head>
    <body>
        @if(session()->get('success'))
            {{ session()->get('success') }}
        @endif

         {{-- <table>
            <tr><td>Name</td><td>Description</td><td>Value</td><td>Date Purchased</td><td>Action</td><td></td></tr>
            @foreach($asset as $item)
            <tr>
                <td><a href="{{ route('asset.show', $item->id) }}">{{ $item->name }}</a></td>
                <td>{{ $item->description }}</td>
                <td>{{ $item->value }}</td>
                <td>{{ $item->purchased }}</td>
                <td><a href="{{ route('asset.edit', $item->id) }}">Edit</a></td>
                <td>
                    <form action="{{ route('asset.destroy', $item->id) }}" method="post">
                        @csrf
                        @method('DELETE')
                        <button type='submit'>Delete</button>         
                    </form>
                </td>
            </tr>
            @endforeach
        </table> --}}
        <div class="create">
            <a href="{{ route('asset.create') }}">Create Asset</a>
        </div>
        <div class="content">
            <h3> <center> Asset Details </center> </h3>
        <table id="customers">
            <tr>
              <th>Name</th>
              <th>Description</th>
              <th>Value</th>
              <th>Date purchased </th>
              <th> Action </th>
            </tr>
            <tr>
              <td>Alfreds Futterkiste</td>
              <td>Maria Anders</td>
              <td>Germany</td>
              <td>Maria Anders</td>
              <td>
                <div class="action">
                <a href="{{ route('asset.edit', 1) }}" >Edit</a>
                <a href="{{ route('asset.destroy', 1) }}">Delete</a>
                </div>
              </td>
            </tr>
            <tr>
              <td>Berglunds snabbköp</td>
              <td>Christina Berglund</td>
              <td>Sweden</td>
              <td>Maria Anders</td>
              <td>Germany</td>
            </tr>
          </table>
        </div>
    </body>
</html>