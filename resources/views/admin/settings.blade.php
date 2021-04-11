@extends($isAdmin ? 'admin.layouts.admin' : 'layouts.app')

@section('title', 'Admin plugin home')

@section('content')
<div class="card shadow mb-4">
    <div class="card-body">
        <form action="{{$route}}" method="POST">
            @csrf

            <div class="form-group">
                <label for="exampleFormControlSelect1">{{trans('minecraft::messages.choose-version')}}</label>
                <select class="form-control" id="exampleFormControlSelect1" name="type">
                    @foreach ($currentOrAvailableGames as $game)
                    <option value="{{$game}}" @if(config('azuriom.game')===$game) selected @endif>
                        {{ trans("minecraft::messages.games.$game") }}</option>
                    @endforeach
                </select>
            </div>
            <button class="btn btn-primary" type="submit">save</button>
        </form>
    </div>
</div>
@endsection
