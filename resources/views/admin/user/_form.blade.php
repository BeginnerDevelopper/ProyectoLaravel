<h3>Lista de Roles</h3>
<div class="form-group">
 <ul class="list-unstyled">
     @foreach ($roles as $role)
        <li>
            <label for="">
                {!! Form::checkbox('roles[]', $role->id, null) !!}
                {{$role->name}}  
                <em>({{$role->description}})</em>
            </label>
        </li>
     @endforeach
 </ul>
</div>