@if (session()->has('status'))
    <div class="alert alert-{{ session()->get('status')[0] }}">
        <button type="button" class="close alert-close"><span>×</span></button>
        <p class="text-left">{{ __(session()->get('status')[1]) }}</p>
    </div>
@endif
