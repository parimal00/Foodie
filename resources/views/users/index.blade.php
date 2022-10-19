@vite('resources/css/app.css')

<table class="w-full text-left">
    <tr>
        <th>Name</th>
        <th>Email</th>
    </tr>
    @foreach ($users as $user)
        @if ($loop->index % 2 == 0)
            <tr class="bg-gray-50 border-b-2 py-3 h-10">
            @else
            <tr class="bg-white border-b-2 py-3 h-10">
        @endif
        <td>{{ $user->name }}</td>
        <td>{{ $user->email }}</td>
        </tr>
    @endforeach
</table>
<nav aria-label="Page navigation example" class="pagination">
{{$users->links("my_paginator")}}
</nav>
