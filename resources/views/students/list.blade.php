<style>
    table th, table td {
        border :1px solid #eee;
        padding: 10px;
    }

    table {
        border-collapse: collapse;
    }


</style>
<ul>
    <li><a href="/users">Users</a></li>
    <li><a href="/students">Students</a></li>
    <li><a href="/news">News</a></li>
</ul>


<ul>
    @foreach($documents as $d)
    <li>{{ $d }}</li>
    @endforeach
</ul>


<table class="table table-bordered">
    <tr>
        <th>Id</th>
        <th>Name</th>
        <th>Grade</th>
        <th>Subscriptions</th>
    </tr>
    
    @foreach($students as $student)
    <tr>        
        <td> <a href="/students/{{$student->id}}">{{ $student->id }}</a></td>        
        <td> {{ $student->name }} </td>
        <td> {{ $student->grade }} </td>
        <td>
        {{ $student->subscriptions }}
           
        </td>
    </tr>
    @endforeach
    

</table>