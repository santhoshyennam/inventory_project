<!DOCTYPE html>
<html>
    <head>
        <style>
            <?php include public_path('css/create.css') ?>
        </style>
    </head>
    <body>
        <div class="content">
            <h3> <center> Edit Person </center> </h3>
            <form action="{{ route('person.update', $person->id) }}" method="POST">
                @csrf
                @method('PATCH')
                <div class="container">
                  <label for="first name"><b>First name</b></label>
                  <input type="text" placeholder="Enter first name" name="first_name" value="{{ $person->first_name}}" required>
                  <label for="last name"><b>Last name</b></label>
                  <input type="text" placeholder="Enter last name" name="last_name" value="{{ $person->last_name}}" required>
                  <label for="email"><b>Email</b></label>
                  <input type="text" placeholder="Enter email" name="email" value="{{ $person->email}}" required>
                  <label for="dob"><b>Date of Birth</b></label>
                  <input type="date" placeholder="Enter date of birth" name="date_of_birth" value="{{ $person->date_of_birth}}" required>
              
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

