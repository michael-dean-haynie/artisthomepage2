<?php use \App\Http\Controllers\ViewHelperFunctions as VHF;?>

<div class="row menu">
    <div class="col-xs-12">
        <ul class="menu-items">
            <a href="{{url('/home')}}">
                <li class="menu-item{{isset($ami) && $ami == 'home' ? ' ami' : ''}}" id="mi-home">
                    <span class="glyphicon glyphicon-menu-right"></span>
                    Home
                </li>
            </a>
            @foreach($allCategories as $category)
                <?php $htmlName = VHF::stringToHtmlName($category->name);?>
                <a href="{{url('/category')}}">
                    <li class="menu-item{{isset($ami) && $ami == $htmlName ? ' ami' : ''}}" id="mi-{{$htmlName}}">
                        <span class="glyphicon glyphicon-menu-right"></span>
                        {{$category->name}}
                    </li>
                </a>
            @endforeach
            <div class="spacer3rem"></div>
            <a href="{{url(Auth::check() ? '/logout' : '/admin')}}">
                <li class="menu-item" id="mi-admin">
                    <span class="glyphicon glyphicon-cog"></span>
                    {{Auth::check() ? 'Logout' : 'Admin'}}
                </li>
            </a>
        </ul>
    </div>
</div>