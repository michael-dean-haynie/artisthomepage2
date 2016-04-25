<?php use \App\Http\Controllers\ViewHelperFunctions as VHF;?>

<div class="row menu">
    <div class="col-xs-12">
        <ul class="menu-items">
            <a href="{{url('/home')}}">
                <li class="menu-item{{isset($ami) && $ami == 'home' ? ' ami' : ''}}" id="mi-home">
                    <span class="glyphicon glyphicon-home"></span>
                    Home
                </li>
            </a>
            <div class="spacer3rem"></div>
            @foreach($allCategories as $category)
                <?php $htmlName = VHF::catIDToHtmlName($category->catID);?>
                <a href="{{url('/category/' . $htmlName . "/1/desc")}}">
                    <li class="menu-item{{isset($ami) && $ami == $htmlName ? ' ami' : ''}}" id="mi-{{$htmlName}}">
                        <span class="glyphicon glyphicon-menu-right"></span>
                        {{$category->name}}
                    </li>
                </a>
            @endforeach
            <div class="spacer3rem"></div>
            <a href="{{url('/admin')}}">
                <li class="menu-item{{isset($ami) && $ami == 'admin' ? ' ami' : ''}}" id="mi-admin">
                    <span class="glyphicon glyphicon-cog"></span>
                    Admin
                </li>
            </a>
            @if (Auth::check())
                <a href="{{url('logout')}}">
                    <li class="menu-item" id="mi-logout">
                        <span class="glyphicon glyphicon-log-out"></span>
                        Logout
                    </li>
                </a>
            @endif
        </ul>
    </div>
</div>