<div class="row selection">
    <div class="row">
        @for($i = 0; $i < 4; $i++)
            @if(array_key_exists($i, $catSelection))
                <a href="{{url('/home')}}">
                    <div class="col-xs-offset-1 col-xs-2 item-container">
                        <img  class="img-responsive my-thumbnail" src="{{asset('items/' . $catSelection[$i]->fileName)}}">
                        <div class="item-info item-info-bottom well well-sm">
                            This is a title
                        </div>
                    </div>
                </a>
            @endif
        @endfor
    </div>
    <div class="spacer3rem"></div>
    <div class="row">
        @for($i = 4; $i < 8; $i++)
            @if(array_key_exists($i, $catSelection))
                <a href="{{url('/home')}}">
                    <div class="col-xs-offset-1 col-xs-2 item-container">
                        <img  class="img-responsive my-thumbnail" src="{{asset('items/' . $catSelection[$i]->fileName)}}">
                        <div class="item-info item-info-bottom well well-sm">
                            This is a title
                        </div>
                    </div>
                </a>
            @endif
        @endfor
    </div>
</div>