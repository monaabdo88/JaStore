@if(session()->has('msg'))
    <div class="alert alert-success">
        <p class="text-center">{{session()->get('msg')}}</p>
    </div>
    @endif