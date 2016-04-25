<div class="row nav well well-sm">
    <div class="col-xs-offset-1 col-xs-1 tac">
        <a class="btn btn-default{{$catPage == 1 ? ' disabled' : ''}}"
           href="{{url('/category/' . $catName . '/1/' . $catCurrOrder)}}">First</a>
    </div>
    <div class="col-xs-offset-1 col-xs-1 tac">
        <a class="btn btn-default{{$catPage == 1 ? ' disabled' : ''}}"
           href="{{url('/category/' . $catName . '/' . ($catPage-1) . '/' . $catCurrOrder)}}">Previous</a>
    </div>
    <div class="col-xs-offset-1 col-xs-2 tac">
        Page {{$catPage}} of {{$catPageCount}}
    </div>
    <div class="col-xs-offset-1 col-xs-1 tac">
        <a class="btn btn-default{{$catPage == $catPageCount ? ' disabled' : ''}}"
           href="{{url('/category/' . $catName . '/' . ($catPage+1) . '/' . $catCurrOrder)}}">Next</a>
    </div>
    <div class="col-xs-offset-1 col-xs-1 tac">
        <a class="btn btn-default{{$catPage == $catPageCount ? ' disabled' : ''}}"
           href="{{url('/category/' . $catName . '/' . ($catPageCount) . '/' . $catCurrOrder)}}">Last</a>
    </div>
</div>