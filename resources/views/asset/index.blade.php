<!DOCTYPE html>
<html>
    <head>
        <style>
            <?php include public_path('css/index.css') ?>
        </style>
    </head>
    <body>
      @include('header')
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
                  <th> purchased date </th>
                  @auth
                  <th>actions</th>
                  @endauth
                </tr>
                @foreach($assets as $asset)
                <tr>
                    <td><a href="{{ route('asset.show', $asset->id) }}">{{ $asset->name }}</a></td>
                    <td>{{ $asset->description }}</td>
                    <td>{{ $asset->value }}</td>
                    @if($asset->purchased != NULL)
                    <td>{{ $asset->purchased }} </td>
                    @else
                    <td> Not purchased </td>
                    @endif
                    @auth
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
                    @endauth
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