@if ($errors->any())
    <div class="alert alert-danger pb-0 col-md-8 mx-auto mt-2">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif