<!DOCTYPE html>
<html>
    <head>
        <style>
            <?php include public_path('css/create.css') ?>
        </style>
    </head>
    <body>
        @include('header')

        @if(session()->get('success'))
            {{ session()->get('success') }}
        @endif
        <div class="content">
            <h3> <center> Create Asset </center> </h3>
            <form action="{{ route('asset.store') }}" method="POST">
                @csrf
                <div class="container">
                  <label for="name"><b>Asset Name</b></label>
                  <input type="text" placeholder="Enter name" name="name" required>
                  <label for="description"><b>Description</b></label>
                  <input type="text" placeholder="Enter description" name="description" required>
                  <label for="value"><b>Price</b></label>
                  <input type="number" placeholder="Enter value" name="value" required>
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