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
            <h3> <center> Create Ownership </center> </h3>
            <form action="{{ route('owner.store') }}" method="POST">
                @csrf
                <div class="container">
                  <label><b>Select Asset:</b></label><br/>
                    <select name="id">
                        @foreach($assets as $asset)
                            @if($asset->person_id == NULL)
                                <option value={{ $asset->id}}>{{ $asset->name}}  </option>
                            @endif
                        @endforeach
                    </select><br/>
                  <label><b>Select Person: </b></label><br/>
                    <select name="person_id">
                        @foreach($persons as $person)

                            <option value={{ $person->id}}>{{ $person->first_name}}  </option>
                        @endforeach
                    </select>
                  <button type="submit" name="submit">Submit</button>
                <div class="container">
                  <button type="reset" class="cancelbtn">Reset</button>
                </div>
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