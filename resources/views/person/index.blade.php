<!DOCTYPE html>
<html>
    <head>
        <style>
            <?php include public_path('css/index.css') ?>
        </style>
    </head>
    <body>
      @if(session()->get('person_deleted'))
      <div class="delete_success"><p> person {{ session()->get('person_deleted.first_name') }} is deleted!</p></div>
      @endif
      @if(session()->get('person_created'))
         <div class="create_success"><p> person {{ session()->get('person_created.first_name') }} is created!</p></div>
      @endif
      @if(session()->get('person_updated'))
      <div class="create_success"><p> person {{ session()->get('person_updated.first_name') }} is updated!</p></div>
      @endif
      @if(session()->get('error'))
      {{ session()->get('error') }}
      @endif
        <div class="create">
            <a href="{{ route('person.create') }}">Create Person</a>
        </div>

        <div class="content">
          @if(count($persons) > 0)
              <h3> <center> Person Details </center> </h3>
          <table id="customers">
              <tr>
                <th>First name</th>
                <th>Last name</th>
                <th>Date of birth</th>
                <th>Email </th>
                <th>actions</th>
              </tr>
              @foreach($persons as $person)
              <tr>
                  <td><a href="{{ route('person.show', $person->id) }}">{{ $person->first_name }}</a></td>
                  <td>{{ $person->last_name }}</td>
                  <td>{{ $person->date_of_birth }}</td>
                  <td>{{ $person->email }}</td>
                  <td>
                    <div>
                      <a href="{{ route('person.edit', $person->id) }}">Edit</a>
                        <form action="{{ route('person.destroy', $person->id) }}" method="post">
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
              No persons available right now! <a href="{{ route('person.create') }}"> Add person? </a>
            </center>
            </p>
            <div>
          @endif
        </div>
    </body>
</html>