<!-- HEADER DESKTOP-->
<header class="header-desktop">
    <div class="section__content section__content--p30">
        <div class="container-fluid">
            <div class="header-wrap">
                <form class="form-header" action="/dashboard/reimburses">
                    <input class="au-input au-input--xl" type="text" name="search" placeholder="Search for reimbursment title, detail.." value="{{ request('search') }}"/>
                    <button class="au-btn--submit" type="submit">
                        <i class="zmdi zmdi-search"></i>
                    </button>
                </form>
                <div class="header-button">
                    <div class="account-wrap">
                        <div class="account-item clearfix js-item-menu">
                            <div class="image">
                                @if (auth()->user()->image)
                                    <img src="{{ asset('/storage/'. auth()->user()->image) }}" alt="{{ auth()->user()->name }}" />
                                @else
                                    <img src="/images/icon/avatar-01.jpg" alt="{{ auth()->user()->name }}" />    
                                @endif
                            </div>
                            <div class="content">
                                <a class="js-acc-btn" href="#">{{ auth()->user()->name }}</a>
                            </div>
                            <div class="account-dropdown js-dropdown">
                                <div class="info clearfix">
                                    <div class="image">
                                        <a href="/profile/{{ auth()->user()->id }}">
                                            @if (auth()->user()->image)
                                                <img src="{{ asset('/storage/'. auth()->user()->image) }}" alt="{{ auth()->user()->name }}" />
                                            @else
                                                <img src="/images/icon/avatar-01.jpg" alt="{{ auth()->user()->name }}" />
                                            @endif
                                        </a>
                                    </div>
                                    <div class="content">
                                        <h5 class="name">
                                            <a href="/profile/{{ auth()->user()->id }}">{{ auth()->user()->name }}</a>
                                        </h5>
                                        <span class="email">{{ auth()->user()->email }}</span>
                                    </div>
                                </div>
                                <div class="account-dropdown__body">
                                    <div class="account-dropdown__item">
                                        <a href="/profile/{{ auth()->user()->id }}">
                                            <i class="zmdi zmdi-account"></i>Profile</a>
                                    </div>
                                    <div class="account-dropdown__item">
                                        <a href="/profile/{{ auth()->user()->id }}/edit">
                                            <i class="zmdi zmdi-settings"></i>Edit Profile</a>
                                    </div>
                                </div>
                                <div class="account-dropdown__footer">
                                    <a>
                                        <form action="/logout" method="post">
                                            @csrf
                                            <button type="submit" style="width: 100%; text-align: left;">
                                                <i class="zmdi zmdi-power"></i>Logout</button>
                                        </form>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
<!-- HEADER DESKTOP-->