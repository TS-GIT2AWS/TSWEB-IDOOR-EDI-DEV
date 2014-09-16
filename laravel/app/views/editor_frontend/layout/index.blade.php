@extends('editor.layout.default')

{{-- Menu --}}



{{-- Content --}}
@section('content')

<div id="unityPlayer">
    <div class="missing">
        <a href="http://unity3d.com/webplayer/" title="Unity Web Player. Install now!">
            <img alt="Unity Web Player. Install now!" src="http://webplayer.unity3d.com/installation/getunity.png" width="193" height="63" />
        </a>
    </div>
    <div class="broken">
        <a href="http://unity3d.com/webplayer/" title="Unity Web Player. Install now! Restart your browser after install.">
            <img alt="Unity Web Player. Install now! Restart your browser after install." src="http://webplayer.unity3d.com/installation/getunityrestart.png" width="193" height="63" />
        </a>
    </div>
</div>

@stop

{{-- Javascripts --}}
@section('scripts')

<script type='text/javascript' src='https://ssl-webplayer.unity3d.com/download_webplayer-3.x/3.0/uo/jquery.min.js'></script>
<script type='text/javascript' src='http://webplayer.unity3d.com/download_webplayer-3.x/3.0/uo/UnityObject2.js'></script>
        
@stop

