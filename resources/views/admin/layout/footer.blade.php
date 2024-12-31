<footer id="footer" class="py-3 text-center bg-white fixed-bottom border-top {{session()->get('theme') == "dark" ? 'dark-theme' : ''}}">
    <span>{{helper::appdata('')->copyright}}</span>
</footer>

@php
session()->forget('success');
@endphp
