@include('client.layouts2.head')

<body>

    @include('Chatify::layouts.headerForChatClient')

    {{-- Message start --}}

        <div class="container">
            @include('Chatify::layouts.message')
        </div>

    {{-- Message end --}}

    @include('client.layouts2.script')

</body>
