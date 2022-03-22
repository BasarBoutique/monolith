@auth()
    <div id="app">
        <layout-navbars-navs-auth></layout-navbars-navs-auth>
    </div>
@endauth

@guest()
    <div id="app">
        <layout-navbars-navs-guest></layout-navbars-navs-guest>
        <welcome></welcome>
    </div>
@endguest