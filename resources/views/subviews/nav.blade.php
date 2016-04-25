<div class="row tac nav well well-sm">
    <a class="btn btn-default my-nav-btn fs1p5rem{{$catPage == 1 ? ' disabled' : ''}}"
       href="{{url('/category/' . $catName . '/1/' . $catCurrOrder)}}">First</a>

    <a class="btn btn-default my-nav-btn fs1p5rem{{$catPage == 1 ? ' disabled' : ''}}"
       href="{{url('/category/' . $catName . '/' . ($catPage-1) . '/' . $catCurrOrder)}}">Previous</a>

    <span class="fs1p5rem my-nav-btn">Page {{$catPage}} of {{$catPageCount}}</span>

    <a class="btn btn-default my-nav-btn fs1p5rem{{$catPage == $catPageCount ? ' disabled' : ''}}"
       href="{{url('/category/' . $catName . '/' . ($catPage+1) . '/' . $catCurrOrder)}}">Next</a>

    <a class="btn btn-default my-nav-btn fs1p5rem{{$catPage == $catPageCount ? ' disabled' : ''}}"
       href="{{url('/category/' . $catName . '/' . ($catPageCount) . '/' . $catCurrOrder)}}">Last</a>
</div>