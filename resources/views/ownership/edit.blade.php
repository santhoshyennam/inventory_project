<!DOCTYPE html>
<html>
    <head>
        <style>
            <?php include public_path('css/create.css') ?>
        </style>
    </head>
    <body>
        @if(session()->get('success'))
            {{ session()->get('success') }}
        @endif
        <div class="content">
            <h3> <center> Edit Ownership </center> </h3>
            <form action="{{ route('owner.update', $asset->id) }}" method="POST">
                @csrf
                @method('PATCH')
                <div class="container">
                  <label><b>Select Person for Asset <a href="{{ route('asset.show', $asset->id) }}"> {{ $asset->name}}: </a> </b></label><br/>
                    <select name="person_id">
                        @foreach($persons as $person)
                            @if($person->id == $asset->person_id)
                            <option value={{ $person->id }} selected>{{ $person->first_name }}  </option>
                            @else
                            <option value={{ $person->id }}>{{ $person->first_name }}  </option>
                            @endif
                        @endforeach
                    </select>
                  <button type="submit" name="submit">Submit</button>
                </div>
              </form>
        </div>
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li><p style="color:red;">{{ $error }}</p></li>
                @endforeach
            </ul>
        </div>
        @endif
    </body>
</html>