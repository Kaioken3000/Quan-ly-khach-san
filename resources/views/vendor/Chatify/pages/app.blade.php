<!DOCTYPE html>
<html lang="en" class="light-style layout-menu-fixed" dir="ltr" data-theme="theme-default"
    data-assets-path="/adminresource/assets/" data-template="vertical-menu-template-free">
<!-- Head -->

<head>
    <meta charset="utf-8" />
    <meta name="viewport"
        content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

    <title>Admin</title>

    <meta name="description" content="" />

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="/adminresource/assets/img/favicon/favicon.ico" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
        href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
        rel="stylesheet" />

    <!-- Icons. Uncomment required icon fonts -->
    <link rel="stylesheet" href="/adminresource/assets/vendor/fonts/boxicons.css" />

    <!-- Core CSS -->
    <link rel="stylesheet" href="/adminresource/assets/vendor/css/core.css" class="template-customizer-core-css" />
    <link rel="stylesheet" href="/adminresource/assets/vendor/css/theme-default.css"
        class="template-customizer-theme-css" />
    <link rel="stylesheet" href="/adminresource/assets/css/demo.css" />

    <!-- Vendors CSS -->
    <link rel="stylesheet" href="/adminresource/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />

    <link rel="stylesheet" href="/adminresource/assets/vendor/libs/apex-charts/apex-charts.css" />

    <link rel="stylesheet" href="/adminresource/assets/vendor/css/pages/page-account-setting.css" />
    <link rel="stylesheet" href="/adminresource/assets/vendor/css/pages/page-auth.css" />
    <link rel="stylesheet" href="/adminresource/assets/vendor/css/pages/page-icon.css" />
    <link rel="stylesheet" href="/adminresource/assets/vendor/css/pages/page-misc.css" />

    <!-- Page CSS -->

    <!-- Helpers -->
    <script src="/adminresource/assets/vendor/js/helpers.js"></script>

    <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
    <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->

    <!-- Font awesome -->
    <script src="https://kit.fontawesome.com/da4e510802.js" crossorigin="anonymous"></script>
</head>

<body>
    <!-- Layout wrapper -->
    <div class="layout-wrapper layout-content-navbar">
        <div class="layout-container">
            <!-- Menu -->
            @include('layouts.menu')

            <!-- Layout container -->
            <div class="layout-page">

                {{-- ---------------------------------------------------------------- --}}
                <!-- Content wrapper -->
                <div class="content-wrapper">
                    @include('layouts.menu')
                    @include('Chatify::layouts.headLinks')
                    <div class="messenger">
                        {{-- ----------------------Users/Groups lists side---------------------- --}}
                        <div class="messenger-listView {{ !!$id ? 'conversation-active' : '' }}">
                            {{-- Header and search bar --}}
                            <div class="m-header">
                                <nav>
                                    <a href="#"><i class="fas fa-inbox"></i> <span
                                            class="messenger-headTitle">MESSAGES</span> </a>
                                    {{-- header buttons --}}
                                    <nav class="m-header-right">
                                        <a href="#"><i class="fas fa-cog settings-btn"></i></a>
                                        <a href="#" class="listView-x"><i class="fas fa-times"></i></a>
                                    </nav>
                                </nav>
                                {{-- Search input --}}
                                <input type="text" class="messenger-search" placeholder="Search" />
                                {{-- Tabs --}}
                                {{-- <div class="messenger-listView-tabs">
                                    <a href="#" class="active-tab" data-view="users">
                                        <span class="far fa-user"></span> Contacts</a>
                                </div> --}}
                            </div>
                            {{-- tabs and lists --}}
                            <div class="m-body contacts-container">
                                {{-- Lists [Users/Group] --}}
                                {{-- ---------------- [ User Tab ] ---------------- --}}
                                <div class="show messenger-tab users-tab app-scroll" data-view="users">
                                    {{-- Favorites --}}
                                    <div class="favorites-section">
                                        <p class="messenger-title"><span>Favorites</span></p>
                                        <div class="messenger-favorites app-scroll-hidden"></div>
                                    </div>
                                    {{-- List All User
                                    {{-- Retrieve all User --}}
                                    <?php $users = App\Models\User::get(); ?>
                                    {{-- Show all User --}}
                                    <p class="messenger-title"><span>All User</span></p>
                                    <div class="listOfContacts1" style="width: 100%;">
                                        <div class="listOfContacts1" style="width: 100%;">
                                            @foreach($users as $user)
                                            <table class="messenger-list-item" data-contact="{{$user->id}}">
                                                <tbody>
                                                    <tr data-action="0">
                                                        <td>
                                                            <div class="saved-messages avatar av-m">
                                                                <div class="avatar av-m"
                                                                    style="background-image: url('https://www.gravatar.com/avatar/342c19017566eb360099ffe8093f8a8c?s=200&amp;d=identicon');">
                                                                </div>
                                                                <!-- <span class="far fa-bookmark" aria-hidden="true"></span> -->
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <p data-id="{{$user->id}}" data-type="user">
                                                                {{$user->username}}
                                                            </p>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                            @endforeach
                                        </div>
                                    </div>
                                    {{-- Saved Messages --}}
                                    <p class="messenger-title"><span>Your Space</span></p>
                                    {!! view('Chatify::layouts.listItem', ['get' => 'saved']) !!}

                                    {{-- Contact --}}
                                    <p class="messenger-title"><span>All Messages</span></p>
                                    <div class="listOfContacts"
                                        style="width: 100%;height: calc(100% - 272px);position: relative;"></div>
                                </div>
                                {{-- ---------------- [ Search Tab ] ---------------- --}}
                                <div class="messenger-tab search-tab app-scroll" data-view="search">
                                    {{-- items --}}
                                    <p class="messenger-title"><span>Search</span></p>
                                    <div class="search-records">
                                        <p class="message-hint center-el"><span>Type to search..</span></p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        {{-- ----------------------Messaging side---------------------- --}}
                        <div class="messenger-messagingView">
                            {{-- header title [conversation name] amd buttons --}}
                            <div class="m-header m-header-messaging">
                                <nav class="chatify-d-flex chatify-justify-content-between chatify-align-items-center">
                                    {{-- header back button, avatar and user name --}}
                                    <div
                                        class="chatify-d-flex chatify-justify-content-between chatify-align-items-center">
                                        <a href="#" class="show-listView"><i class="fas fa-arrow-left"></i></a>
                                        <div class="avatar av-s header-avatar"
                                            style="margin: 0px 10px; margin-top: -5px; margin-bottom: -5px;">
                                        </div>
                                        <a href="#" class="user-name">{{ config('chatify.name') }}</a>
                                    </div>
                                    {{-- header buttons --}}
                                    <nav class="m-header-right">
                                        <a href="#" class="add-to-favorite"><i class="fas fa-star"></i></a>
                                        <a href="/"><i class="fas fa-home"></i></a>
                                        <a href="#" class="show-infoSide"><i class="fas fa-info-circle"></i></a>
                                    </nav>
                                </nav>
                                {{-- Internet connection --}}
                                <div class="internet-connection">
                                    <span class="ic-connected">Connected</span>
                                    <span class="ic-connecting">Connecting...</span>
                                    <span class="ic-noInternet">No internet access</span>
                                </div>
                            </div>

                            {{-- Messaging area --}}
                            <div class="m-body messages-container app-scroll">
                                <div class="messages">
                                    <p class="message-hint center-el"><span>Please select a chat to start
                                            messaging</span></p>
                                </div>
                                {{-- Typing indicator --}}
                                <div class="typing-indicator">
                                    <div class="message-card typing">
                                        <div class="message">
                                            <span class="typing-dots">
                                                <span class="dot dot-1"></span>
                                                <span class="dot dot-2"></span>
                                                <span class="dot dot-3"></span>
                                            </span>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            {{-- Send Message Form --}}
                            @include('Chatify::layouts.sendForm')
                        </div>
                        {{-- ---------------------- Info side ---------------------- --}}
                        <div class="messenger-infoView app-scroll">
                            {{-- nav actions --}}
                            <nav>
                                <p>User Details</p>
                                <a href="#"><i class="fas fa-times"></i></a>
                            </nav>
                            {!! view('Chatify::layouts.info')->render() !!}
                        </div>
                    </div>

                    @include('Chatify::layouts.modals')
                    @include('Chatify::layouts.footerLinks')
                </div>
                {{-- ---------------------------------------------------------------- --}}

            </div>
        </div>
    </div>

    <!-- Script -->
    @include('layouts.script')
</body>

</html>