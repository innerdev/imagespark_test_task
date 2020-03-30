<h2>Search your user!</h2>
<form action="/" method="get">
    <div class="row">
        <div class="col">
            <label>By name:</label>
            <input name="name" type="text" class="form-control" placeholder="Name" value="{{ request()->get('name') }}">
        </div>
        <div class="col">
            <label>By city:</label>
            <select name="city_id" class="form-control">
                <option value="">- not selected -</option>
                @if (count($cities) > 0)
                    @foreach ($cities as $city)
                        <option value="{{ $city->id }}"
                        @if(request()->get('city_id') == $city->id)
                            selected
                        @endif
                        >{{ $city->name }}</option>
                    @endforeach
                @endif
            </select>
        </div>
    </div>
    <button type="submit" class="btn btn-primary">Find user</button>
    <button type="button" class="btn btn-secondary" onclick="window.location = '/';">Clear form</button>
</form>
