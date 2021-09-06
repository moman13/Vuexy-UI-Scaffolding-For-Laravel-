<?php
$actions = \App\Models\ActionRole::where('user_id', auth()->user()->id)->where('role_id', auth()->user()->role_id)->pluck('name')->toArray();
if (empty($actions)) {
    $actions = \App\Models\ActionRole::where('role_id', auth()->user()->role_id)->wherenull('user_id')->pluck('name')->toArray();

}
?>

<div class="navbar-header">
    <ul class="nav navbar-nav flex-row">
        <li class="nav-item mr-auto"><a class="navbar-brand" href="#">
                <div class="brand-logo"></div>
                <h2 class="brand-text mb-0">موقع  </h2>
            </a></li>
        <li class="nav-item nav-toggle"><a class="nav-link modern-nav-toggle pr-0" data-toggle="collapse"><i class="feather icon-x d-block d-xl-none font-medium-4 primary toggle-icon"></i><i class="toggle-icon feather icon-disc font-medium-4 d-none d-xl-block collapse-toggle-icon primary" data-ticon="icon-disc"></i></a></li>
    </ul>
</div>

<div class="shadow-bottom"></div>
<div class="main-menu-content">
    <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
        <li class=" nav-item"><a href="{{url('/dashboard')}}"><i class="feather icon-home"></i><span class="menu-title" data-i18n="Dashboard">@lang('lang.Dashboard')</span></a> </li>
        <?php $variables= \Config::get('menu'); ?>
        @foreach($variables as $kay=>$variable)
            <?php $index_word = $kay.'_show';?>
                @if(empty($variable['sub']))
                    @if(in_array($index_word,$actions) )
                        <li class=" nav-item">
                            <a href="{{route($variable['url'])}}">
                                <i class="{{$variable['icon']}}"></i>
                                <?php
                                $name = $variable['name'];
                                ?>
                                <span class="menu-title" data-i18n="Dashboard">@lang("$name")</span></a>
                        </li>
                    @endif
                @else
                    <li class="nav-item has-sub">
                        <?php
                        $name = $variable['name'];
                        ?>
                        <a href="{{\Route::has($variable['url'])?route($variable['url']):'#'}}">
                            <i class="{{$variable['icon']}}" aria-hidden="true"></i>
                            <span class="menu-title" data-i18n="Miscellaneous">@lang("$name")</span>
                        </a>
                        <ul class="menu-content" style="">
                            @foreach($variable['sub'] as $kay=>$values)
                                <?php $index_word = $kay.'_show';?>
                                    <li class=" nav-item">

                                        <a href="{{\Route::has($values['url'])?route($values['url']):'#'}}">
                                            <i class="{{$values['icon']}}"></i>
                                            <?php
                                            $name = $values['name'];
                                            ?>
                                            <span class="menu-title" data-i18n="Dashboard">@lang("$name")</span></a>
                                    </li>

                                @endforeach
                        </ul>
                    </li>
                @endif


        @endforeach

    </ul>
</div>