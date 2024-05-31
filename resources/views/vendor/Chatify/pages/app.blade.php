@include('Chatify::layouts.headLinks')
<div class="messenger">
    {{-- ----------------------Users/Groups lists side---------------------- --}}
    <div class="messenger-listView {{ !!$id ? 'conversation-active' : '' }}">
        {{-- Header and search bar --}}
        <div class="m-header">
            <nav >
                <img class="messenger-headTitle"  src="/img/logo.png" alt="logo" style="height: 75px" width="70px">Mensajes
                
                {{-- header buttons --}}
                
            </nav>
            {{-- Search input --}}
           
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
               {{-- Saved Messages --}}
               
               {{-- Contact --}}
               <p class="messenger-title"><span>Chats</span></p>
               <div class="listOfContacts" style="width: 100%;height: calc(100% - 272px);position: relative;"></div>
           </div>
             {{-- ---------------- [ Search Tab ] ---------------- --}}
          
        </div>
    </div>

    {{-- ----------------------Messaging side---------------------- --}}
    <div class="messenger-messagingView">
        {{-- header title [conversation name] amd buttons --}}
        <div class="m-header m-header-messaging">
            <nav class="chatify-d-flex chatify-justify-content-between chatify-align-items-center">
                {{-- header back button, avatar and user name --}}
                <div class="chatify-d-flex chatify-justify-content-between chatify-align-items-center">
                    <a href="#" class="show-listView"><i class="fas fa-arrow-left"></i></a>
                    <div class="avatar av-s header-avatar" style="margin: 0px 10px; margin-top: -5px; margin-bottom: -5px;">
                    </div>
                    <a href="#" class="user-name">{{ config('chatify.name') }}</a>
                </div>
                {{-- header buttons --}}
                <nav class="m-header-right">
                    <a href="/"><i class="fas fa-home"></i></a>
                    <a href="#" class="show-infoSide"><i class="fas fa-info-circle"></i></a>
                </nav>
            </nav>
            {{-- Internet connection --}}
            <div class="internet-connection">
                <span class="ic-connected">Conetado</span>
                <span class="ic-connecting">Conectando...</span>
                <span class="ic-noInternet">Sin acceso a internet</span>
            </div>
        </div>

        {{-- Messaging area --}}
        <div class="m-body messages-container app-scroll">
            <div class="messages">
                <p class="message-hint center-el"><span>Seleccione en chat para ver los mensajes</span></p>
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
            <p>Detalles</p>
            <a href="#"><i class="fas fa-times"></i></a>
        </nav>
        {!! view('Chatify::layouts.info')->render() !!}
    </div>
</div>

@include('Chatify::layouts.modals')
@include('Chatify::layouts.footerLinks')
