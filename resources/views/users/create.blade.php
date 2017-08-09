<form action="/users" method="post">
    
    {{ csrf_field() }}

    <div class="form-group">
        <p>Name</p>
        <input type="text" name="name">
    </div>
    
    <div class="form-group">
        <p>Age</p>
        <input type="number" name="age">
    </div>

    <button type="submit">SAVE</button>
</form>