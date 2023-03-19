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
        <div class="create">
            <a href="{{ route('owner.create') }}">Assign Owner</a>
        </div>
        <div class="content">
            <h3> <center> Ownership Details </center> </h3>
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
                <a href="{{ route('owner.edit', 1) }}" >Edit</a>
                <a href="{{ route('owner.destroy', 1) }}">Delete</a>
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