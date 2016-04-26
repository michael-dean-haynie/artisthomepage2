<div class="row selection">
    <div class="row">
        @for($i = 0; $i < 4; $i++)
            @if(array_key_exists($i, $catSelection))
                <a href="{{url('/feature/' . $catSelection[$i]->itemID)}}">
                    <div class="col-xs-offset-1 col-xs-2 item-container">
                        <div class="img-wrapper">
                            <img  class="img-responsive img-rounded my-thumbnail" src="{{asset('items/' . $catSelection[$i]->fileName)}}">
                        </div>
                        <div class="item-info item-info-bottom well well-sm">
                            <span class="bold">{{$catSelection[$i]->title}}</span>
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
                <a href="{{url('/feature/' . $catSelection[$i]->itemID)}}">
                    <div class="col-xs-offset-1 col-xs-2 item-container">
                        <div class="img-wrapper">
                            <img  class="img-responsive img-rounded my-thumbnail" src="{{asset('items/' . $catSelection[$i]->fileName)}}">
                        </div>
                        <div class="item-info item-info-bottom well well-sm">
                            <span class="bold">{{$catSelection[$i]->title}}</span>
                        </div>
                    </div>
                </a>
            @endif
        @endfor
    </div>
</div>