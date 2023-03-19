<!DOCTYPE html>
<html>
    <head>
        <style>
            <?php include public_path('css/index.css') ?>
        </style>
    </head>
    <body>
        @if(session()->get('ownership_deleted'))
        <div class="delete_success"><p> ownership is unassigned!</p></div>
        @endif
        @if(session()->get('ownership_created'))
           <div class="create_success"><p> ownership is created for an asset!</p></div>
        @endif
        @if(session()->get('ownership_updated'))
        <div class="create_success"><p> ownership is updated!</p></div>
        @endif
        @if(session()->get('error'))
        {{ session()->get('error') }}
        @endif
        <div class="create">
            <a href="{{ route('owner.create') }}">Assign onwership</a>
        </div>
        <div class="content">
            @if(count($assets) > 0)
                <h3> <center> Asset/Person Details </center> </h3>
            <table id="customers">
                <tr>
                  <th>name</th>
                  <th>Own by</th>
                  <th>Price</th>
                  <th>actions</th>
                </tr>
                @foreach($assets as $asset)
                @if($asset->person_id != NULL)
                <tr>
                    <td><a href="{{ route('asset.show', $asset->id) }}">{{ $asset->name }}</a></td>
                    <td><a href="{{ route('person.show', $asset->person->id) }}">{{ $asset->person->first_name }}</a></td>
                    <td>{{ $asset->value }}</td>
                    <td>
                      <div>
                        <a href="{{ route('owner.edit', $asset->id) }}">Edit</a>
                          <form action="{{ route('owner.destroy', $asset->id) }}" method="post">
                              @csrf
                              @method('DELETE')
                              <a href="#" onclick="event.preventDefault(); this.closest('form').submit();">Delete</a>
                          </form>
                      </div>
                    </td>
                </tr>
                @endif
                @endforeach
              </table>
            @else
            <div class="no-data">
              <p><center>
                No assets are available to assign to person! <a href="{{ route('asset.create') }}"> Add asset? </a>
              </center>
              </p>
              <div>
            @endif
          </div>
    </body>
</html>