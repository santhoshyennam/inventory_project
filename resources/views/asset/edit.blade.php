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
            <h3> <center> Edit Asset </center> </h3>
            <form action="{{ route('asset.update', 1) }}">
                @csrf
                @method('PATCH')
                <div class="container">
                  <label for="name"><b>Asset Name</b></label>
                  <input type="text" placeholder="Enter name" name="name" required>
                  <label for="description"><b>Description</b></label>
                  <input type="text" placeholder="Enter description" name="description" required>
                  <label for="value"><b>Price</b></label>
                  <input type="number" placeholder="Enter value" name="value" required>
                  <button type="submit" name="submit">Submit</button>
                </div>
              </form>
        </div>
    </body>
</html>