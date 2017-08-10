<style>
    .errors {
        background-color: #eee;
        color :red;
        padding: 10px;
    }
</style>

@include('shared.form-errors')

<form action="/students" method="post">
    
    {{ csrf_field() }}

    <div class="form-group">
        <p>Name</p>
        <input type="text" name="name" >
    </div>
    
    <div class="form-group">
        <p>Family Name</p>
        <input type="text" name="family_name" >
    </div>
    
    <div class="form-group">
        <p>Grade</p>
        <input type="number" name="grade" >
    </div>

    <button type="submit">SAVE</button>
</form>