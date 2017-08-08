<ul>
    <li><a href="/users">Users</a></li>
    <li><a href="/news">News</a></li>
</ul>


<table class="table table-bordered">
    <tr>
        <th>Id</th>
        <th>Name</th>
        <th>Age</th>
    </tr>
    
    @foreach($users as $user)
    <tr>        
        <th> <a href="/users/{{$user->id}}">{{ $user->id }}</a></th>        
        <th> {{ $user->name }} </th>        
        <th> {{ $user->age }} </th>        
    </tr>
    @endforeach
    

</table>