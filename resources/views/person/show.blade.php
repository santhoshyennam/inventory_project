<!DOCTYPE html>
<html>
    <head>
        <style>
            <?php include public_path('css/index.css') ?>
        </style>
        <title>Person Id {{ $person->id }}</title>
    </head>
    <body>
        @include('header')
        <h1>{{ $person->first_name }}</h1>
        <ul>
            <li>Last name: {{ $person->last_name }}</li>
            <li>Email: {{ $person->email }} </li>
            <li>Date of Birth: {{ $person->date_of_birth }} </li>
        </ul>
        @auth
        <div class="actions">
            <a href="{{ route('person.edit', $person->id) }}">Edit</a>
              <form action="{{ route('person.destroy', $person->id) }}" method="post" style="margin-top:6px;">
                  @csrf
                  @method('DELETE')
                  <a href="#" onclick="event.preventDefault(); this.closest('form').submit();">Delete</a>
              </form>
          </div>
        @endauth  
    </body>
</html>
