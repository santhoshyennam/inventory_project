<!DOCTYPE html>
<html>
    <head>
        <style>
            <?php include public_path('css/index.css') ?>
        </style>
    </head>
    <body>
        @if(session()->get('asset_deleted'))
        <div class="delete_success"><p> asset {{ session()->get('asset_deleted.name') }} is deleted!</p></div>
        @endif
        @if(session()->get('asset_created'))
           <div class="create_success"><p> asset {{ session()->get('asset_created.name') }} is created!</p></div>
        @endif
        @if(session()->get('asset_updated'))
        <div class="create_success"><p> asset {{ session()->get('asset_updated.name') }} is updated!</p></div>
        @endif
        @if(session()->get('error'))
        {{ session()->get('error') }}
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
            @if(count($assets) > 0)
                <h3> <center> Asset Details </center> </h3>
            <table id="customers">
                <tr>
                  <th>name</th>
                  <th>Description</th>
                  <th>Value</th>
                  <th>actions</th>
                </tr>
                @foreach($assets as $asset)
                <tr>
                    <td><a href="{{ route('person.show', $asset->id) }}">{{ $asset->name }}</a></td>
                    <td>{{ $asset->description }}</td>
                    <td>{{ $asset->value }}</td>
                    <td>
                      <div>
                        <a href="{{ route('asset.edit', $asset->id) }}">Edit</a>
                          <form action="{{ route('asset.destroy', $asset->id) }}" method="post">
                              @csrf
                              @method('DELETE')
                              <a href="#" onclick="event.preventDefault(); this.closest('form').submit();">Delete</a>
                          </form>
                      </div>
                    </td>
                </tr>
                @endforeach
              </table>
            @else
            <div class="no-data">
              <p><center>
                No assets available right now! <a href="{{ route('asset.create') }}"> Add asset? </a>
              </center>
              </p>
              <div>
            @endif
          </div>
    </body>
</html>